@extends('Admin.main')

@section('content')
    <h1>Inbox</h1>

    <a href="{{ route('composeEmail') }}">Tulis Email Baru</a>

    <ul>
        @foreach ($messages as $message)
            <li>
                <a href="{{ route('readMessage', $message->message_id) }}">
                    {{ $message->subject }} - {{ $message->sender }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
