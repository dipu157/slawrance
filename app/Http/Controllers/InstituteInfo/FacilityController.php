<?php

namespace App\Http\Controllers\InstituteInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{

    protected $user_id;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user_id = Auth::id();

            return $next($request);
        });
    }

    public function index()
    {
        return view('facility.manageFacility');
    }

}
