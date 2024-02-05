<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class FrontController extends Controller
{
    public function index()
    {
        return view('backend.admin.home.index');
    }

    public function __construct()
    {
        $this->middleware('role_or_permission:dashboard');
    }

}
