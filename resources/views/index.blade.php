@extends('layouts.app')

@section('title', 'The list of task')

@section('content')
    
    <div class="mb-4">
        <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">Add task</a>
    </div>

    <ul>
        @forelse ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    @class(['p-4', 'line-through' => $task->completed])>
                    {{ $task->title }}
                </a>
            </li>
        @empty
            There are no task!
        @endforelse
    </ul>
    @if ($tasks->count())
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
