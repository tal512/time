@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit project
                    @include('components.button.delete', [
                        'url' => route('projects.destroy', [
                            'id' => $project->id,
                        ]),
                    ])
                </div>

                <div class="card-body">
                    @if (session('success'))
                        @include('components.alert.success')
                    @endif

                    <form method="POST" action="{{ route('projects.update', ['id' => $project->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $project->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="start_at">Start at</label>
                            @include('components.datepicker.datepicker', [
                                'name' => 'start_at',
                                'value' => old('start_at', $project->start_at),
                            ])
                            @error('start_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_at">End at</label>
                            @include('components.datepicker.datepicker', [
                                'name' => 'end_at',
                                'value' => old('end_at', $project->end_at),
                            ])
                            @error('end_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Budget</label>
                            <input type="number" name="budget" id="budget" class="form-control @error('budget') is-invalid @enderror" value="{{ old('budget', $project->budget) }}">
                            @error('budget')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @include('components.button.back', ['url' => route('projects.index')])
                        @include('components.button.save')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
