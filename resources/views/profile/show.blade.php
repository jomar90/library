<h2>Profile</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('profile.update') }}">
    @csrf

    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}">
    </div>

    <button type="submit">Update Profile</button>
</form>
