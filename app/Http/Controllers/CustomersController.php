<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function customers(Request $request)
    {
        return view('admin.customers.list');
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
}
