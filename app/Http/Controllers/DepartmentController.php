<?php

namespace App\Http\Controllers;

use App\Models\Dept;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dept = Dept::with('company')->paginate(50);
        $comp = [];
        foreach ($dept as $key => $d) {
            $c = Company::with('location')->find($d->company->id);
            $comp[$key] = $c->name . ' ' . $c->location->name;
        }
        return view('dept.list')->with(['dept' => $dept, 'comp' => $comp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comp = [];
        $all = Company::with('location')->get();
        foreach ($all as $c) {
            $comp[$c->id] = $c->name . ' ' . $c->location->name;
        }
        return view('dept.index')->with('comp', $comp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comid = $request->compId;
        foreach ($comid as $c) {
            $dept = new Dept();
            $dept->name = strtoupper($request->deptName);
            $dept->description = $request->deptDesc;
            $dept->dept_hod = $request->deptHod;
            $dept->depthod_email = $request->deptHEmail;
            $dept->company_id = $c;
            $dept->save();
        }
        return redirect('dept')->with('status', $dept->name . ' department created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function show(Dept $dept)
    {
        return view('dept.show')->with('dept', $dept);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $dept = Dept::with('company')->find($request->id);
        $comp = [];
        $all = Company::with('location')->get();
        foreach ($all as $c) {
            $comp[$c->id] = $c->name . ' ' . $c->location->name;
        }
        return view('dept.edit')->with(['dept' => $dept, 'comp' => $comp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dept $dept)
    {
        $dept = Dept::find($request->id);
        $dept->name = $request->deptName;
        $dept->description = $request->deptDesc;
        $dept->dept_hod = $request->deptHod;
        $dept->depthod_email = $request->deptHEmail;
        $dept->company_id = $request->compId;
        $dept->save();
        return redirect('dept')->with('status', $dept->name . ' department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dept = Dept::find($request->id);
        $deptName = $dept->name;
        $dept->delete();
        return redirect('dept')->with('status', $deptName . ' department deleted successfully');
    }

    /**
     * Load departments by company ID (AJAX)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadDepts(Request $request)
    {
        $data = Dept::where('company_id', $request->id)->get();
        return Response::json($data);
    }
}
