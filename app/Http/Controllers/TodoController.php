<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;
use App\todo;
use App\Step;
use Illuminate\Support\Facades\Validator;
// use App\todo;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }
    public function index()
    {

        $todos = auth()->user()->todos();
        // return $todos;
        // dd(auth()->user()->todo);
        // $todos = Todo::orderBy('completed')->get();
        // return $todo;
        // return view('todos.index')->with(['todos' => $todos]); 
        return view('todos.index', compact('todos')); // same with();
    }

    public function create()
    {
        return view('todos.create');
    }
    public function show(Todo $todo)
    {
        // return $todo->steps->count();
        return view('todos.show', compact('todo'));
    }
    public function store(TodoCreateRequest $request)
    {
        // $rules = [
        //     'title'=>'required|max:255',
        // ];
        // $messages = [
        //     'title.max' => 'todo title should not be greater then 255 chars',
        // ];
        // $validator = Validator::make($request->all(), $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect()->back()
        //                     ->withErrors($validator)
        //                     ->withInput();
        // }

        // $request->validate([
        //     'title'=>'required|max:255',
        // ]);
        // dd($request->all());
        $userID = auth()->user()->id;
        $request['user_id'] = $userID; 
        $todo = Todo::create($request->all());
        if($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name'=>$step]);
            }
        }
        return redirect()->back()->with('message','Todo created successfully');
        // auth()->user()->todos()->create($request->all());
        // return redirect(route('todo.index'))->with('message', 'Todo Created Successfully');
    }

    public function edit(Todo $todo)
    {
        // dd($todo->title);
        // dd($todo->title);
        // $todo = Todo::find($id);
        // return $todo;
        return view('todos.edit',compact('todo'));
    }
    
    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title'=>$request->title]);
        if($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                // $step = Step::find();
                // dd($step);
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name' => $value]);
                }else {
                    $step = Step::find($id);
                    // dd($step);
                    $step->update(['name'=>$value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message','updated!!!!!');
        // dd($request->all());
    }
    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message','Task Completed!!!');
    }
    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message','Task InCompleted!!!');
    }
    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message','Task delete!!!!!!');
    }
}
