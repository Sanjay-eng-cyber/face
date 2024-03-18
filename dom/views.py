from django.shortcuts import render
from django.db import connections
from django.shortcuts import render
from django.http import HttpResponse
import base64
import cv2
import os
import face_recognition
from django.http import JsonResponse
from django.conf import settings
# from face_recognition_app.models import UserImage
from django.http import HttpResponseBadRequest
import json
import numpy as np
import base64

def index(request):
    return render(request, 'index.html')

def inputimg(request):
    if request.method == 'POST':
        try:
            # Get the list of uploaded images
            images = request.FILES.getlist('images')

            # Iterate over each uploaded image
            for image in images:
                img = face_recognition.load_image_file(image)
                face_locations = face_recognition.face_locations(img)
                face_encodings = face_recognition.face_encodings(img, face_locations)

                # Convert face encodings and locations to JSON
                face_encoding = json.dumps([face_encoding.tolist() for face_encoding in face_encodings])
                face_locations = json.dumps([list(face_location) for face_location in face_locations])

                # Save the image file
                file_path = os.path.join(settings.MEDIA_ROOT, image.name)
                with open(file_path, 'wb') as f:
                    for chunk in image.chunks():
                        f.write(chunk)

                # Insert image data into the database
                with connections['default'].cursor() as cursor:
                    cursor.execute("INSERT INTO image (image, face_encoding, face_locations) VALUES (%s, %s, %s)", [image, face_encoding, face_locations])
            
            # Redirect or render a response after processing all images
            # return HttpResponseRedirect('/success/')
            return render(request, 'success.html')
        
        except Exception as e:
            # Handle exceptions
            print("Error:", e)
    
    return render(request, 'upload.html')


def capture_input_image(request):
    if request.method == 'POST':
        if 'imageData' in request.POST:
            # print(request.FILES)

            # Get the image data from the request
            image_data = request.POST.get('imageData', '')
            _, encoded = image_data.split(',', 1)
            decoded = base64.b64decode(encoded)

            # Save the decoded image to a file
            with open('captured_image.jpg', 'wb') as f:
                f.write(decoded)

            # Process the captured image using your face recognition code
            input_image_path = 'captured_image.jpg'
            matched_images = find_matching_faces(input_image_path)
            return render(request, 'output.html', {'matched_images': matched_images})


        elif 'imageUpload' in request.FILES:
            uploaded_file = request.FILES.get('imageUpload')
            image_data = uploaded_file.read()
            with open('uploaded_image.jpg', 'wb') as f:
                f.write(image_data)
            input_image_path = 'uploaded_image.jpg'
            matched_images = find_matching_faces(input_image_path)
           
            return render(request, 'output.html', {'matched_images': matched_images})

        else:
            return HttpResponse('Invalid request method or missing image data')

    else:
        return HttpResponse('Invalid request method')
    
def find_matching_faces(input_image_path):
    # Check if the input image file exists
    if not os.path.isfile(input_image_path):
        print(f"Error: The input image file '{input_image_path}' does not exist.")
        return []

    # Load the input image
    input_image = face_recognition.load_image_file(input_image_path)
    
    input_face_locations = face_recognition.face_locations(input_image)
    input_face_encodings = face_recognition.face_encodings(input_image, input_face_locations)

    matched_images = []
    with connections['default'].cursor() as cursor:
        cursor.execute("SELECT image, face_encoding, face_locations FROM image")
        rows = cursor.fetchall()

    for row in rows:
       
        try:
            # Decode Base64 encoded strings
            face_encodings_db = json.loads((row[1]))
      
            # Performing Face Recognition
            for input_encoding in input_face_encodings:
                # print('input_encoding..***',input_encoding)
                matches = face_recognition.compare_faces(face_encodings_db, input_encoding, tolerance=0.45)
                face_distances = face_recognition.face_distance(face_encodings_db, input_encoding)
                # print('face_distances**********',face_distances);

                # print('maches**********', matches)
                # print('matches:', matches)
                if True in matches:
                    matched_images.append(row[0]) 
        except Exception as e:
            print("Error:", e)
            
    return matched_images