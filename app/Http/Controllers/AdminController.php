<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\FileExport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
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
    public function report(Request $request){
        return view('backend.report.index', [
            'title' => 'Report',
            'menu' => 'Report',
            'active' => 2
        ]);
    }

    public function get_crowd_list(Request $request){
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
            'created_at'
        ])
        ->where('id','>',1);
        if($request->start_date && $request->end_date){
            $model = $model->whereDate('created_at', '>=', $request->start_date);
            $model = $model->whereDate('created_at', '<=', $request->end_date);
        }
        $model = $model->orderBy('id', 'desc');
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
    public function fileExport(Request $request)
    {
        return Excel::download(new FileExport($request->start_date,$request->end_date), 'hothatconcert-users.xlsx');
    }
}
