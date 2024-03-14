<?php

namespace App\Exports;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class FileExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $start_date;
    protected $end_date;
    function __construct($start_date,$end_date) {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    public function view(): View
    {
        return view('backend.report.user-export', [
            'users' => User::select('id','name','mobile','email','dob','gender','profession','institution','social','about','created_at')->whereDate('created_at','>=',$this->start_date)->whereDate('created_at','<=',$this->end_date)->get()
        ]);
    }
}