import face_recognition
import json
from django.db import models

class UserImage(models.Model):
    image = models.ImageField(upload_to='images/')
    face_encoding = models.TextField()
    face_locations = models.TextField()

 