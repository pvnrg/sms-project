<?php

namespace App\Http\Controllers\Admin;

use App\TransactionTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use Illuminate\Support\Facades\File;
use DataTables;
use Illuminate\Support\Facades\Lang;

class TransactionTypesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:access.transaction_types');
        // $this->middleware('permission:access.transaction_types.edit')->only(['edit', 'update']);
        // $this->middleware('permission:access.transaction_types.create')->only(['create', 'store']);
        // $this->middleware('permission:access.transaction_types.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function classDatatable(Request $request) {
        $record = TransactionTypes::all();

        return Datatables::of($record)->make(true);
    }

    public function index(Request $request)
    {
        return view('admin.transaction_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {        
        return view('admin.transaction_types.create');
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
            'name' => 'required|unique:transaction_types', //unique:users,email,NULL,id,deleted_at,NULL
            ]
        );

        $transaction_types = TransactionTypes::create($request->all());
        Session::flash('flash_message', __('Transaction Type added!'));
        return redirect('admin/transaction_types/');
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
        $transaction_types = TransactionTypes::where('id',$id)->first();
        if($transaction_types){
            return view('admin.transaction_types.show', compact('transaction_types'));
        } else {
            return redirect('admin/transaction_types');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $transaction_types = TransactionTypes::where('id',$id)->first();
        if($transaction_types){
            return view('admin.transaction_types.edit', compact('transaction_types'));
        }else{
            return redirect('admin/transaction_types');
        }
    }

    /**
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $transaction_types = TransactionTypes::findOrFail($id);
        $transaction_types->update($request->all());
        
        Session::flash('flash_message', __('Transaction Type updated!'));

        return redirect('admin/transaction_types');
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
        TransactionTypes::destroy($id);

        Session::flash('flash_message', __('Transaction Type deleted!'));

        return redirect('admin/transaction_types');
    }

}
