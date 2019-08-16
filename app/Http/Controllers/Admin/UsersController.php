<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;

use Illuminate\Http\Request;
use Session;
use App\Notifications\Signup;
use Illuminate\Support\Facades\File;
use DataTables;
use App\FeeSchedules;
use App\ClientClasses;
use App\Specializations;
use DB;

class UsersController extends Controller

{

    public function __construct()
    {
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function userDatatable(Request $request) {
        $record = User::with('roles');
        $record = User::with('roles')->where('id', '!=', Auth::id())->except(1)->get();
        // $record = DB::select('select u.id, u.first_name, r.label from users u inner join role_user ru on u.id = ru.user_id left join roles r on r.id = ru.role_id where r.id NOT IN (1) ORDER BY id DESC');

        return Datatables::of($record)->make(true);
    }

    public function index(Request $request)
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$roles= Role::pluck('label', 'name');
		$selected_role = [];

        $fee_schedules = FeeSchedules::select('id', 'name')->get();
        $fee_schedules = $fee_schedules->pluck('name', 'id');

        $client_classes = ClientClasses::select('id', 'name')->get();
        $client_classes = $client_classes->pluck('name', 'id');

        $beneficial_owner = User::select('id', 'first_name', 'last_name')->get();
        $beneficial_owner = $beneficial_owner->pluck('first_name', 'last_name', 'id');

        return view('admin.users.create', compact('roles','selected_role', 'fee_schedules', 'client_classes', 'beneficial_owner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:users',
                'roles' => 'required',
                'account_no' => 'required|unique:users'
            ]);

        // $data = $request->all();

        // print_r($data);
        // die;
        // $data['utype'] = "employee";
        $role = Role::where('name',$request->roles)->first();

        $user = new User();

        $user->account_no=$request->account_no;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->contact=$request->contact;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->tax_from=$request->tax_from;
        $user->is_corporate=($request->is_corporate == 'on') ? 1 : 0;
        $user->fees_id=($request->fee_schedules) ? $request->fee_schedules : null;
        $user->client_class_id=$request->client_classes;
        $user->beneficial_owner_id=$request->beneficial_owner;

        if ($request->file('passport')) {
            $fimage = $request->file('passport');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['passport'] = $filename;
            $user->passport=$data['passport'];
        }
        if ($request->file('proof_of_residency')) {
            $fimage = $request->file('proof_of_residency');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['proof_of_residency'] = $filename;
            $user->proof_of_residency=$data['proof_of_residency'];
        }

        if ($request->file('certificate_of_incorpo')) {
            $fimage = $request->file('certificate_of_incorpo');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['certificate_of_incorpo'] = $filename;
            $user->certificate_of_incorpo=$data['certificate_of_incorpo'];
        }

        if ($request->file('articals_memorandoms')) {
            $fimage = $request->file('articals_memorandoms');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['articals_memorandoms'] = $filename;
            $user->articals_memorandoms=$data['articals_memorandoms'];
        }

        if ($request->file('cert_of_incumbency')) {
            $fimage = $request->file('cert_of_incumbency');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['cert_of_incumbency'] = $filename;
            $user->cert_of_incumbency=$data['cert_of_incumbency'];
        }

        if ($request->file('cert_of_good_standing')) {
            $fimage = $request->file('cert_of_good_standing');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['cert_of_good_standing'] = $filename;
            $user->cert_of_good_standing=$data['cert_of_good_standing'];
        }

        $token = app('auth.password.broker')->createToken($user);
        $user->notify(new Signup($user, $token));
        
        $user->save();
        $user->roles()->attach($role);   
        
        Session::flash('flash_message', __('User added!'));

		
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show($id)
    {

        $user = User::where("id",$id)->first();

        if(!$user){
            Session::flash('flash_message', 'No Access !');
            return redirect()->back();
        }
        

        
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function edit($id)
    {
       if($id == 1 && Auth::user()->id != 1) {
            return redirect()->back();
        }

        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name')->prepend('--Select Role--','');

        $fee_schedules = FeeSchedules::select('id', 'name')->get();
        $fee_schedules = $fee_schedules->pluck('name', 'id');

        $client_classes = ClientClasses::select('id', 'name')->get();
        $client_classes = $client_classes->pluck('name', 'id');

        $beneficial_owner = User::select('id', 'first_name', 'last_name')->get();
        $beneficial_owner = $beneficial_owner->pluck('first_name', 'last_name', 'id');

        $user = User::where('id',$id)->first();
   
        if($user){

            $user_roles = [];
            foreach ($user->roles as $role) {
                $user_roles[] = $role->name;
            }

            // $capsule = CapsuleOwner::pluck('name','capsule_id')->prepend('--Select--','');
            return view('admin.users.edit', compact('user', 'roles', 'user_roles', 'fee_schedules', 'client_classes', 'beneficial_owner'));
        } else {
            return redirect('admin/users');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $this->validate($request,[
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:users',
                'roles' => 'required'
            ]);
        $user = User::findOrFail($id);
        
        $user->account_no=$request->account_no;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->contact=$request->contact;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->tax_from=$request->tax_from;
        $user->is_corporate=($request->is_corporate == 'on') ? 1 : 0;
        $user->fees_id=($request->fee_schedules) ? $request->fee_schedules : null;
        $user->client_class_id=$request->client_classes;
        $user->beneficial_owner_id=$request->beneficial_owner;

        if ($request->file('passport')) {
            $fimage = $request->file('passport');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['passport'] = $filename;
            $user->passport=$data['passport'];
        }
        if ($request->file('proof_of_residency')) {
            $fimage = $request->file('proof_of_residency');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['proof_of_residency'] = $filename;
            $user->proof_of_residency=$data['proof_of_residency'];
        }

        if ($request->file('certificate_of_incorpo')) {
            $fimage = $request->file('certificate_of_incorpo');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['certificate_of_incorpo'] = $filename;
            $user->certificate_of_incorpo=$data['certificate_of_incorpo'];
        }

        if ($request->file('articals_memorandoms')) {
            $fimage = $request->file('articals_memorandoms');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['articals_memorandoms'] = $filename;
            $user->articals_memorandoms=$data['articals_memorandoms'];
        }

        if ($request->file('cert_of_incumbency')) {
            $fimage = $request->file('cert_of_incumbency');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['cert_of_incumbency'] = $filename;
            $user->cert_of_incumbency=$data['cert_of_incumbency'];
        }

        if ($request->file('cert_of_good_standing')) {
            $fimage = $request->file('cert_of_good_standing');
            $filename = uniqid(time()) . '.' . $fimage->getClientOriginalExtension();            
            $fimage->move(public_path('/user/'), $filename);
            $data['cert_of_good_standing'] = $filename;
            $user->cert_of_good_standing=$data['cert_of_good_standing'];
        }

        $user->save();
        // $company->user_id=$user->id;
        
        $role = Role::where('name',$request->roles)->first();

        if($request->has('roles') && ( $request->roles != null || $request->roles != '' )){
            $user->roles()->detach();
            $user->roles()->attach($role);
        }
        
        
        Session::flash('flash_message', __('User updated!'));

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function destroy($id,Request $request)
    {
        $result = array();
        $ob = User::where("id",$id)->where("id","!=",\Auth::user()->id)->where("id","!=",1)->first();

        if($ob){
            $ob->roles()->detach();
            $ob->delete();
            
			$result['message'] = \Lang::get('comman.responce_msg.record_deleted_succes');;
            $result['code'] = 200;
        }else{
            Session::flash('flash_message', 'No Access !');
            $result['message'] = \Lang::get('comman.responce_msg.you_have_no_permision_to_delete_record');;
            $result['code'] = 400;
        }


        if($request->ajax()){
            return response()->json($result, $result['code']);
        }else{
            Session::flash('flash_message',$result['message']);
            return redirect('admin/users');
        }
    }

    
    
    
    
    public function uploadPhoto(Request $request)
    {
        if ($request->hasFile('photo')) {

//            dd($request->file('image'));
            $file = $request->file('photo');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', \Carbon\Carbon::now()->toDateTimeString() . uniqid());

            $name = $timestamp . '-' . $file->getClientOriginalName();

//            dd($name);
//            $image->filePath = $name;

            $file->move(public_path() . '/uploads/', $name);

            return $name;
        } else {

            return null;
        }

    }
    public function removeImage($imageName)
    {
        $image_path1 = public_path()."/uploads/".$imageName;

        if ($imageName && $imageName !="" && File::exists($image_path1)) {
            unlink($image_path1);
        }
    }

}
