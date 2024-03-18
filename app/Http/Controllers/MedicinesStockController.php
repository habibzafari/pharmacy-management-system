<?php

namespace App\Http\Controllers;

use App\Models\MedicinesModel;
use App\Models\MedicinesStockModel;
use Illuminate\Http\Request;

class MedicinesStockController extends Controller
{
    public function medicines_stock()
    {
        // echo "hello";die();
        $data['getRecord'] = MedicinesStockModel::get();
        return view('admin.medicines_stock.list',$data);
    }

    public function add_medicines_stock()
    {
        $data['getRecord'] = MedicinesModel::getAllRecords();
        return view('admin.medicines_stock.add',$data);
    }

    // medicines_id 	batch_id 	expiry_date 	quantity 	mrp 	rate
    public function insert_add_medicines_stock(Request $request)
    {
        // dd($request->all());
        $saveUpdate = new MedicinesStockModel;
        $saveUpdate->medicines_id = $request->medicines_id;
        $saveUpdate->batch_id = $request->batch_id;
        $saveUpdate->expiry_date = $request->expiry_date;
        $saveUpdate->quantity = $request->quantity;
        $saveUpdate->mrp = $request->mrp;
        $saveUpdate->rate = $request->rate;
        $saveUpdate->save();
        return redirect('admin/medicines_stock')->with('success', 'Medicines Stock added successfully');
    }

    public function edit_medicines_stock($id)
    {
        $data['oldRecord'] = MedicinesStockModel::find($id);
        $data['getRecord'] = MedicinesModel::getAllRecords();
        return view('admin.medicines_stock.edit',$data);
    }

    public function update_medicines_stock(Request $request, $id){
        $saveUpdate = MedicinesStockModel::find($id);
        $saveUpdate->medicines_id = $request->medicines_id;
        $saveUpdate->batch_id = $request->batch_id;
        $saveUpdate->expiry_date = $request->expiry_date;
        $saveUpdate->quantity = $request->quantity;
        $saveUpdate->mrp = $request->mrp;
        $saveUpdate->rate = $request->rate;
        $saveUpdate->save();
        return redirect('admin/medicines_stock')->with('success', 'Medicines Stock updated successfully');
    }

    public function delete_medicines_stock(Request $request, $id){
        // echo "id is :".$id; die();
        $DeleteRecord = MedicinesStockModel::find($id);
        $DeleteRecord->delete();
        return redirect('admin/medicines_stock')->with('error', 'Medicines Stock deleted successfully');
    }
}
