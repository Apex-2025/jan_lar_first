<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'task'], function () {
    Route::get('/', function () {
        $tasks = Task::all();
        return view('task.index',['tasks' => $tasks,
        ]);

    })->name('task.index');

    Route::get('/create', function (){
       return view('task.create');
    })->name('task.create');

    Route::post('/', function (Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:5',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('task.create')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        return redirect()->route('task.index');
    })->name('task.store');

    Route::delete('/{task}', function (Task  $task){
        $task->delete();
        return redirect()->route('task.index');
    })->name('task.destroy');

    Route::get('/{task}/edit', 'TaskController@edit')->name('task.edit');

    Route::put('/{task}' , 'TaskController@update')->name('task.update');

});
