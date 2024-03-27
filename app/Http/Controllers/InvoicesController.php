<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use App\Models\InvoiceModel;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function invoices()
    {
        $data['getRecord'] = InvoiceModel::get();
        return view('admin.invoices.list',$data);
    }

    public function add_invoices(Request $request){
        $data['getRecord'] = CustomersModel::get();
        return view('admin.invoices.add',$data);
    }

    public function  insert_add_invoices(Request $request){
        $save = new InvoiceModel();
        $save->net_total = $request->net_total;
        $save->customers_id = $request->customers_id;
        $save->invoices_date = $request->invoices_date;
        $save->total_amount = $request->total_amount;
        $save->total_discount = $request->total_discount;
        $save->save();
        return redirect('admin/invoices')->with('success', 'Invoice Added Successfully');
        
    }

    public function edit_invoices($id){
        $data['EditRecord'] = InvoiceModel::find($id);
        $data['getRecord'] = CustomersModel::get();
        return view('admin.invoices.edit',$data);
    }

    public function update_invoices(Request $request,$id){
        $update = InvoiceModel::find($id);
        $update->net_total = $request->net_total;
        $update->customers_id = $request->customers_id;
        $update->invoices_date = $request->invoices_date;
        $update->total_amount = $request->total_amount;
        $update->total_discount = $request->total_discount;
        $update->save();
        return redirect('admin/invoices')->with('success', 'Invoice Updated Successfully');
    }

    public function delete_invoices($id){
        $deleteRecord = InvoiceModel::find($id);
        $deleteRecord->delete();
        return redirect()->back()->with('error', 'Invoice Deleted Successfully');
    }

}
