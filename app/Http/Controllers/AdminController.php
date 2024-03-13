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
            $model = User::select([
                'id',
                'name',
                'mobile',
                'email',
                'dob',
                'gender',
                'profession',
                'institution',
                'social',
                'about',
                'sms_sent'
            ])
                ->orderBy('id', 'desc');
            return DataTables::eloquent($model)
                // ->addColumn('action', function ($row) {
                //     return $excelBtn . '&nbsp;&nbsp;' . $viewBtn;
                // })
                ->addIndexColumn()
                ->toJson();
        }
        return view('backend.po.list', [
            'title' => 'All PO List',
            'menu' => 'PO'
        ]);
    }

    public function report(Request $request){
        return view('backend.report.index', [
            'title' => 'Report',
            'menu' => 'Report',
            'active' => 2
        ]);
    }

    public function get_crowd_list(Request $request){
        $model = USER::select([
            'id',
            'name',
            'mobile',
            'email',
            'dob',
            'gender',
            'profession',
            'institution',
            'social',
            'about',
            'created_at'
        ])
        ->where('id','>',1)
        ->orderBy('id', 'desc');
        return DataTables::eloquent($model)
            ->editColumn('profession', function ($row) {
                if($row->profession){
                    if($row->profession == 'Job_Holder'){
                        return 'Job Holder';
                    }else{
                        return $row->profession;
                    }
                }
            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d',strtotime($row->created_at));
            })
            ->addIndexColumn()
            ->toJson();
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
