<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        $user = Auth::user();

        $tasks = $user->getTasks();
        return View("tasks.index", array('tasks' => $tasks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        return View("tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        Task::create([
            'task' => $request->get("task"),
            'user_id' => $user->id
        ]);

        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        $user = Auth::user();
        $task = $user->getTask($id)[0];
        return view("tasks.show", ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $user = Auth::user();
        $task = $user->getTask($id)[0];

        return view("tasks.edit", ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $user->updateTask($id, [
            'task' => $request->get("task"),
            'make' => $request->get("make") | 0
        ]);

        return redirect()->route("tasks.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $user->deleteTask($id);

        return redirect()->route("tasks.index");
    }
}
