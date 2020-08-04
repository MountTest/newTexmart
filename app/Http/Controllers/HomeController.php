<?php

namespace App\Http\Controllers;

use App\Announce;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/profile');
    }

    public function announces_date()
    {
//        dd();
        $announces = Announce::all();
        foreach ($announces as $announce) {
            $announce->date = Carbon::now()->subMonths(-2);
            $announce->save();
        }
    }
}
