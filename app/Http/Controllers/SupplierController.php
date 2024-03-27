<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplier(){
        $data['getRecord'] = SupplierModel::get();
        return view('admin.supplier.list',$data);
    }

    public function add_supplier(){
        return view('admin.supplier.add');
    }

    // supplier_name 	supplier_email 	contact_number 	address

    public function insert_supplier(Request $request){

        $insert = new SupplierModel();
        $insert->supplier_name = $request->supplier_name;
        $insert->supplier_email = $request->supplier_email;
        $insert->contact_number = $request->contact_number;
        $insert->address = $request->address;
        $insert->save();
        return redirect('admin/supplier')->with('success','Supplier Added Successfully');
    }

    public function edit_supplier($id){
        $data['getRecord'] = SupplierModel::find($id);
        return view('admin.supplier.edit',$data);
    }

    public function update_supplier(Request $request,$id){
        $update = SupplierModel::find($id);
        $update->supplier_name = $request->supplier_name;
        $update->supplier_email = $request->supplier_email;
        $update->contact_number = $request->contact_number;
        $update->address = $request->address;
        $update->save();
        return redirect('admin/supplier')->with('success','Supplier Updated Successfully');
    }

    public function delete_supplier($id){
        $delete = SupplierModel::find($id);
        $delete->delete();
        return redirect('admin/supplier')->with('error','Supplier Deleted Successfully');
    }

}
