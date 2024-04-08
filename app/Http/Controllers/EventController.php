<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\EventUpdate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;



class EventController extends Controller
{
    //
    /**
     * Update your event Details form.
     */
    public function edit(Request $request): View
    {
        return view('event_details.edit', [
            'user' => $request->user(),
        ]);
    }






    public function update(EventUpdate $request): RedirectResponse
    {
        Log::info($request);
        $request->user()->fill($request->validated());
        Log::info($request->validated());



        if ($request->user()->isDirty('email')) {
            //insert into database
            $request->user()->email_verified_at = "25/02/2024";
        }

        $request->user()->save();
//        return Redirect::route('/')->with('status', 'event-updated');
        return Redirect::route('event.edit')->with('status', 'event-updated');
    }
}
