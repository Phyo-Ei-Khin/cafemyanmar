@extends('todos.layout');
@section('content')
<h1 class="text-2xl border-b pb-4">What next you need To-Do</h1>
    <x-alert />
    <form method="post" action="{{route('todo.store')}}" class="py-5">
        @csrf
        <div class="py-2">
            <input type="text" name="title" class="py-2 px-3 border rounded" placeholder="Title">
        </div>
        <div class="py-2">
            <textarea name="description" class="py-2 px-3 border rounded" placeholder="Description"></textarea>
        </div>
        <div class="py-2">
            <!-- <div class="flex justify-center pb-4 px-4">
                <h2 class="text-lg">Add steps if required.</h2>
                <span class="fas fa-plus px-2 py-1 cursor-pointer"></span>
            </div> -->
            @livewire('step')
            <!-- <input type="text" name="step" class="py-2 px-2 border rounded" placeholder="Describe Step"> -->
        </div>
        <div class="py-2">
            <input type="submit" value="Create" class="p-2 border rounded">
        </div>
    </form>
    <a href="{{route('todo.index')}}" class="m-5 px-4 py-2 border rounded cursor-pointer">Back</a>
    
@endsection