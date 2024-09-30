@extends('Admin.main')

@section('content')
    <h1>{{ $message->subject }}</h1>
    <p>{{ $message->message_text }}</p>
    <p>Dari: {{ $message->sender }}</p>

    <h2>Balas Pesan</h2>
    <form action="{{ route('replyMessage', $message->message_id) }}" method="POST">
        @csrf
        <textarea name="message_text" rows="5" placeholder="Tulis balasan Anda"></textarea>
        <button type="submit">Balas</button>
    </form>

    <a href="{{ route('inbox') }}">Kembali ke Inbox</a>
@endsection
