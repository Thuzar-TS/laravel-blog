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
use App\Doctor;
use App\Hospital;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
    public function search()
    {
        $name = Input::get('searchtxt');
        $d='d';
        $h='h';

        $result = DB::select(DB::raw("select doctors.doctor_name as name,doctors.id as id,'d' as type from doctors where doctors.doctor_name LIKE '%$name%'
            union 
            select hospitals.hospital_name AS name, hospitals.id AS id,'h' AS type from hospitals where hospital_name LIKE '%$name%'
            "));
 /*       $doctors = DB::table('doctors')
            ->select('doctors.doctor_name AS name', 'doctors.id AS id', '"d" AS type')
            ->where('doctor_name', 'LIKE', '%'.$name.'%');

        $hospitals = DB::table('hospitals')
            ->select('hospitals.hospital_name AS name', 'hospitals.id AS id', '"h" AS type')
            ->where('hospital_name', 'LIKE', '%'.$name.'%');

        $result = $doctors->union($hospitals)->get();
*/
    return View::make('users.search')->with(compact('result'));
//return View::make('users.search', ['result' => $result]);
 //       return $result;
        
 /*        $doctors = Doctor::all(); 
        $hospitals = Hospital::all();
        return View::make('users.search')->with(compact('doctors','hospitals')); */


  //      return View::make('users.search')->with(compact('doctors'));

        //$q = Input::only('searchtxt');

    //$searchTerms = explode(' ', $q);

   /*$query = DB::table('doctors');

    foreach($q as $term)
    {
        $query->where('doctor_name', 'LIKE', '%'. $term .'%');
    }

    $doctors = $query->get();
     return View::make('users.search')->with(compact('doctors'));
     //return View::make('users.search',compact('doctors'));*/
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
         $role_list  = DB::table('roles')->lists('description','id');
        //$role_list = RoleModel::select('role_id', 'description');
        return View::make('users.create')->with('role_list', $role_list);
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
            'name'        =>  'required',
            'email'                =>  'email|unique:users,email|required',
            'password'          =>  'required|confirmed',
            'password_confirmation' => 'required', 
            'role'                  =>'required'
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
        /*if ($newUser = User::create($data)) {
            Auth::login($newUser);
            return redirect()->route('profile');
        }

        return redirect()->route('user.create')->withInput();*/
        //User::create( $data );

     
        
        $users = new User;
        $file = $data['filefield'];
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $users->name = $data["name"];
        $users->email = $data["email"];
        $users->password = $data['password'];
        $users->role_id = $data['role'];
        $users->mime = $file->getClientMimeType();
        $users->photo = $file->getFilename().'.'.$extension;
        $users->save();
          return View::make('users.profile');
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
   public function getphoto($photo){
    
        $entry = User::where('photo', '=', $photo)->firstOrFail();
        $file = Storage::disk('local')->get($entry->photo);
 
        return (new Response($file, 200))->header('Content-Type', $entry->mime);
    }
}
