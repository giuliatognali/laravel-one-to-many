@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h2 class="text-secondary">Type:{{ $type->name }}</h2>
            <h4>List of projects:</h4>
            <ul>
                @foreach ($type->projects as $project)
                    <li>
                        <a href="{{route('admin.projects.edit', $project)}}">{{$project->name}}</a>
                    </li>
                @endforeach
            </ul>

            <div>

                <a href="{{ route('admin.types.edit', $type) }}" class='btn btn-warning'>Edit</a>
            </div>
        </div>
    </div>
@endsection
