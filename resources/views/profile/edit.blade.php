@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($user->profile_picture) || $user->bio || $user->phone ? 'Edit Profile' : 'Complete Your Profile' }}</h2>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="profile_picture">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture">
            @if ($user->profile_picture)
                <p>Current Profile Picture:</p>
                <img src="{{ asset('uploads/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture" width="100">
            @endif
        </div>
        <div>
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio">{{ $user->bio }}</textarea>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
        </div>
        <button type="submit">Save Profile</button>
    </form>
</div>
@endsection