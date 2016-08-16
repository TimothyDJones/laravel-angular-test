<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Http\Response;

use Log;
use App\Http\Requests;
use App\Task;

class TaskController extends Controller
{
  protected $request;

  // Use dependency injection to get the Request!
  // See this article for details:
  //     http://stackoverflow.com/questions/28573860/laravel-requestall-should-not-be-called-statically
  public function __construct(\Illuminate\Http\Request $request) {
      $this->request = $request;
  }

  public function index() {
    Log::info('Error method...');

    $tasks = Task::all();
    return $tasks;
  }

  public function store() {
    Log::info('In TaskController@store method...');
    //Log::info(Request::all());

    $task = Task::create($this->request->only(['title', 'description', 'done']));
    //return Response::json($task);
    return $task;
  }

  public function update($id) {
    Log::info('In TaskController@update...' . $id);
    $task = Task::find($id);
    $task->done = $this->request->input('done');
    //$task->updated_at = Date::now();
    $task->save();

    return $task;
  }

  public function destroy($id) {
    Task::destroy($id);
  }

}
