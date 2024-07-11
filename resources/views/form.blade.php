@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Add task')


@section('content')
    {{-- {{$errors}} --}}
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
        {{-- Cross-Site Request Forgery --}}
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title" class="mb-4">>Name</label>
            <input type="text" name="title" id="title" value={{ $task->title ?? old('title') }}>
            @error('title')
                <p class="errors">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description"  class="mb-4">Description</label>
            <textarea name="description" id="description" rows="5" @class(['border-red-500' => $errors->has('description')])>
                {{ $task->description ?? old('description') }}
            </textarea>
            @error('description')
                <p class="errors-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description"  class="mb-4">Long_description</label>
            <textarea name="long_description" id="long_description" rows="10" @class(['border-red-500' => $errors->has('long_description')])>
                {{ $task->long_description ?? old('long_description') }}
            </textarea>
            @error('long_description')
                <p class="errors">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="btn">
                @isset($task)
                    Update task
                @else
                    Add task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="font-medium text-gray-700 underline decoration-pink-500">Cancel</a>
        </div>
    </form>
@endsection
