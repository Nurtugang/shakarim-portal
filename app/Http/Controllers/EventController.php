<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        $events = Event::all()->map(function ($event) {
        return [
            'title' => $event->title_kk,
            'start' => $event->start_date,
            'end'   => $event->end_date,
            'id'    => $event->id,
        ];
    });

    return response()->json($events);
    }
}
