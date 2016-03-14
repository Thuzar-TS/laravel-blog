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
        $h=DB::select(DB::raw("select * from hospitals"));
         return View::make('users.index')->with(compact('h'));
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
          
           if (Auth::user()->role_id == 2) {
              $hid = Auth::user()->id;
             /*$h=DB::select(DB::raw("select * from hospitals where id=$hh"));
             foreach ($h as $aa){
              $hid=$aa->id;
              return $this->hosdetail($hid);*/
          $hos = DB::select(DB::raw("select * from hospitals where user_id=$hid"));
          foreach ($hos as $key) {
            $hh = $key->id;
          }
          // $hos = Hospital::find($id);
          $doc = DB::select(DB::raw("select d.doctor_name, d.id, d.degree, d.doctor_address, d.specialist from doctors as d inner join 
          doctor_hospital_junction as jun on d.id=jun.doctor_id where jun.hospital_id=$hh"));

 //         return Redirect::route('hospital')->with(compact('hos','doc'));
          return View::make('users.hospital')->with(compact('hos','doc'));
            }

             elseif (Auth::user()->role_id == 3) {
              $lid = Auth::user()->id;
             /*$h=DB::select(DB::raw("select * from hospitals where id=$hh"));
             foreach ($h as $aa){
              $hid=$aa->id;
              return $this->hosdetail($hid);*/
          $lid = DB::select(DB::raw("select * from labs where user_id=$lid"));
         foreach ($lid as $key) {
            $ld = $key->id;
          }
          // $hos = Hospital::find($id);
        $la = DB::select(DB::raw("select labs.*, cities.city_name from labs inner join cities on cities.id=labs.city_id where labs.id=$ld"));

          return View::make('users.lab')->with(compact('la'));

 //         return Redirect::route('hospital')->with(compact('hos','doc'));
          //return View::make('labs.lab')->with(compact('det'));
          // return Redirect::route('lab')->with(compact('la'));
            }
          
            else{
                $h=DB::select(DB::raw("select * from hospitals"));
                return View::make('users.index')->with(compact('h'));
            }
        }

         if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::route('login')->withErrors($validator)->withInput();
        }
        
        return Redirect::route('login')->withInput();
    }

    public function profile()
    {
        $entries = User::all();
 
        return view('users.profile', compact('entries')); 
        //return View::make('users.profile');
    }
    public function search()
    {
        $name = Input::get('searchtxt');
        $d='d';
        $h='h';

        $result = DB::select(DB::raw("select u.*, c.city_name as cityname from (select doctors.doctor_name as name, doctors.photo AS photo,doctors.id as id, doctors.city_id as city, doctors.degree as d, doctors.specialist as s, 'd' as type from doctors where doctors.doctor_name LIKE '%$name%'
            union 
            select hospitals.hospital_name AS name, hospitals.photo AS photo, hospitals.id AS id, hospitals.city_id as city, 'd' as d, 's' as s, 'h' AS type from hospitals where hospital_name LIKE '%$name%'
            union
            select labs.lab_name AS name, labs.photo AS photo, labs.id AS id, labs.city_id as city, 'd' as d, 's' as s, 'h' AS type from labs where lab_name LIKE '%$name%') as u inner join cities as c on c.id=u.city
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

    public function docdetail($id)
    {
        $dd = DB::select(DB::raw("select * from doctors where id=$id"));

        $dr = DB::select(DB::raw("
            select h.hospital_name as name,h.photo as photo, h.id as hid, h.hospital_type, h.hospital_address as address,t.description as type, t.id,
            jun.hospital_id,jun.doctor_id from doctor_hospital_junction as jun 
            inner join hospitals as h on h.id=jun.hospital_id
            inner join types as t on h.hospital_type=t.id
            where jun.doctor_id=".$id."
            "));

          return View::make('users.doctor')->with(compact('dr','dd'));
    }

    public function hosdetail($hid)
    {
        $hos = DB::select(DB::raw("select * from hospitals where id=$hid"));
        // $hos = Hospital::find($id);
        $doc = DB::select(DB::raw("select d.doctor_name, d.id, d.degree, d.doctor_address, d.specialist from doctors as d inner join 
          doctor_hospital_junction as jun on d.id=jun.doctor_id where jun.hospital_id=$hid"));

          return View::make('users.hospital')->with(compact('hos','doc'));
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
        $filename=$file->getFilename().'.'.$extension;
        //Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $destination = 'images/';      
        $file->move($destination, $filename);
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
      $users     =    User::find($id);
      $role_list  =    DB::table('roles')->lists('description','id');
    // Load user/createOrUpdate.blade.php view
    return View::make('users.edit')->with(compact('users','role_list'));
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
       $data = $request->except('_token');

        $rules = [
            'name'        =>  'required',
            'email'                =>  'email|users,email|required',
            'password'          =>  'required|confirmed',
            'password_confirmation' => 'required', 
            'role'                  =>'required'
        ];
        $message = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'Confirmed Password does not match.'
        ];

        $validator = Validator::make($data,$rules,$message);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::route('user.edit')->withErrors($validator)->withInput();
        }

        $data['password'] = bcrypt($data['password']);
        unset($data['password_confirmation']);
        /*if ($newUser = User::create($data)) {
            Auth::login($newUser);
            return redirect()->route('profile');
        }

        return redirect()->route('user.create')->withInput();*/
        //User::create( $data );

     
        
        $users = User::find($id);
        $file = $data['filefield'];
        $extension = $file->getClientOriginalExtension();
        $filename=$file->getFilename().'.'.$extension;
        //Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $destination = 'images/';      
        $file->move($destination, $filename);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function labdetail($id){
        $la = DB::select(DB::raw("select labs.*, cities.city_name from labs inner join cities on cities.id=labs.city_id where labs.id=$id"));

          return View::make('users.lab')->with(compact('la'));
    }
  }
