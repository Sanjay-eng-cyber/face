@extends('backend.layouts.app')
@section('title', 'Add Brand')
@section('content')
<form action="{{ route('backend.gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="event_id" value="{{ $event->id }}">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    
    <input type="file"  name="image_name[]" multiple>
    @error('image_name.*')
        <div class="alert alert-danger">Image Type jpg, jpeg, png</div>
    @enderror
    <button type="submit">Upload Images</button>
</form>


<div>

    <a href="http://cms.facereco.test/upload/{{$event->id}}" target="_blank">http://cms.facereco.test/upload/{{$event->id}}</a>
    
</div>
@endsection
@section('js')
@endsection
