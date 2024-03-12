<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Alert;
use Auth;

class AdminController extends Controller
{

    public $csessions, $sessions;
    function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_po_list(Request $request)
    {
        if ($request->ajax()) {
            $model = PO::select([
                'id',
                'contact_name',
                'contact_number',
                'delivery_date',
                'delivery_address1',
                'customer_address1',
                'po_number'
            ])
                ->orderBy('id', 'desc');
            return DataTables::eloquent($model)
                ->addColumn('action', function ($row) {
                    $excelBtn = '<a title="Excel" href="' . route('file-export', encrypt($row->id)) . '" class="btn btn-sm btn-outline-primary btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7"><i class="fal fa-file-excel"></i></a>';
                    $viewBtn = '<a title="View" href="' . route('po.show', encrypt($row->id)) . '" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7"><i class="fal fa-eye"></i></a>';
                    ')" id="s-sweetalert2-example-7" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7"><i class="fal fa-trash"></i></a>';
                    return $excelBtn . '&nbsp;&nbsp;' . $viewBtn;
                })
                ->addIndexColumn()
                ->toJson();
        }
        return view('backend.po.list', [
            'title' => 'All PO List',
            'menu' => 'PO'
        ]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = PO::select([
                'id',
                'contact_name',
                'contact_number',
                'delivery_date',
                'delivery_address1',
                'customer_address1',
                'po_number'
            ])
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc');
            return DataTables::eloquent($model)
                ->addColumn('action', function ($row) {
                    $excelBtn = '<a title="Excel" href="' . route('file-export', encrypt($row->id)) . '" class="btn btn-sm btn-outline-primary btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7"><i class="fal fa-file-excel"></i></a>';
                    $viewBtn = '<a title="View" href="' . route('po.show', encrypt($row->id)) . '" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7"><i class="fal fa-eye"></i></a>';
                    $editBtn = '<a title="Edit" href="' . route('po.edit', encrypt($row->id)) . '" class="btn btn-sm btn-outline-primary btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7"><i class="fal fa-edit"></i></a>';
                    $deleteBtn = '<a title="Delete" href="javascript:void(0);" onclick="delete_alert(' . $row->id .
                        ')" id="s-sweetalert2-example-7" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7"><i class="fal fa-trash"></i></a>';
                    return $excelBtn . '&nbsp;&nbsp;' . $viewBtn . '&nbsp;&nbsp;' . $editBtn . '&nbsp;&nbsp;' . $deleteBtn;
                })
                ->addIndexColumn()
                ->toJson();
        }
        return view('backend.po.index', [
            'title' => 'PO List',
            'menu' => 'PO'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.po.create', [
            'title' => 'PO Create',
            'menu' => 'PO Settings'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PO $pO
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PO $pO
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PO $pO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PO $pO
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete($id)
    {
        
    }

    public function delete_po_detail(Request $request)
    {
        
    }

    public function update_logo(Request $request)
    {
        
    }

    public function fileExport($id)
    {
        return Excel::download(new PoExport(decrypt($id)), 'po-collection.xlsx');
    }

    public function create_package()
    {
        
    }
}
