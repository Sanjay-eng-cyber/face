from django.contrib import admin
from face_recognition_app.models import UserImage
import face_recognition
import json
class Image(admin.ModelAdmin):
    list_display = ('id', 'image', 'face_encoding', 'face_locations')
    
    
admin.site.register(UserImage, Image)
