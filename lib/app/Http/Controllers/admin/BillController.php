<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Bills;
use App\Models\Bill_Details;

class BillController extends Controller
{
    public function getBill()
    {
    	$data['customers'] = Bills::leftjoin('db_customers', 'db_customers.cus_id', 'db_bills.cus_id')
            -> get();
    	return view('admin.bill', $data);
    }

    public function getEditBill($id)
    {
        $data['bill'] = Bills::find($id);
    	$data['customers'] = Customers::find($data['bill']->cus_id);
    	$data['bill_detail'] = Bill_Details::where('bill_id', '=', $id)->get();
    	return view('admin.editbill', $data);
    }

    public function postEditBill(Request $request,$id)
    {
    	$bill = new Bills;
    	$arr['bill_trangthai'] = $request->status;
    	$bill::where('bill_id', $id)->update($arr);
        return redirect('admin/bill');
    }

    public function getDelete($id)
    {
    	Customers::destroy($id);
    	return back();
    }
}
