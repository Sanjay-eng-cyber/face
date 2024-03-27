<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add any necessary head content here -->
</head>

<body>
    <div class="matched-images">
        @if (isset($responseData['matched_images']))
            @foreach ($responseData['matched_images'] as $imageUrl)
                {{-- <img src="{{ asset('storage/images/upload/' . $imageUrl) }}"
                 alt="Main Image" 
                 style="max-width: 400px; max-height: 400px;"> --}}

                 <img src="http://127.0.0.1:8000/media/{{ $imageUrl }}"
                     alt="Main Image" 
                     style="max-width: 400px; max-height: 400px;">

            @endforeach
        @else
            <p>No matched images found.</p>
        @endif
    </div>
</body>

</html>
