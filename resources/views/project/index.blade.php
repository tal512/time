@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Projects
                    @include('components.button.create', ['url' => route('projects.create')])
                </div>

                <div class="card-body">
                    @if (session('success'))
                        @include('components.alert.success')
                    @endif

                    {{ $projects->links() }}

                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Project</th>
                            <th>Start at</th>
                            <th>End at</th>
                            <th>Budget</th>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>#{{ $project->id }}</td>
                                <td>
                                    <a href="{{ route('projects.edit', ['id' => $project->id]) }}">
                                        {{ $project->name }}
                                    </a>
                                </td>
                                <td>{{ $project->start_at->format('d.m.Y') }}</td>
                                <td>{{ $project->end_at->format('d.m.Y') }}</td>
                                <td>{{ $project->usedBudget }} / {{ $project->budget }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
