<?php

namespace App\Exports;
use App\Models\PO;
use App\Models\PosDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class PoExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    public function view(): View
    {
        return view('backend.po.export', [
            'po' => PO::select('id','contact_name','contact_email','contact_number','delivery_date','company_name','delivery_due','quote_id','project_reference','supplier_ref_number','delivery_address1','delivery_address2','delivery_address3','customer_address1','customer_address2','customer_address3','po_number','xylem_acc_no','site_name','local_xylem_representative','delivery_postcode','framework_related','specification')->where('id',$this->id)->first(),
            'po_data' => PosDetail::select('quantity','unit_price','description','amount','total_amount','pump_details','make','model','serial_no')->where('pos_id',$this->id)->get()
        ]);
    }
}