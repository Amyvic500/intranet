<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of all configurations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = Config::all();
        return view('config.list')->with('url', $configs);
    }

    /**
     * Show the form for creating a new configuration.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.index');
    }

    /**
     * Display the scroll upload form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createScroll()
    {
        return view('config.scroll');
    }

    /**
     * Store a newly created configuration in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'appName' => 'nullable|string|max:255',
            'leftImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rightImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $config = Config::firstOrCreate(['id' => 1]);

        if ($request->has('appName')) {
            $config->appName = $request->appName;
        }

        if ($request->hasFile('leftImg')) {
            $path = $request->file('leftImg')->store('config', 'public');
            $config->leftImg = $path;
        }

        if ($request->hasFile('rightImg')) {
            $path = $request->file('rightImg')->store('config', 'public');
            $config->rightImg = $path;
        }

        $config->save();

        return redirect('config')->with('status', 'Configuration saved successfully');
    }

    /**
     * Display the specified configuration.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        return view('config.show')->with('config', $config);
    }

    /**
     * Show the form for editing the specified configuration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $config = Config::findOrFail($request->id);
        return view('config.edit')->with('config', $config);
    }

    /**
     * Update the specified configuration in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        $request->validate([
            'appName' => 'nullable|string|max:255',
            'leftImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rightImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $config = Config::findOrFail($request->id);

        if ($request->has('appName')) {
            $config->appName = $request->appName;
        }

        if ($request->hasFile('leftImg')) {
            $path = $request->file('leftImg')->store('config', 'public');
            $config->leftImg = $path;
        }

        if ($request->hasFile('rightImg')) {
            $path = $request->file('rightImg')->store('config', 'public');
            $config->rightImg = $path;
        }

        $config->save();

        return redirect('config')->with('status', 'Configuration updated successfully');
    }

    /**
     * Remove the specified configuration from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $config = Config::findOrFail($request->id);
        $config->delete();

        return redirect('config')->with('status', 'Configuration deleted successfully');
    }

    /**
     * Handle scroll image upload.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function scrollStore(Request $request)
    {
        $request->validate([
            'scrollImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Move existing scroll.jpg to archive
        if (Storage::disk('public')->exists('scroll.jpg')) {
            $filename = 'past/' . uniqid('img_', true) . '.jpg';
            Storage::disk('public')->move('scroll.jpg', $filename);
        }

        // Save new scroll image
        $request->file('scrollImage')->storeAs('/', 'scroll.jpg', 'public');

        return back()->with('status', 'Scroll image uploaded successfully');
    }
}
