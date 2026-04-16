<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Link;
use App\Models\Dept;
use App\Models\Visitlog;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct()
    {
        // auth handled per route
    }

    /**
     * Display a listing of links grouped by department.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept = [];
        $f = Dept::with('company.location')->get();
        foreach ($f as $a) {
            $dept[$a->id] = $a->name . ' ' . $a->company->name . ' ' . $a->company->location->name;
        }
        return view('url.index')->with('dept', $dept);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dept = [];
        $f = Dept::with('company.location')->get();
        foreach ($f as $a) {
            $dept[$a->id] = $a->name . ' ' . $a->company->name . ' ' . $a->company->location->name;
        }
        return view('url.create')->with('dept', $dept);
    }

    /**
     * Store a newly created link in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lnkName' => 'required|string|max:255',
            'lnkUrl' => 'required|url',
            'lnkDesc' => 'nullable|string',
            'lnkImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->filled('lnkDept') && count($request->lnkDept) > 0) {
            foreach ($request->lnkDept as $dept) {
                $link = new Link();
                $link->name = $request->lnkName;
                $link->descr = $request->lnkDesc;
                $link->url = $request->lnkUrl;
                $link->dept_id = $dept;
                
                if ($request->hasFile('lnkImg')) {
                    $link->img1 = $request->file('lnkImg')->store('links', 'public');
                }
                
                $link->save();
            }
        } else {
            $link = new Link();
            $link->name = $request->lnkName;
            $link->descr = $request->lnkDesc;
            $link->url = $request->lnkUrl;
            $link->dept_id = 0;
            
            if ($request->hasFile('lnkImg')) {
                $link->img1 = $request->file('lnkImg')->store('links', 'public');
            }
            
            $link->save();
        }

        return redirect('url/list')->with('status', 'Link saved successfully');
    }

    /**
     * Display the specified link and log the visit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $link = Link::findOrFail($id);
        $ip = request()->ip();

        $visitlog = new Visitlog();
        $visitlog->user_system = gethostbyaddr($ip);
        $visitlog->user_ip = $ip;
        $visitlog->dest_url = $link->url;
        $visitlog->link_id = $link->id;

        if (Auth::guest()) {
            $visitlog->user_login = 'guest';
            $visitlog->user_id = 0;
        } else {
            $visitlog->user_login = Auth::user()->name;
            $visitlog->user_id = Auth::user()->id;
        }

        $visitlog->save();

        return redirect()->away($link->url);
    }

    /**
     * Show the form for editing the specified link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $dept = [];
        $f = Dept::with('company.location')->get();
        foreach ($f as $a) {
            $dept[$a->id] = $a->name . ' ' . $a->company->name . ' ' . $a->company->location->name;
        }
        $link = Link::with('dept')->findOrFail($request->id);
        return view('url.edit')->with(['link' => $link, 'dept' => $dept]);
    }

    /**
     * Update the specified link in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lnkName' => 'required|string|max:255',
            'lnkUrl' => 'required|url',
            'lnkDesc' => 'nullable|string',
            'lnkImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $link = Link::findOrFail($request->id);
        $link->name = $request->lnkName;
        $link->url = $request->lnkUrl;
        $link->descr = $request->lnkDesc;
        
        if ($request->hasFile('lnkImg')) {
            $link->img1 = $request->file('lnkImg')->store('links', 'public');
        }
        
        $link->save();

        return redirect('url/list')->with('status', 'Link updated successfully');
    }

    /**
     * Remove the specified link from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $link = Link::findOrFail($request->id);
        $name = $link->name;
        $link->delete();
        
        return redirect('url/list')->with('status', $name . ' deleted successfully');
    }

    /**
     * Display paginated list of all links.
     *
     * @return \Illuminate\Http\Response
     */
    public function listLinks()
    {
        $links = Link::with('dept')->paginate(50);
        return view('url.list')->with(['url' => $links]);
    }
}
