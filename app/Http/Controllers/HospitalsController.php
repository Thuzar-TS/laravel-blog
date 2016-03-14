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
use App\Facilityjunction;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
         $city_list  = DB::table('cities')->lists('city_name','id');
         $role_list  = DB::table('types')->lists('description','id');
         $facility = DB::select(DB::raw("select * from facilities"));
        //$role_list = RoleModel::select('role_id', 'description');
        return View::make('hospitals.create')->with(compact('role_list', 'city_list', 'facility'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
      $data = $request->except('_token');
    //  var_dump($data);
    //  exit();
        $rules = [
            'name'        =>  'required',
            'email'                =>  'email|unique:users,email|required',
            'password'          =>  'required|confirmed',
            'password_confirmation' => 'required', 
            'type'                  =>'required',
             'city'                 =>'required'
        ];
        $message = [
            'required' => 'The :attribute field is required.',
            'unique'    => 'Existing Mail.',
             'confirmed' => 'Confirmed Password does not match.'
        ];

        $validator = Validator::make($data,$rules,$message);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::route('hospitals.create')->withErrors($validator)->withInput();
        }

        $data['password'] = bcrypt($data['password']);
        unset($data['password_confirmation']);
        $file = $data['filefield'];
        $extension = $file->getClientOriginalExtension();
        $filename=$file->getFilename().'.'.$extension;
        //Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $destination = 'images/';      
        $file->move($destination, $filename);
        $users = new User;
        $users->name = $data["name"];
        $users->email = $data['email'];
        $users->password = $data['password'];
        $users->role_id = 2;
        $users->mime = $file->getClientMimeType();
        $users->photo = $file->getFilename().'.'.$extension;
        $users->save();
        //$g = User::whereRaw('id = (select max(`id`) from users)')->get();
        $uid=DB::table('users')->where('id', DB::raw("(select max(`id`) from users)"))->get();
        foreach ($uid as $did) {
            $userid=$did->id;
        }
        $hospitals = new Hospital;        
        $hospitals->hospital_name = $data["name"];
        $hospitals->hospital_address = $data["address"];
        $hospitals->hospital_ph = $data['phone'];
        $hospitals->hospital_email = $data['email'];        
        $hospitals->hospital_website = $data['website'];
        $hospitals->hospital_type = $data['type'];
        $hospitals->city_id = $data['city'];
        $hospitals->about = $data['about'];
        $hospitals->direction = $data['direction'];
        $hospitals->location = $data['location'];
        $hospitals->mime = $file->getClientMimeType();
        $hospitals->photo = $file->getFilename().'.'.$extension;
        $hospitals->user_id = $userid;
        $hospitals->save();
        $hid=DB::table('hospitals')->where('id', DB::raw("(select max(`id`) from hospitals)"))->get();
        foreach ($hid as $hd) {
            $hospitalsid=$hd->id;
        }
       $facility = DB::select(DB::raw("select * from facilities"));
        foreach( $facility as $f ){
            if (isset($data[$f->id])) {
                $fac = new Facilityjunction;
                $fac->hospital_id = $hospitalsid;
                $fac->facilities_id = $data[$f->id];
                $fac->save();
            }
        }
         $allhos = DB::select(DB::raw("select hospitals.*,cities.city_name from hospitals inner join cities on hospitals.city_id=cities.id "));
          return View::make('hospitals.all')->with(compact('allhos'));
    }

    public function hosall()
    {
        $allhos = DB::select(DB::raw("select hospitals.*,cities.city_name from hospitals inner join cities on hospitals.city_id=cities.id "));

          return View::make('hospitals.all')->with(compact('allhos'));
    }
     public function search()
    {
        $name = Input::get('searchtxt');
        $allhos = DB::select(DB::raw("select hospitals.*,cities.city_name from hospitals inner join cities on hospitals.city_id=cities.id where hospitals.hospital_name LIKE '%$name%' "));
    return View::make('hospitals.all')->with(compact('allhos'));
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
