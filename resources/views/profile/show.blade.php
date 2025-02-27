@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profile</h2>
    <div>
        @if ($user->profile_picture)
            <img src="{{ asset('uploads/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture" width="100">
        @else
            <p>No profile picture uploaded.</p>
        @endif
    </div>
    <div>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Bio:</strong> {{ $user->bio ?? 'Not provided' }}</p>
        <p><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</p>
    </div>
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
</div>
@endsection