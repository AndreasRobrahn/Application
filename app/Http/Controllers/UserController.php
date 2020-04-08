<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExampleUser;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\ExampleUser::with('rights')->get();

        foreach($users as $user)
        {
            $rightsarray = $user->rights->pluck('name');
            $user->rightsarray = $rightsarray;
        }

        return response()->json($users);
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
        $request->validate([
          'username' => 'required'
        ]);

        $countuser = ExampleUser::all()->count();

        if($countuser >= 3)
        {
          return 'too many users';
        }
        else
        {
          $user = new ExampleUser;
          $user->username = $request->username;
          $user->email = $request->email;
          $user->save();

          $user->setRights();
        }
        return response()->json($user);
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
    public function rights(Request $request)
    {
      $tasks = explode(',',$request->arrayOfRights);
      // return response()->json($tasks);

      if (($tasks[0]==''))
      {
        $users = ExampleUser::all();
        foreach ($users as $user) {
          $user->setRights();
        }
        return 'alles auf 0 gesetzt';
      }
      foreach($tasks as $task)
      {
        $array = explode('-',$task);
        // $user = \App\ExampleUser::where('id',$array[0])->setRights();
        $rights[$array[0]][] = $array[1];
      }
      // return response()->json($rights);
      foreach ($rights as $key => $value) {
        $user = null;
        $user = ExampleUser::where('id','=', $key)->first();
        $user->setRights($value);
      }
      // $user = \App\ExampleUser::where('id',$array[0])->first();
      // $user->setRights();
      // return response()->json($rights);
    }
}
