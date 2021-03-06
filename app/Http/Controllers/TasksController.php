<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Tag,Task,User};


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $tasks = Task::with(['tags'])->paginate(15);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->fill($request->all());
        $task->create_user = Auth::user()->id;
        $task->save();

        $tags = explode(',', $request->tags);
        $tagarr = [];
        foreach ($tags as $tag) {
            $record = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagarr, $record);
        }
        $tags_id = [];
        foreach ($tagarr as $tag) {
            array_push($tags_id, $tag['id']);
        };
        $task->tags()->sync($tags_id);
        return redirect()->route('tasks.show',$task->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::with(['tags:name'])->find($id);
        if($task->status != true && $task->create_user != Auth::id()) {
            abort(403);
        }
        $user = User::find($task->create_user);
        return view('tasks.show',compact('task','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::with(['tags'])->find($id);
        $tagarr = [];
        foreach($task->tags as $tag) {
            array_push($tagarr,$tag->name);
        }
        $tags = implode(',',$tagarr);
        return view('tasks.edit',compact('task','tags'));
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
        $task = Task::find($id);
        if($task->create_user != Auth::id()) {
            abort(403);
        }
        $task->fill($request->all())->save();

        $tags = explode(',', $request->tags);
        $tagarr = [];
        foreach ($tags as $tag) {
            $record = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagarr, $record);
        }
        $tags_id = [];
        foreach ($tagarr as $tag) {
            array_push($tags_id, $tag['id']);
        };
        $task->tags()->sync($tags_id);
        return redirect()->route('tasks.show',$task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::with(['tags'])->find($id);
        if($task->create_user != Auth::id()) {
            abort(403);
        }
        $task->delete();
        $task->tags()->sync([]);

        return redirect()->route('tasks.index');
    }
}
