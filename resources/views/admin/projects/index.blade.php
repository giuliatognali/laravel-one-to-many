@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between mb-3">
                <h2 class="text-secondary">Lista dei progetti</h2>
                <p><a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create New Project</a></p>
            </div>

            @include('partials.message')

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->content }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>
                                <ul class="d-flex gap-1 list-unstyled m-0">
                                    <li><a href="{{ route('admin.projects.show', $project->slug) }}"
                                            class='btn btn-primary'>Show</a></li>
                                    <li><a href="{{ route('admin.projects.edit', $project) }}"
                                            class='btn btn-warning'>Edit</a></li>
                                    <li><a href="#" class='btn btn-danger' data-bs-toggle="modal"
                                            data-bs-target="#project-{{ $project->id }}">Delete</a></li>
                                    {{-- collegamento per aprire la modale --}}
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <div class="modal fade" id="project-{{ $project->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="project-{{ $project->id }}">Warning!</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>You are trying to delete the project <strong>{{ $project->name }}.</strong></p>
                                        <p>Are you sure?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {{-- usiamo il form di delete nella modale come bottone di conferma --}}
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class='btn btn-danger'>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
