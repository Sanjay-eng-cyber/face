<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add any necessary head content here -->
</head>

<body>
    <div class="matched-images">
        @if (isset($responseData['matched_images']['matched_images']) && !empty($responseData['matched_images']['matched_images']))
        @foreach ($responseData['matched_images']['matched_images'] as $imageData)
            <img src="http://127.0.0.1:8000{{ $imageData['url'] }}" 
                 alt="{{ $imageData['name'] }}" 
                 style="max-width: 400px; max-height: 400px;">
        @endforeach
    @else
        <p>No matched images found.</p>
    @endif

    </div>
</body>

</html>
