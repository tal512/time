@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create project
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="start_at">Start at</label>
                            @include('components.datepicker.datepicker', [
                                'name' => 'start_at',
                                'value' => old('start_at', current_weekday_of_month()),
                            ])
                            @error('start_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_at">End at</label>
                            @include('components.datepicker.datepicker', [
                                'name' => 'end_at',
                                'value' => old('end_at', last_weekday_of_month()),
                            ])
                            @error('end_at')
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
