<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $search = $request -> search;

        if($search){
            $users = User::where('name', 'LIKE', "%" . $search . "%")
            ->orwhere('email', 'LIKE', "%" . $search . "%")->get();
        }
        
        if(count($users) > 0){
            return view('/userlist', ['users' => $users ]);
        }
        else{
            return redirect('/user')->with('message','No Results found!');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|same:password|min:6',
            'c-password' => 'required|same:password|min:6',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ]);
        // User::create([
        //     'name' => $request->get('name'),
        //     'email' => $request->get('email'),
        //     'password' => Hash::make($request->get('password')),
        //     'phone' => $request->get('phone'),
        //     'dob' => $request->get('date'),
        //     'address' => $request->get('address'),
        // ]);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone' => $request->get('phone'),
            'dob' => $request->get('dob'),
            'address' => $request->get('address'),
        ]);
        $user->save();

        return redirect('/users')->with('message', 'You have successfully created!');
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
        $data = User::find($id);

        return view('users.edit', ['user' => $data]);
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
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->dob = $request->get('dob');
        $user->save();
        return redirect('/users')->with('message', 'You have successsfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user -> delete();
        return redirect('/users')->with('message', 'You have successsfully deleted!');

    }
}
