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
use App\Lab;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LabsController extends Controller
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
        //$role_list = RoleModel::select('role_id', 'description');
     
       $role_list  = DB::table('types')->lists('description','id');
       return View::make('labs.create')->with(compact('city_list','role_list'));
        //$role_list = RoleModel::select('role_id', 'description');
        //return View::make('labs.create')->with('city_list', $city_list);
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
            'name'        =>  'required',
            'email'                =>  'email|unique:users,email|required',
            'password'          =>  'required|confirmed',
            'password_confirmation' => 'required',
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
            return Redirect::route('labs.create')->withErrors($validator)->withInput();
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
        $users->role_id = 3;
        $users->mime = $file->getClientMimeType();
        $users->photo = $file->getFilename().'.'.$extension;
        $users->save();
        //$g = User::whereRaw('id = (select max(`id`) from users)')->get();
        $uid=DB::table('users')->where('id', DB::raw("(select max(`id`) from users)"))->get();
        foreach ($uid as $did) {
            $userid=$did->id;
        }
        $labs = new Lab;        
        $labs->lab_name = $data["name"];
        $labs->lab_address = $data["address"];
        $labs->lab_ph = $data['phone'];
        $labs->lab_email = $data['email'];        
        $labs->lab_website = $data['website'];
        $labs->city_id = $data['city'];
        $labs->about = $data['about'];
        $labs->direction = $data['direction'];
        $labs->location = $data['location'];
        $labs->mime = $file->getClientMimeType();
        $labs->photo = $file->getFilename().'.'.$extension;
        $labs->user_id = $userid;
        $labs->save();
        //return View::make('labs.all');
        $la = DB::select(DB::raw("select labs.*, cities.city_name from labs inner join cities on cities.id=labs.city_id"));

          return View::make('labs.all')->with(compact('la'));
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
    public function laball()
    {
          $la = DB::select(DB::raw("select labs.*, cities.city_name from labs inner join cities on cities.id=labs.city_id"));

          return View::make('labs.all')->with(compact('la'));
    }
     public function search()
    {
        $name = Input::get('searchtxt');
        $la = DB::select(DB::raw("select labs.*, cities.city_name from labs inner join cities on cities.id=labs.city_id where labs.lab_name LIKE '%$name%' "));
    return View::make('labs.all')->with(compact('la'));
    }
}
