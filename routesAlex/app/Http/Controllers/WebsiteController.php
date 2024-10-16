<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function showDashboard()
    {
        // This will display the dashboard with the latest news
        return view('dashboard');
    }

    public function showEvents()
    {
        // Mock data for events
        $events = [
            (object)['id' => 1, 'name' => 'Laravel Conference', 'description' => 'A conference on Laravel development.'],
            (object)['id' => 2, 'name' => 'VueJS Workshop', 'description' => 'A hands-on workshop on VueJS.'],
            (object)['id' => 3, 'name' => 'PHP Meetup', 'description' => 'A meetup for PHP enthusiasts.']
        ];

        // This will display the events list
        return view('events', ['events' => $events]);
    }

    public function bookTicket(Request $request, $event_id)
    {
        // Logic for booking a ticket (you can process and store the booking here)
        return redirect()->route('events')->with('success', 'Ticket booked for event ID: ' . $event_id);
    }
}
