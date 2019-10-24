<?php

namespace App\Http\Controllers;

// importing Todo class
use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retriving all the todos with Todo model
        $todos = Todo::orderBy('created_at','desc')->paginate(8);
        return view('todos.index',['todos'=>$todos,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation rules
        $rules = [
            'title' => 'required|string|unique:todos,title|min:2|max:191',
            'body'  => 'required|string|min:5|max:1000',
        ];
        //custom validation error messages
        $messages = [
        'title.unique' => 'Todo title should be unique', //syntax: field_name.rule
        ];
        //validate the form data
        $request->validate($rules,$messages);
        //create a todo
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save();
        //Redirect to specified route with flash message
        return redirect()
            ->route('todos.index')
            ->with('status','created a new Todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
