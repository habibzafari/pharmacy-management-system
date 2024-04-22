<?php

namespace App\Http\Controllers;

use App\Models\InvoiceModel;
use App\Models\PurchasesModel;
use App\Models\SupplierModel;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function purchases()
    {
        $data['getRecord'] = PurchasesModel::get();
        return view('admin.purchases.list',$data);
    }

    public function add_purchases()
    {
        $data['getSupplier'] = SupplierModel::get();
        $data['getInvoice'] = InvoiceModel::get();
        return view('admin.purchases.add', $data);
    }

    public function insert_add_purchases(Request $request){
        $save = new PurchasesModel();
        // supplier_id 	invoices_id 	voucher_number 	purchase_date 	total_amount 	payment_status
        $save->supplier_id = $request->supplier_id;
        $save->invoices_id = $request->invoices_id;
        $save->voucher_number = $request->voucher_number;
        $save->purchase_date = $request->purchase_date;
        $save->total_amount = $request->total_amount;
        $save->payment_status = $request->payment_status;
        $save->save();
        return redirect('admin/purchases')->with('success', 'Purchases Added Successfully');
    }

    public function edit_purchases($id ,Request $request){
        $data['getSupplier'] = SupplierModel::get();
        $data['getInvoice'] = InvoiceModel::get();
        $data['getRecord'] = PurchasesModel::find($id);
        return view('admin.purchases.edit', $data);
    }

    public function update_purchases($id ,Request $request){
        $update = PurchasesModel::find($id);
        $update->supplier_id = $request->supplier_id;
        $update->invoices_id = $request->invoices_id;
        $update->voucher_number = $request->voucher_number;
        $update->purchase_date = $request->purchase_date;
        $update->total_amount = $request->total_amount;
        $update->payment_status = $request->payment_status;
        $update->save();
        return redirect('admin/purchases')->with('success', 'Purchases Updated Successfully');
    }

    public function delete_purchases($id){
        $delete = PurchasesModel::find($id);
        $delete->delete();
        return redirect('admin/purchases')->with('success', 'Purchases Deleted Successfully');
    }
}
