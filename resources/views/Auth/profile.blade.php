@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Profile</h2>
        <div class="card p-4">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>
    </div>
@endsection
