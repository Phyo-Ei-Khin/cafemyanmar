@extends('todos.layout');

@section('content')
<div class="flex justify-between border-b p-4">
    <h1 class="text-2xl">All ToDos</h1>
    <a href="{{route('todo.create')}}" class="mx-5 py-2 px-1 text-blue-400 rounded cursor-pointer text-white">
        <span class="fas fa-plus-circle"></span>
    </a>
</div>
<ul class="my-5">
<x-alert />
@if($todos->count() > 0)
    @foreach($todos as $todo)
        <li class="flex justify-between py-2 px-2">
        @include('todos.completeButton')
            @if($todo->completed)
            <p class="line-through">{{$todo->title}}</p>
            @else
            <a href="{{route('todo.show', $todo->id)}}" class="cursor-pointer">{{$todo->title}}</a>
            @endif
            <div>
                <a href="{{route('todo.edit',$todo->id)}}" class="text-orange-400 cursor-pointer text-white">
                    <span class="fas fa-edit px-2"/>
                </a>

               
                <span class="fas fa-trash text-red-400 cursor-pointer" 
                onclick="event.preventDefault(); 
                    if(confirm('Are You really want to delete?')){
                    document.getElementById('form-delete-{{$todo->id}}')
                    .submit();
                    }">
                <form style="display:none" id="{{'form-delete-'. $todo->id}}" method="post" action="{{route('todo.destroy',$todo->id)}}">
                    @csrf 
                    @method('delete')
                </form>
            </div>    
        </li>
    @endforeach
    @else 
        <p>No Task available, create one</p>
    @endif
</ul>
@endsection


    
