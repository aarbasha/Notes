<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\welacamRegistry;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Notification::send($users, new welacamRegistry($invoice));
        return view('home');
    }
}
