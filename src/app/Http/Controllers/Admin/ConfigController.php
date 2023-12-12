<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConfigController extends Controller
{

    public function edit(Config $config)
    {
        if (Gate::allows('config_index'))
        {
            $config = Config::first();
            return view('Admin.config.config-edit', compact('config'));
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function update(Config $config,Request $request)
    {
        $data = $request->all();
        if ($request->has('logo_footer')){
            $data['logo_footer'] = uploadFilePro($request->logo_footer, 'config', '/storage/photos/config')['address'];
        }
        if ($request->has('logo_header')){
            $data['logo_header'] = uploadFilePro($request->logo_header, 'config', '/storage/photos/config')['address'];
        }
        if ($request->has('header')){
            $data['header'] = json_encode(array_filter($request->header));
        }

//        dd($data);

        $config->update($data);
        return redirect()->back()->with('success','تنظیمات با موفقیت تغییر کرد');
    }
}
