<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use App\Models\InvoiceModel;
use App\Models\MedicinesModel;
use App\Models\MedicinesStockModel;
use App\Models\PurchasesModel;
use App\Models\SupplierModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['TotalCustomers'] = CustomersModel::count();
        $data['TotalMedicines'] = MedicinesModel::count();
        $data['TotalMedicinesStock'] = MedicinesStockModel::count();
        $data['TotalSuppliers'] = SupplierModel::count();
        $data['TotalInvoices'] = InvoiceModel::count();
        $data['TotalPurchases'] = PurchasesModel::count();
        return view('admin.dashboard.list',$data);
    }

    public function my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.my_account.update', $data);
    }

    public function update_my_account(Request $request)
    {
        $save = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id,
        ]);
        $save = User::find(Auth::user()->id);
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        if(!empty($request->password)){
            $save->password = Hash::make($request->password);
        }
        //profile
        if(!empty($request->file('profile_image'))){
            if(!empty($save->profile_image) && file_exists('upload/profile/'.$save->profile_image)){
                unlink('upload/profile/'.$save->profile_image);    
            }
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $fileName = $randomStr.'.'.$file->getClientOriginalExtension();
            $file->move('upload/profile', $fileName);
            $save->profile_image = $fileName;
        }
        // end profile
        $save->save();
        return redirect('admin/my_account')->with('success', 'My account updated successfully');
    }
}
