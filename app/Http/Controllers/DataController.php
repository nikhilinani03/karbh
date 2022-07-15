<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(empty(session('id')))
        {
            return redirect('login');
        }
        $data = json_decode(file_get_contents('http://mmb.karbh.com/api/v1/categories'));
        return view('home')->with(compact('data'));
        
    }
    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
    public function Login(Request $r)
    {
        $r->validate([
            'mobile' => 'required | digits:10 | numeric',
            'password' => 'required | min:8 | regex:/^[a-zA-Z0-9@]+$/ | regex:/[@$!%*#?&]/'
        ]);
        $user = User::where('mobile',$r->mobile)->where('password',md5($r->password))->first();
        if(!empty($user))
        {
            session(['id'=> $user->id,'name'=> $user->name]);
            return redirect('users');
        }
        else
        {
            return redirect('/login')->withErrors(['msg'=>'No User Found']);
        }
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
        //
        $request->validate([
            'name' => 'required',
            'mobile' => 'required | digits:10 | numeric',
            'password' => 'required | min:8 | regex:/^[a-zA-Z0-9@]+$/ | regex:/[@$!%*#?&]/'
        ]);
        $input = $request->all();
        $finder = User::where('mobile',$request->mobile)->first();
        if(!empty($finder))
        {
            return redirect()->back()->withErrors(['msg'=> 'User Already Exist']);
        }
        $user = User::createFor($input);
        return redirect('/login');
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
}
