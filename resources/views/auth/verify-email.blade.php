<h2>Please verify your email</h2>

<p>Check your email and click the verification link.</p>

<form method="POST" action="/email/verification-notification">
    @csrf
    <button type="submit">Resend Verification Email</button>
</form>
