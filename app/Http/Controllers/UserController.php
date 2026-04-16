<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Dept;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('dept.company.location')->paginate(50);
        return view('auth.list')->with('user', $users);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comp = [];
        $companies = Company::with('location')->get();
        foreach ($companies as $c) {
            $comp[$c->id] = $c->name . ' ' . $c->location->name;
        }
        return view('auth.create')->with('comp', $comp);
    }

    /**
     * Store newly created users in storage (supports bulk creation).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:6',
            'role' => 'required|integer',
            'company' => 'required|integer|exists:companies,id',
            'dept' => 'required|integer|exists:depts,id',
        ]);

        $names = array_filter(array_map('trim', explode(';', $request->name)));
        $emails = array_filter(array_map('trim', explode(';', $request->email)));

        if (count($names) !== count($emails)) {
            return redirect('user')->with('status', 'Error: Number of names and emails must match');
        }

        foreach ($names as $key => $name) {
            $user = new User();
            $user->name = $name;
            $user->email = $emails[$key];
            $user->admin = $request->role;
            $user->password = bcrypt($request->password);
            $user->company_id = $request->company;
            $user->dept_id = $request->dept;
            $user->save();
        }

        return redirect('user')->with('status', 'User(s) created successfully');
    }

    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('auth.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = User::with('dept.company.location')->findOrFail($request->id);

        $comp = [];
        $companies = Company::with('location')->get();
        foreach ($companies as $c) {
            $comp[$c->id] = $c->name . ' ' . $c->location->name;
        }

        $dept = [];
        $departments = Dept::where('company_id', $user->dept->company->id)->get();
        foreach ($departments as $d) {
            $dept[$d->id] = $d->name;
        }

        return view('auth.edit')->with(['user' => $user, 'comp' => $comp, 'dept' => $dept]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'uName' => 'required|string|max:255',
            'uEmail' => 'required|email|max:255|unique:users,email,' . $request->id,
            'uPassword' => 'nullable|string|min:6',
            'uRole' => 'required|integer',
            'uComp' => 'required|integer|exists:companies,id',
            'uDept' => 'required|integer|exists:depts,id',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->uName;
        $user->email = $request->uEmail;

        if ($request->filled('uPassword')) {
            $user->password = bcrypt($request->uPassword);
        }

        $user->admin = $request->uRole;
        $user->company_id = $request->uComp;
        $user->dept_id = $request->uDept;
        $user->save();

        return redirect('user')->with('status', 'User updated successfully');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $userName = $user->name;
        $user->delete();

        return redirect('user')->with('status', 'User ' . $userName . ' deleted successfully');
    }
}
