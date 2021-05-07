<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Repositories\todo\TodoRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    protected $TodoRepo;

    public function __construct(TodoRepositoryInterface $todoRepo)
    {
        $this->todoRepo = $todoRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = $this->todoRepo->getTodo();
        // $todos=Todo::where(['user_id'=>Auth::user()->id])->simplePaginate(5);
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todos = $this->todoRepo->storeTodo($request);
        session()->flash('success', 'created successful!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        session()->flash('success', 'updated successful!');
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        session()->flash('success', 'deleted successful!');
        return redirect()->route('todos.index');
    }

}
