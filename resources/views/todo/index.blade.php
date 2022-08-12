@extends('base')

@section('title') Todo list @endsection

@section('body')
    <a href="{{ route('todo.new') }}">Create a new todo</a>
    <ul>
    @foreach($list as $todo)
        <li>
            {{ $todo->title }}
        </li>
    @endforeach
    </ul>
@endsection
