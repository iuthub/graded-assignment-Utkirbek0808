<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    
    public function Initial()
    {
        $datas = Task::all();
        if(Auth::check())
        {
            $userdatas = Task::where(Auth::user()->id)->get();
            return view('Hello')->with($datas)->($userdatas)
        }
        return view('Welcome')->with($datas);
    }

  
    public function Create()
    {
        return view('Welcome');
    }

    
    public function CreateD(CreateTaskRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $task = new Task([
            'title' => $data['title'],
        ]);

        $user->tasks()->save($task);
        session()->flash('The Task Successfully CreateD'); return redirect('//');
    }
   

    public function Edit($id)
    {
        $data = Task::find($id);
        return view('tasks.edit')->with($data);
    }

 
    public function UpdateD(CreateTaskRequest $request, $id)
    {
        $info = request()->all();
        $datas = Task::find($id);
        $datas->title = $info['title'];
        $datas->save();
        session()->flash( "The Task successfully UpdateD"); return redirect('/');
    }

}
