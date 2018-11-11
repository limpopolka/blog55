<?php


use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function(){
	$tasks = DB::table('tasks')->get(['id', 'name', 'category', 'deadline']);
	dd($tasks);
})->middleware('test');


Route::get('tasks/{task}', function($id){
	$task = DB::table('tasks')->find($id);
	dd($task);
})->middleware('test');;

Route::get('/categories', function(){
	$categories = DB::table('tasks')->get(['id','category']);
	dd($categories);
})->middleware('test');;

Route::get('/complete', function(){
	$complete = DB::table('tasks')->where('status', '=' ,  100)->get(['id', 'name','category', 'deadline']);
	dd($complete);
})->middleware('test');;

Route::post('/tasks', function(Request $request){
	DB::table('tasks')->insert(array(
		'name'        => $request['name'],
		'category'    => $request['category'],
		'deadline'    => $request['deadline'],
		'description' => $request['description'],
		'status'      => $request['status']
	));
	dd($request['name']);
})->middleware('test');;



Route::put('/tasks', function(Request $request){
	DB::table('tasks')->where('id', '=', $request['id'])->update(array(
		'name'        => $request['name'],
		'category'    => $request['category'],
		'deadline'    => $request['deadline'],
		'description' => $request['description'],
		'status'      => $request['status']
	));
	dd($request['name']);
})->middleware('test');;


Route::patch('/tasks/{task}', function($id){
	$task = DB::table('tasks')->where('id', '=', $id)->update(array('status'=> 100));
	dd($task);
})->middleware('test');;

Route::patch('/complete/{task}', function($id){
	$task = DB::table('tasks')->where('id', '=', $id)->update(array('status'=> 0));
	dd($task);
})->middleware('test');;








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
