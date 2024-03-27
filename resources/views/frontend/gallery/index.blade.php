<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Image Upload</title>
</head>
<body>
    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file"  name="images[]" multiple>
        @error('images.*')
            <div class="alert alert-danger">Image Type jpg, jpeg, png</div>
        @enderror
        <button type="submit">Upload Images</button>
    </form>
</body>
</html>
