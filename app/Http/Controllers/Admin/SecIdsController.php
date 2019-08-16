<?php

namespace App\Http\Controllers\Admin;

use App\SecIds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use Illuminate\Support\Facades\File;
use DataTables;
use Illuminate\Support\Facades\Lang;

class SecIdsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:access.sec_ids');
        // $this->middleware('permission:access.sec_ids.edit')->only(['edit', 'update']);
        // $this->middleware('permission:access.sec_ids.create')->only(['create', 'store']);
        // $this->middleware('permission:access.sec_ids.delete')->only('destroy');
    }
     /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function classDatatable(Request $request) {
        $record = SecIds::all();

        return Datatables::of($record)->make(true);
    }

    public function index(Request $request)
    {
        return view('admin.sec_ids.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {        
        return view('admin.sec_ids.create');
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
            'name' => 'required|unique:sec_ids', //unique:users,email,NULL,id,deleted_at,NULL
            ]
        );

        $sec_ids = SecIds::create($request->all());
        Session::flash('flash_message', __('Sec Id added!'));
        return redirect('admin/sec_ids/');
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
        $sec_ids = SecIds::where('id',$id)->first();
        if($sec_ids){
            return view('admin.sec_ids.show', compact('sec_ids'));
        } else {
            return redirect('admin/sec_ids');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $sec_ids = SecIds::where('id',$id)->first();
        if($sec_ids){
            return view('admin.sec_ids.edit', compact('sec_ids'));
        }else{
            return redirect('admin/sec_ids');
        }
    }

    /**
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $sec_ids = SecIds::findOrFail($id);
        $sec_ids->update($request->all());
        
        Session::flash('flash_message', __('Sec Id updated!'));

        return redirect('admin/sec_ids');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function destroy($id)
    {
        SecIds::destroy($id);

        Session::flash('flash_message', __('Sec Id deleted!'));

        return redirect('admin/sec_ids');
    }

}
