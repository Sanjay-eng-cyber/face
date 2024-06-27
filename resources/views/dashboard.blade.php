<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('events.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                    <div class="form-group">
                        <label for="name">Event Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
            
            
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>



               
                <div style="margin-top:80px">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file"  name="images[]" multiple>
                        @error('images.*')
                            <div class="alert alert-danger">Image Type jpg, jpeg, png</div>
                        @enderror
                        <button type="submit">Upload Images</button>
                    </form>
                </div>


            </div>
        </div> --}}
    </div>
</x-app-layout>
