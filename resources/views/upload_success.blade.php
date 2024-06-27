<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add any necessary head content here -->
</head>

<body>
    <div class="matched-images">
        @if (isset($responseData['matched_images']['matched_images']) && !empty($responseData['matched_images']['matched_images']))
            @foreach ($responseData['matched_images']['matched_images'] as $imageData)
                {{-- Check if $imageData is an array --}}
                @if (is_array($imageData))
                    {{-- Loop through each image filename in the array --}}
                    @foreach ($imageData as $imageFilename)
                        <img src="http://127.0.0.1:8000/media/{{ $imageFilename }}"
                             alt="Main Image" 
                             style="max-width: 400px; max-height: 400px;">
                    @endforeach
                @else
                    {{-- If $imageData is not an array, assume it's a single image filename --}}
                    <img src="http://127.0.0.1:8000/media/{{ $imageData }}"
                         alt="Main Image" 
                         style="max-width: 400px; max-height: 400px;">
                @endif
            @endforeach
        @else
            <p>No matched images found.</p>
        @endif
    </div>
</body>

</html>
