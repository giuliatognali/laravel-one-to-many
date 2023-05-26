@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-start">
            <h2 class="text-secondary">Edit project: {{ $project->name }}</h2>

            {{-- errori di validazione --}}
            @include('partials.errors')

            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $project->name) }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content', $project->content) }}</textarea>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="set_image" name="set_image" value="1"
                        @if ($project->image) checked @endif>
                    <label class="form-check-label" for="set_image">Image</label>
                </div>
                <!--container input img -->
                <div class="mb-3 @if(!$project->image) d-none @endif" id="img-input-container">  <!--se l'immagine non esiste d-none -->
                    <!--preview img upload -->
                    <div class="preview">
                        <img id="file-img-preview" class="w-50 my-3" @if ($project->image) src={{ asset('storage/' . $project->image) }} @endif>
                    </div>
                    <!--/preview img upload -->

                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <!--/container input img -->
                <button type="submit" class="btn btn-warning">Confirm edit</button>
            </form>
        </div>
    </div>
@endsection
