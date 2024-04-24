<?php

namespace App\Http\Controllers;

use App\Models\MedicinesModel;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{
    public function medicines()
    {
        $data['getRecord'] = MedicinesModel::getAllRecords();
        $data['meta_title'] = "Medicines"; 
        return view('admin.medicines.list',$data);
    }

    public function add_medicines()
    {
        // echo "add customers"; die;
        return view('admin.medicines.add');
    }

    public function insert_add_medicines(Request $request)
    {
        $save = new MedicinesModel();
        $save->name = trim($request->name);
        $save->packing = trim($request->packing);
        $save->generic_name = trim($request->generic_name);
        $save->supplier_name = trim($request->supplier_name);
        $save->save();
        return redirect('admin/medicines')->with('success', 'Medicines added successfully');

    }

    public function edit_medicines($id)
    {
        // echo $id; die();
        $data['getRecord'] = MedicinesModel::getSingle($id);
        return view('admin.medicines.edit',$data);
    }

    public function update_medicines($id, Request $request){
        $save = MedicinesModel::getSingle($id);
        $save->name = trim($request->name);
        $save->packing = trim($request->packing);
        $save->generic_name = trim($request->generic_name);
        $save->supplier_name = trim($request->supplier_name);
        $save->update();
        return redirect('admin/medicines')->with('success', 'Medicines updated successfully');
    }

    public function delete_medicines($id)
    {
        $save = MedicinesModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect('admin/medicines')->with('error', 'Medicines deleted successfully');
    }
}
