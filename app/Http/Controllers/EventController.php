<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get a collection of events that are between the start
        // and end query parameters.
        $events = $request->user()
            ->events()
            ->whereDate('start_recur_date', '>', $request->start)
            ->whereDate('end_recur_date', '<', $request->end)->get();

        // Map the events collection so the columns match that
        // required for fullcalendar.
        $new_events = $events->map(function($item, $key) {
            return [
                'daysOfWeek' => [$item->day_of_week],
                'startRecur' => $item->start_recur_date,
                'classNames' => 'cursor-pointer',
                'endRecur' => $item->end_recur_date,
                'startTime' => $item->start_time,
                'endTime' => $item->end_time,
                'display' => 'block',
                'backgroundColor' => $item->bg_color,
                'borderColor' => $item->border_color
            ];
        });

        return response()->json($new_events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
