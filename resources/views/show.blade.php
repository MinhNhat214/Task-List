@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="font-medium text-gray-700 underline decoration-pink-500"><- Go back to the Task list!</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} | Updated
        {{ $task->updated_at->diffForHumans() }}</p>
    <p>
        @if ($task->completed)
            <p class="font-medium text-green-500">Completed</p>
        @else
            <p class="font-medium text-red-500">Not completed</p>
        @endif
    </p>
    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>


        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">Mark as {{ $task->completed ? 'not completed' : 'completed' }}</button>
        </form>


        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete task</button>
        </form>
    </div>
@endsection
