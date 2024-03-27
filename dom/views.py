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
from datetime import datetime
from rest_framework.decorators import api_view
from rest_framework.response import Response
from django.http import JsonResponse

def index(request):
    return render(request, 'index.html')

def upload(request):
    return render(request, 'upload.html')

@api_view(['POST'])
def inputimg(request):
    if request.method == 'POST':
        try:
            images = request.FILES.getlist('images')
            # print("This is images **********", images)
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
            
              # Return a success response
            return JsonResponse({'message': 'Images processed successfully'})
            # return render(request, 'success.html')
        
        except Exception as e:
           
            # Handle exceptions
            print("Error:", e)
            return JsonResponse({'error': str(e)}, status=500)
    
    # return render(request, 'upload.html')
    return JsonResponse({'error': 'Method not allowed'}, status=405)



@api_view(['POST'])
def capture_input_image(request):
    permitted_extensions = ['.png', '.jpg', '.jpeg','.webp','.jfif']
    if request.method == 'POST':
        if 'imageData' in request.POST:
            image_data = request.POST.get('imageData', '')
            # print('************** capture image', image_data)
            _, encoded = image_data.split(',', 1)
            decoded = base64.b64decode(encoded)

            if not os.path.exists(settings.IMAGE_CAPTURE_PATH):
                os.makedirs(settings.IMAGE_CAPTURE_PATH)
            
            timestamp = datetime.now().strftime("%Y%m%d%H%M%S")
            image_name = f"image_{timestamp}.jpg"
                
            input_image_path = os.path.join(settings.IMAGE_CAPTURE_PATH, image_name)
            with open(input_image_path, 'wb') as f:
                f.write(decoded)
                
            matched_images = find_matching_faces(input_image_path)
            # return render(request, 'output.html', {'matched_images': matched_images})
            return JsonResponse({'matched_images': matched_images})



        elif 'imageUpload' in request.FILES:
            uploaded_file = request.FILES.get('imageUpload')
            image_data = uploaded_file.read()
            
            
               # Ensure the folder exists, create it if it doesn't
            if not os.path.exists(settings.IMAGE_UPLOAD_PATH):
                os.makedirs(settings.IMAGE_UPLOAD_PATH)
            file_name, file_extension = os.path.splitext(uploaded_file.name)
            if file_extension.lower() not in permitted_extensions:
                return HttpResponse("Only PNG, JPG, webp and JPEG extensions are allowed for image uploads.")

            # Save the uploaded image to the custom folder
            timestamp = datetime.now().strftime("%Y%m%d%H%M%S")
            image_name = f"image_{timestamp}{file_extension}"
            
            file_path = os.path.join(settings.IMAGE_UPLOAD_PATH, image_name)
            
            with open(file_path, 'wb') as f:
                f.write(image_data)
                
            # with connections['default'].cursor() as cursor:
            #     cursor.execute("INSERT INTO image (upload_image) VALUES (%s)", [image_name])


            input_image_path = file_path  # Use the path where the image is saved
            matched_images = find_matching_faces(input_image_path)
            return JsonResponse({'matched_images': matched_images})

            # return render(request, 'output.html', {'matched_images': matched_images})

        else:
            return JsonResponse({'error': 'Invalid request method or missing image data'}, status=400)
            # return HttpResponse('Invalid request method or missing image data')

    else:
        return JsonResponse({'error': 'Invalid request method'}, status=400)

        # return HttpResponse('Invalid request method')
    
def find_matching_faces(input_image_path):
    if not os.path.isfile(input_image_path):
        print(f"Error: The input image file '{input_image_path}' does not exist.")
        return []

    input_image = face_recognition.load_image_file(input_image_path)    
    input_face_locations = face_recognition.face_locations(input_image)
    input_face_encodings = face_recognition.face_encodings(input_image, input_face_locations)

    matched_images = []
    with connections['default'].cursor() as cursor:
        cursor.execute("SELECT image, face_encoding, face_locations FROM image")
        rows = cursor.fetchall()

    for row in rows:
       
        try:
            face_encodings_db = json.loads((row[1]))      
            for input_encoding in input_face_encodings:
                matches = face_recognition.compare_faces(face_encodings_db, input_encoding, tolerance=0.48)
                if True in matches:
                    image_name = row[0]
                    if image_name not in matched_images:  
                        # print("Matched image found:", image_name)
                        matched_images.append(image_name)
        except Exception as e:
            print("Error:", e)
            
    return matched_images