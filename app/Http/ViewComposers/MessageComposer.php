<?php

namespace App\Http\ViewComposers;

use App\message;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MessageComposer
{
    public function compose(View $view): void
    {
        if (Auth::check()) {
            $messages = message::where('dept_id', Auth::user()->dept_id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        } else {
            $messages = collect();
        }

        $view->with('message', $messages);
    }
}
