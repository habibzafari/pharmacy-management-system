<?php

namespace App\Http\Controllers;

use App\Models\WebsiteLogoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebsiteLogoController extends Controller
{
    public function website_logo(Request $request)
    {
        $data['getRecord'] = WebsiteLogoModel::find(1);
        return view('admin.website_logo.update', $data);
    }

    public function website_logo_update(Request $request)
    {
        $save = WebsiteLogoModel::find(1);
        $save->website_name = trim($request->website_name);
        //logo
        if(!empty($request->file('logo'))){
            if(!empty($save->logo) && file_exists('upload/logo/'.$save->logo)){
                unlink('upload/logo/'.$save->logo);    
            }
            $file = $request->file('logo');
            $randomStr = Str::random(30);
            $fileName = $randomStr.'.'.$file->getClientOriginalExtension();
            $file->move('upload/logo', $fileName);
            $save->logo = $fileName;
        }
        // end logo
        $save->save();
        return redirect('admin/website_logo')->with('success', 'Website logo updated successfully');
    }
    
}
