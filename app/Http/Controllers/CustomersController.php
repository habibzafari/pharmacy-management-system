<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function customers(Request $request)
    {
        // $data['getRecord'] = CustomersModel::get(); 
        $data['getRecord'] = CustomersModel::getAllRecords(); 
        return view('admin.customers.list',$data);
    }

    public function add_customers()
    {
        // echo "add customers"; die;
        return view('admin.customers.add');
    }

    public function insert_add_customers(Request $request) {
        $save = new CustomersModel();
        $save->name = trim($request->name);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->doctor_name = trim($request->doctor_name);
        $save->doctor_address = trim($request->doctor_address);
        $save->save();
        return redirect('admin/customers')->with('success', 'Customer added successfully');
    }

    public function edit_customers($id)
    {
        // echo $id; die();
        $data['getRecord'] = CustomersModel::getSingle($id);
        return view('admin.customers.edit',$data);
    }

    public function update_customers($id, Request $request){
        $save = CustomersModel::getSingle($id);
        $save->name = trim($request->name);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->doctor_name = trim($request->doctor_name);
        $save->doctor_address = trim($request->doctor_address);
        $save->update();
        return redirect('admin/customers')->with('success', 'Customer updated successfully');
    }

    public function delete_customers($id){
        $save = CustomersModel::getSingle($id);
        $save->delete();
        return redirect('admin/customers')->with('error', 'Customer deleted successfully');
    }
}
