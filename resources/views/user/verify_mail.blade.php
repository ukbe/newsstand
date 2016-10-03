<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Verify Your Email Address</h2>

    <div>
        Hello {{ $user->name }}!

        Thank you for registering to Newsstand.

        Before starting to use Newsstand you should verify your email address by clicking the activation link below.

        <a href="{{ url('/verify', [$user->verification_token]) }}">{{ url('/verify', [$user->verification_token]) }}</a>

        Have fun.
    </div>

</body>
</html>