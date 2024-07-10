@extends('layouts.app')

@section('title', 'The list of task')

@section('content')
    <ol>
        @forelse ($tasks as $task)
            <li><a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a></li>
        @empty
            There are no task!
        @endforelse
    </ol>
    @if ($tasks->count())
        <div>
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
