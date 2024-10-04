<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="{{ route('upload-img', ['eventSlug' => $event->slug, 'categorySlug' => $category->slug]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Upload File : </label>
        <input type="file" name="file" required> <br><br>
        <button type="submit">Submit</button>
    </form>

</body>

</html>
