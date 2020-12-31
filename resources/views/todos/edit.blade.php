@extends('todos.layout');

@section('content')
    <h1 class="text-2xl border-b pb-4">Edit To-Do List</h1>
    <x-alert />
    <form method="post" action="{{route('todo.update',$todo->id)}}" class="py-5">
        @csrf
        @method('put')
        <div class="py-2">
            <input type="text" value="{{ $todo->title }}" name="title" class="py-2 px-3 border rounded" placeholder="Title">
        </div>
        <div class="py-2">
            <textarea name="description" class="py-2 px-3 border rounded" placeholder="Description">{{$todo->description}}</textarea>
        </div>
        @livewire('edit-step',['steps' => $todo->steps])
        <div class="py-2">
            <input type="submit" value="Update" class="p-2 border rounded">
        </div>
    </form>
    <a href="{{route('todo.index')}}" class="m-5 px-4 py-2 border rounded cursor-pointer">Back</a>
@endsection