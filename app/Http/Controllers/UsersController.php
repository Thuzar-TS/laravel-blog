<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect; 
use View;
use Validator;
use Auth;
use Hash;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('users.index');
    }

     public function login()
    {
        return View::make('users.login');
    }

    public function handleLogin()
    {
       $data = Input::only(['email', 'password']);

       $rules = [
            'email'                =>  'email|required',
            'password'          =>  'required',
        ];
        $message = [
            'required' => 'The :attribute field is required.'
        ];

        $validator = Validator::make($data,$rules,$message);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            return Redirect::to('profile');
        }

         if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::route('login')->withErrors($validator)->withInput();
        }
        
        return Redirect::route('login')->withInput();
    }

    public function profile()
    {
       return View::make('users.profile');
    }

    public function logout()
    {
        if(Auth::check()){
          Auth::logout();
        }
         return Redirect::route('login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
     public function store(Request $request)
    {
        //$data = Input::only(['first_name','last_name','email','password', 'password_confirmation']);
        $data = $request->except('_token');

        $rules = [
            'user_name'        =>  'required',
            'email'                =>  'email|unique:users,email|required',
            'password'          =>  'required|confirmed',
            'password_confirmation' => 'required'
        ];
        $message = [
            'required' => 'The :attribute field is required.',
            'unique'    => 'Existing Mail.',
            'confirmed' => 'Confirmed Password does not match.'
        ];

        $validator = Validator::make($data,$rules,$message);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::route('user.create')->withErrors($validator)->withInput();
        }

        $data['password'] = bcrypt($data['password']);
        unset($data['password_confirmation']);
        if ($newUser = User::create($data)) {
            Auth::login($newUser);
            return redirect()->route('profile');
        }

        return redirect()->route('user.create')->withInput();
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
