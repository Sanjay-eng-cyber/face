from django.shortcuts import render
from django.http import HttpResponse
import base64
import cv2
import os
import face_recognition
from django.http import JsonResponse
from django.conf import settings
from face_recognition_app.models import UserImage
from django.http import HttpResponseBadRequest
import json
def index(request):
    return render(request, 'index.html')

def inputimg(request):
    if request.method == 'POST':
        try:
            image = request.FILES['image']
            img = face_recognition.load_image_file(image)
            face_locations = face_recognition.face_locations(img)
            face_encodings = face_recognition.face_encodings(img, face_locations)

            # Convert face encodings to binary
            face_encoding = json.dumps([face_encoding.tolist() for face_encoding in face_encodings])
            face_locations = json.dumps([list(face_location) for face_location in face_locations])
            
            print('face ecoding***',type(face_encoding))
            print('face locations***',type(face_locations))

            data = UserImage(image=image, face_locations=face_locations, face_encoding=face_encoding)
            data.save()

            return render(request, 'success.html')
        
        except Exception as e:
            return HttpResponseBadRequest(f'Error processing image: {e}')
    
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
            print('matched_image1223', matched_images)

            return render(request, 'output.html', {'matched_images': matched_images})

        else:
            return HttpResponse('Invalid request method or missing image data')

    else:
        return HttpResponse('Invalid request method')
    


def find_matching_faces(input_image_path):
    # Check if the input image file exists
    if not os.path.isfile(input_image_path):
        print(f"Error: The input image file '{input_image_path}' does not exist.")
        return

    # Load the input image
    input_image = face_recognition.load_image_file(input_image_path)

    # Find face locations and face encodings in the input image
    input_face_locations = face_recognition.face_locations(input_image)
    input_face_encodings = face_recognition.face_encodings(input_image, input_face_locations)

   


    matched_images = []
    face_encodings = UserImage.objects.all()
    for face_encoding in face_encodings:
        # print('********',face_encoding)
        user_image=face_encoding.image
        face_encoding_db = json.loads(face_encoding.face_encoding)
        for input_encoding in input_face_encodings:
            matches = face_recognition.compare_faces(face_encoding_db, input_encoding)
            if True in matches:
                matched_image = user_image
                matched_images.append(matched_image)


    return matched_images
