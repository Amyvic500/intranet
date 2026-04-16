<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Dept;
use App\Models\Message;
use Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'], ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of all messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::with('dept.company.location')->paginate(10);
        return view('message.list')->with(['url' => $messages]);
    }

    /**
     * Show the form for creating a new message.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dept = [];
        $departments = Dept::with('company.location')->get();
        
        foreach ($departments as $d) {
            $dept[$d->id] = $d->name . ' ' . $d->company->name . ' ' . $d->company->location->name;
        }

        return view('message.index')->with('dept', $dept);
    }

    /**
     * Store a newly created message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'msg' => 'required|string',
            'authorize' => 'required|boolean',
            'deptId' => 'nullable|array',
            'deptId.*' => 'integer|exists:depts,id',
        ]);

        if ($request->has('deptId') && count($request->deptId) > 0) {
            foreach ($request->deptId as $deptId) {
                $message = new Message();
                $message->subject = $request->subject;
                $message->message = $request->msg;
                $message->auth = $request->authorize;
                $message->dept_id = $deptId;
                $message->user_id = Auth::user()->id;
                $message->save();
            }
        } else {
            $message = new Message();
            $message->subject = $request->subject;
            $message->message = $request->msg;
            $message->auth = $request->authorize;
            $message->dept_id = 0;
            $message->user_id = Auth::user()->id;
            $message->save();
        }

        return redirect('message')->with('status', $request->subject . ' created successfully');
    }

    /**
     * Display the specified message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        $returnHTML = view('message.modal', ['m' => $message])->render();
        return response()->json($returnHTML);
    }

    /**
     * Show the form for editing the specified message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $dept = [];
        $departments = Dept::with('company.location')->get();
        
        foreach ($departments as $d) {
            $dept[$d->id] = $d->name . ' ' . $d->company->name . ' ' . $d->company->location->name;
        }

        $message = Message::findOrFail($request->id);
        return view('message.edit')->with(['dept' => $dept, 'm' => $message]);
    }

    /**
     * Update the specified message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'msg' => 'required|string',
            'authorize' => 'required|boolean',
            'deptId' => 'nullable|array',
            'deptId.*' => 'integer|exists:depts,id',
        ]);

        if ($request->has('deptId') && count($request->deptId) > 0) {
            foreach ($request->deptId as $deptId) {
                $message = Message::findOrFail($request->id);
                $message->subject = $request->subject;
                $message->message = $request->msg;
                $message->auth = $request->authorize;
                $message->dept_id = $deptId;
                $message->user_id = Auth::user()->id;
                $message->save();
            }
        } else {
            $message = Message::findOrFail($request->id);
            $message->subject = $request->subject;
            $message->message = $request->msg;
            $message->auth = $request->authorize;
            $message->dept_id = 0;
            $message->user_id = Auth::user()->id;
            $message->save();
        }

        return redirect('message')->with('status', $request->subject . ' updated successfully');
    }

    /**
     * Remove the specified message from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $message = Message::findOrFail($request->id);
        $subject = $message->subject;
        $message->delete();

        return redirect('message')->with('status', $subject . ' deleted successfully');
    }
}
