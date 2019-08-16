<?php

namespace App\Http\Controllers\Admin;

use App\FeeSchedules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use App\Refefile;
use Illuminate\Support\Facades\File;
use DataTables;
use Illuminate\Support\Facades\Lang;

class FeeSchedulesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:access.fee_schedules');
        // $this->middleware('permission:access.fee_schedules.edit')->only(['edit', 'update']);
        // $this->middleware('permission:access.fee_schedules.create')->only(['create', 'store']);
        // $this->middleware('permission:access.fee_schedules.delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function classDatatable(Request $request) {
        $record = FeeSchedules::all();

        return Datatables::of($record)->make(true);
    }

    public function index(Request $request)
    {
        return view('admin.fee_schedules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {        
        return view('admin.fee_schedules.create');
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
                'name' => 'required|unique:fee_schedules'
            ]);
        $fee_schedules = FeeSchedules::create($request->all());
        Session::flash('flash_message', __('Fee Schedule added!'));
        return redirect('admin/fee_schedules/');
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
        $fee_schedules = FeeSchedules::where('id',$id)->first();
        if($fee_schedules){
            return view('admin.fee_schedules.show', compact('fee_schedules'));
        } else {
            return redirect('admin/fee_schedules');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $fee_schedules = FeeSchedules::where('id',$id)->first();
        if($fee_schedules){
            return view('admin.fee_schedules.edit', compact('fee_schedules'));
        }else{
            return redirect('admin/fee_schedules');
        }
    }

    /**
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $fee_schedules = FeeSchedules::findOrFail($id);
        $fee_schedules->update($request->all());
        
        Session::flash('flash_message', __('Fee Schedule updated!'));

        return redirect('admin/fee_schedules');
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
         $ob = FeeSchedules::where("id",$id)->first();

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
