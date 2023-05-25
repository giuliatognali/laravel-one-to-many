@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-start">
            <h2 class="text-secondary">Create a new project</h2>

            {{-- errori di validazione --}}
            @include('partials.errors')

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                </div>
                <div class="mb-3">
                    <!--preview img upload -->
                    <div class="preview">
                        <img id="file-img-preview" class="w-50 my-3">
                    </div>
                    <!--/preview img upload -->
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
