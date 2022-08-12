@extends('base')

@section('title') Create a new todo @endsection

@section('body')
    <form action="{{ route('todo.create') }}" method="post">
        @csrf
        <fieldset>
            <label for="todo-title">Title</label>
            <input type="text" name="title" id="todo-title" value="{{ old('title') }}">
        </fieldset>
        <fieldset>
            <label for="todo-desc">Description</label>
            <input type="text" name="description" id="todo-desc" value="{{ old('description') }}">
        </fieldset>
        <button type="submit">Create</button>
    </form>
@endsection
