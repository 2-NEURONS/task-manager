<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $tasks = Task::latest()->get(); // get the latest tasks

      //render a list of tasks completed and uncompleted
      return view('welcome')->with('tasks',$tasks); // end the method by showing a veiw and then pass tasks to the view
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the post Request
        $validatedRequest = $request->validate([
        'title'=>'required|max:255' // the title must not be empty and must be 255 characters long
        ]);// end of validate


      Task::create(
      [
          'title'=>$request->title,
          'completed' => 0
      ]);

      return redirect('/');// return back to the homepage.



    } // end of store method

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //return the edit

        return view('task.edit')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        $task->update($request->all()); // update the request
        return redirect('/'); //back to the homepage
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //delete a Task
        $task->delete();
        return redirect('/');// go back to the home screen
    }
}
