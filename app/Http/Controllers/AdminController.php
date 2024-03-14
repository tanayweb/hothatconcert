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
    public function fileExport(Request $request,$start_date,$end_date)
    {
        return Excel::download(new FileExport($start_date,$end_date), 'hothatconcert-users.xlsx');
    }
}
