<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class isEventValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $eventId = $request->route('id');
        $event = Event::findOrFail($eventId);
        //  dd($event);
        $currentDate = Carbon::now();
        if (
            $event->start_date > $currentDate ||
            $event->end_date < $currentDate ||
            $event->visibility == 0
        ) {
            return redirect()->back()->with(toast('Event Expired', 'error'));
        }
        return $next($request);
    }
}
