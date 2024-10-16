<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function book($eventId)
    {
        // Logic to handle event booking
        // For now, we'll just redirect back with a success message
        return redirect()->back()->with('success', 'Ticket for event ' . $eventId . ' has been booked!');
    }
}
