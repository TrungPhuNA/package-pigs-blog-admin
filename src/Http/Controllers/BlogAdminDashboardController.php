<?php

namespace Pigs\BlogAdmin\Http\Controllers;

use App\Http\Controllers\Controller;

class BlogAdminDashboardController extends Controller
{
    public function index()
    {
        return view('adm_blog::index');
    }
}
