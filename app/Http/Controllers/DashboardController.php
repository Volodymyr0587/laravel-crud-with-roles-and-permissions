<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return view('dashboards.admin');
        }

        if ($user->hasRole('manager')) {
            return view('dashboards.manager');
        }

        // default regular user dashboard
        return view('dashboards.regular');
    }
}
