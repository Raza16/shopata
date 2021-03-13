<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function pages()
    {
        # code...
        return view('admin.setting.pages');
    }

    public function privacypolicy()
    {
        # code...
        return view('admin.setting.privacy');
    }
}
