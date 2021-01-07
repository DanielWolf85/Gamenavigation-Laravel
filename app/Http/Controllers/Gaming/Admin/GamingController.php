<?php

namespace App\Http\Controllers\Gaming\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Gaming\Admin\AdminBaseController;

class GamingController extends AdminBaseController
{
    public function welcome()
    {
        return view('gaming.admin.welcome');
    }
}
