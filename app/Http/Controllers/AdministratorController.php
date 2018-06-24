<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrator;
use App\User;
class AdministratorController extends Controller
{
    public function index()
    {
        $admins = User::where('is_admin',1)->paginate(15);
        return view('admins/index',['admins' => $admins]);
    }
}
