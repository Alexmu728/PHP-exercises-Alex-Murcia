@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <h2>Upcoming Events</h2>
    <ul>
        @foreach ($events as $event)
            <li>
                <h3>{{ $event->name }}</h3>
                <p>{{ $event->description }}</p>
                @include('partials.book_button', ['event' => $event]) <!-- Include the booking button partial -->
            </li>
        @endforeach
    </ul>
@endsection
