@extends('layouts.app')
@section('title', 'Edit task')
@section('styles')
    <style>
        .errors-message {
            color: red;
            font-size: 0, 8rem;
        }
    </style>
@section('content')
    {{-- {{$errors}} --}}
    <form action="{{ route('tasks.update',['task'=>$task->id]) }}" method="post">
        {{-- Cross-Site Request Forgery --}}
        @csrf
        @method('PUT')
        <div>
            <label for="title">Name</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class="errors-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p class="errors-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long_description</label>
            <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
            @error('long_description')
                <p class="errors-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Edit task</button>
        </div>
    </form>
@endsection
