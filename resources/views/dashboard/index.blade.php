@extends('layout.master')
@section('title', 'Dashboard')
@section('content')
    <h1>Welcome to your Dashboard, {{ Auth::user()->name }}!</h1>
    <p>This is your dashboard.</p>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
@endsection
