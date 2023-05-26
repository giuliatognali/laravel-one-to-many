@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between mb-3">
                <h2 class="text-secondary">Types List</h2>
                <p><a href="{{ route('admin.types.create') }}" class="btn btn-primary">Create New Type</a></p>
            </div>

            @include('partials.message')

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id }}</th>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->slug }}</td>
                            <td>
                                <ul class="d-flex gap-1 list-unstyled m-0">
                                    <li><a href="{{ route('admin.types.show', $type->slug) }}"
                                            class='btn btn-primary'>Show</a></li>
                                    <li><a href="{{ route('admin.types.edit', $type) }}"
                                            class='btn btn-warning'>Edit</a></li>
                                    <li><a href="#" class='btn btn-danger' data-bs-toggle="modal"
                                            data-bs-target="#type-{{ $type->id }}">Delete</a></li>
                                    {{-- collegamento per aprire la modale --}}
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <div class="modal fade" id="type-{{ $type->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="type-{{ $type->id }}">Warning!</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>You are trying to delete the type <strong>{{ $type->name }}.</strong></p>
                                        <p>Are you sure?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {{-- usiamo il form di delete nella modale come bottone di conferma --}}
                                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
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
