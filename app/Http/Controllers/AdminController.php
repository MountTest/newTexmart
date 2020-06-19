<?php

namespace App\Http\Controllers;

use App\Announce;
use App\Production;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midnite81\GeoLocation\Services\GeoLocation;

class AdminController extends Controller
{
    public function __construct(GeoLocation $geoLocation)
    {
        $this->middleware('admin');
    }

    public function admin()
    {
        return redirect()->route('admin.admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }


}
