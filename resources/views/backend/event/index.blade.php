@extends('backend.layouts.app')
@section('title', 'Add Brand')
@section('content')

<form method="POST" action="{{ route('backend.events.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <div class="form-group">
        <label for="name">Event Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('js')
@endsection
