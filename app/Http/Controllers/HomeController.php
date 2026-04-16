<?php

namespace App\Http\Controllers;

use Auth;
use App\Link;
use App\AppConfig;
use App\Visitlog;
use App\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // auth handled per route
    }

    public function index()
    {
        $con = AppConfig::find(1);
        $ip  = request()->ip();

        if (Auth::guest()) {
            $l   = Link::where('dept_id', 0)->get();
            $mv  = Visitlog::join('links', 'visitlogs.link_id', '=', 'links.id')
                        ->selectRaw('link_id, count(*) as visit_count, dept_id, user_ip')
                        ->groupBy('link_id', 'dept_id', 'user_ip')
                        ->having('user_ip', '=', $ip)
                        ->having('dept_id', '=', 0)
                        ->orderBy('visit_count', 'desc')
                        ->take(6)->get();
            $ld  = [];
        } else {
            $ud  = Auth::user();
            $l   = Link::where('dept_id', 0)->get();
            $mv  = Visitlog::with('link')
                        ->selectRaw('link_id, count(*) as visit_count, user_ip')
                        ->groupBy('link_id', 'user_ip')
                        ->having('user_ip', '=', $ip)
                        ->orderBy('visit_count', 'desc')
                        ->take(6)->get();
            $ld  = Link::where('dept_id', $ud->dept_id)->get();
        }

        return view('index')->with([
            'links'  => $l,
            'dept'   => $ld,
            'mostv'  => $mv,
            'con'    => $con,
        ]);
    }
}
