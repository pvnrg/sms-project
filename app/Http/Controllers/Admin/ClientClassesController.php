<?php
 
namespace App\Http\Controllers\Admin;

use App\ClientClasses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use Illuminate\Support\Facades\File;
use DataTables;
use Illuminate\Support\Facades\Lang;

class ClientClassesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:access.client_classes');
        // $this->middleware('permission:access.client_classes.edit')->only(['edit', 'update']);
        // $this->middleware('permission:access.client_classes.create')->only(['create', 'store']);
        // $this->middleware('permission:access.client_classes.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function classDatatable(Request $request) {
        $record = ClientClasses::all();

        return Datatables::of($record)->make(true);
    }

    public function index(Request $request)
    {
        return view('admin.client_classes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {        
        return view('admin.client_classes.create');
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
        $this->validate($request,
            [
            'name' => 'required|unique:client_classes', //unique:users,email,NULL,id,deleted_at,NULL
            ]
        );

        $client_classes = ClientClasses::create($request->all());
        Session::flash('flash_message', __('Client Class added!'));
        return redirect('admin/client_classes/');
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
        $client_classes = ClientClasses::where('id',$id)->first();
        if($client_classes){
            return view('admin.client_classes.show', compact('client_classes'));
        } else {
            return redirect('admin/client_classes');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $client_classes = ClientClasses::where('id',$id)->first();
        if($client_classes){
            return view('admin.client_classes.edit', compact('client_classes'));
        }else{
            return redirect('admin/client_classes');
        }
    }

    /**
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $client_classes = ClientClasses::findOrFail($id);
        $client_classes->update($request->all());

        Session::flash('flash_message', __('Client Class updated!'));

        return redirect('admin/client_classes');
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
         $ob = ClientClasses::where("id",$id)->first();

        if($ob){
           
            $ob->delete();
            
            $result['message'] = 'Record deleted Success';
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

}
