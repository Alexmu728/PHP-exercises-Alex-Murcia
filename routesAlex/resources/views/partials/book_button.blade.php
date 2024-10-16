<form action="{{ route('book_ticket', ['event_id' => $event->id]) }}" method="POST">
    @csrf
    <button type="submit">Book Ticket</button>
</form>
