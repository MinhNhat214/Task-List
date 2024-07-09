@extends('layouts.app')

@section('title', 'The list of task')

@section('content')
    <ol>
        @forelse ($tasks as $task)
            <li><a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a></li>
        @empty
            No task!
        @endforelse
    </ol>
@endsection
