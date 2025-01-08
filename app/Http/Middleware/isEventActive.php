<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class isEventActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $eventSlug = $request->eventSlug;
        $event = Event::where('slug', $eventSlug)->first();
        // dd($event);
        if (!$event || !$event->visibility) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Event Not Found',
                ], 403); // Forbidden status
            }
            return redirect()->route('index')->with(toast('Event Not Found', 'info'));
        }
        if ($event->link_start_date > now() || $event->link_end_date < now()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Event Expired'
                ], 403); // Forbidden status
            }
            return redirect()->route('index')->with(toast('Event Expired', 'info'));
        }
        return $next($request);
    }
}
