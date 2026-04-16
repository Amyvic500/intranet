<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of all companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comp = Company::with('location')->paginate(20);
        return view('comp.list')->with('comp', $comp);
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loc = Location::all();
        $arr = [];
        foreach ($loc as $l) {
            $arr[$l->id] = $l->name;
        }
        return view('comp.index')->with('loc', $arr);
    }

    /**
     * Store a newly created company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'compName' => 'required|string|max:255',
            'compDesc' => 'nullable|string',
            'compGM' => 'required|string|max:255',
            'compGEmail' => 'required|email',
            'compLoc' => 'required|array|min:1',
        ]);

        $locations = $request->compLoc;
        $company = null;

        foreach ($locations as $location) {
            $company = new Company();
            $company->name = $request->compName;
            $company->description = $request->compDesc;
            $company->comp_gm = $request->compGM;
            $company->compgm_email = $request->compGEmail;
            $company->location_id = $location;
            $company->save();
        }

        return redirect('comp')->with('status', 'Company ' . $company->name . ' saved successfully');
    }

    /**
     * Display the specified company.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('comp.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $company = Company::with('location')->findOrFail($request->id);
        $locations = [];
        $allLocations = Location::all();
        
        foreach ($allLocations as $l) {
            $locations[$l->id] = $l->name;
        }
        
        return view('comp.edit')->with(['comp' => $company, 'loc' => $locations]);
    }

    /**
     * Update the specified company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'compName' => 'required|string|max:255',
            'compDesc' => 'nullable|string',
            'compGM' => 'required|string|max:255',
            'compGEmail' => 'required|email',
            'compLoc' => 'required|integer',
        ]);

        $company = Company::findOrFail($request->id);
        $company->name = $request->compName;
        $company->description = $request->compDesc;
        $company->comp_gm = $request->compGM;
        $company->compgm_email = $request->compGEmail;
        $company->location_id = $request->compLoc;
        $company->save();
        
        return redirect('comp')->with('status', 'Company ' . $company->name . ' updated successfully');
    }

    /**
     * Remove the specified company from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $company = Company::findOrFail($request->id);
        $companyName = $company->name;
        $company->delete();
        
        return redirect('comp')->with('status', 'Company ' . $companyName . ' deleted successfully');
    }
}
