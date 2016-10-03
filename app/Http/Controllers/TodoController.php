<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\Request;
use App\Jobs\SearchTodo;
use App\Todo;
use function redirect;
use function view;

class TodoController extends Controller
{
    public function create()
    {
        $todo = new Todo();
        return view('todo.add', compact('todo'));
    }
    
    public function store(CreateTodoRequest $request)
    {
        Todo::create($request->all());
        return redirect()
        ->back()
        ->with('message', "Succesfully added in todo.");
    }
    
    public function index(Request $request)
    {
        $todos=Todo::paginate()->sortByDesc("priority");
        return view('todo.index', compact('todos', 'request'));
    }
    
    public function search(Request $request)
    {
        $todos = $this->dispatch(new SearchTodo());
        return view('todo.index', compact('todos', 'request'));
    }
    
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.add', compact('todo'));
    }
    
    public function update($id, Request $request)
    {
        $todo = Todo::find($id)->update($request->toArray());
        return redirect()
        ->back()
        ->with('message', "Succesfully updated in todo.");  
    }
    
    public function destroy($id)
    {
        $todo = Todo::find($id)->delete();
        return redirect()
        ->back()
        ->with('message', "Succesfully deleted in todo.");
    }
    
}