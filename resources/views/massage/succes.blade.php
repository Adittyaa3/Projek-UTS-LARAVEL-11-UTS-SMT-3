@extends('Admin.main')

@section('content')
    <h1>Email Berhasil Dikirim!</h1>
    <p>Email Anda telah berhasil dikirim ke penerima.</p>

    <a href="{{ route('inbox') }}">Kembali ke Inbox</a>
@endsection
