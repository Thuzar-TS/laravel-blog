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

class DoctorsController extends Controller
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
        $role_list  = DB::table('cities')->lists('city_name','id');
        //$role_list = RoleModel::select('role_id', 'description');
        return View::make('doctors.create')->with('role_list', $role_list);
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

        $rules = [
            'name'               =>  'required',
            'email'                => 'email|unique:users,email|required',
            'city'                  =>  'required'
        ];
        $message = [
            'required' => 'The :attribute field is required.',
            'unique'    => 'Existing Mail.',
        ];

        $validator = Validator::make($data,$rules,$message);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::route('doctor.create')->withErrors($validator)->withInput();
        }
         $doctors = new Doctor;
        $file = $data['filefield'];
        $extension = $file->getClientOriginalExtension();
        $filename=$file->getFilename().'.'.$extension;
        //Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $destination = 'images/';      
        $file->move($destination, $filename);
        $doctors->doctor_name = $data["name"];
        $doctors->doctor_address = $data["address"];
        $doctors->doctor_ph = $data['phone'];
        $doctors->doctor_email = $data['email'];
        $doctors->city_id = $data['city'];
        $doctors->degree = $data['degree'];        
        $doctors->specialist = $data['special'];
        $doctors->mime = $file->getClientMimeType();
        $doctors->photo = $file->getFilename().'.'.$extension;
        $doctors->save();
      $alldoc = DB::select(DB::raw("select doctors.*,cities.city_name from doctors inner join cities on doctors.city_id=cities.id "));

          return View::make('doctors.all')->with(compact('alldoc'));
    }

    public function docall()
    {
        $alldoc = DB::select(DB::raw("select doctors.*,cities.city_name from doctors inner join cities on doctors.city_id=cities.id "));
        $hospitalid = 0;
        $c = 0;
          return View::make('doctors.all')->with(compact('alldoc','hospitalid','c'));
    }
    public function doclistall($id)
    {
        $alldoc = DB::select(DB::raw("select doctors.*,cities.city_name from doctors inner join cities on doctors.city_id=cities.id "));
        $hospitalid=$id;
        $c = DB::select(DB::raw("select * from cities"));
          return View::make('doctors.all')->with(compact('alldoc','hospitalid','c'));
    }
     public function search()
    {
        $name = Input::get('searchtxt');
        $alldoc = DB::select(DB::raw("select doctors.*,cities.city_name from doctors inner join cities on doctors.city_id=cities.id where doctors.doctor_name LIKE '%$name%' "));
    return View::make('doctors.all')->with(compact('alldoc'));
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
