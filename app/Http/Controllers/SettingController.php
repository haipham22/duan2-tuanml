<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Setting;

class SettingController extends Controller
{
    public function general()
    {
        return view('admin.settings.index');
    }

    public function save(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        Setting::set($input);

        return redirect()->back();
    }
}
