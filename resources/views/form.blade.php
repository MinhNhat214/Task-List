@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Add task')

@section('styles')
    <style>
        .errors-message {
            color: red;
            font-size: 0, 8rem;
        }
    </style>
@endsection

@section('content')
    {{-- {{$errors}} --}}
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
        {{-- Cross-Site Request Forgery --}}
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Name</label>
            <input type="text" name="title" id="title" value={{ $task->title ?? old('title') }}>
            @error('title')
                <p class="errors-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="errors-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long_description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="errors-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">
                @isset($task)
                    Update task
                @else
                    Add task
                @endisset
            </button>
        </div>
    </form>
@endsection
