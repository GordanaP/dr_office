<?php

namespace App\Http\Controllers;

use App\WorkingDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('home', 'settings');
        // $this->middleware('auth.admin')->only('dashboard', 'settings');
    }

    /**
     * Show the application index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = WorkingDay::all();
        $profile = \App\Profile::first();

        return view('welcome', compact('days', 'profile'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the admin account settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        return view('admin.settings.edit')->with([
            'user' => Auth::user(),
            'roles' => ''
        ]);
    }
}
