@extends('Admin.main')

@section('content')
    <h1>Tulis Email Baru</h1>

    <form action="{{ route('sendEmail') }}" method="POST">
        @csrf
        <label for="to">Kepada:</label>
        <input type="text" name="to" required><br><br>

        <label for="subject">Subjek:</label>
        <input type="text" name="subject" required><br><br>

        <label for="message_text">Pesan:</label>
        <textarea name="message_text" rows="5" required></textarea><br><br>

        <button type="submit">Kirim Email</button>
    </form>

    <a href="{{ route('inbox') }}">Kembali ke Inbox</a>
@endsection
