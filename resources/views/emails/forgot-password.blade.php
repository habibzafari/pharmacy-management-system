@component('mail::message')

    Hi, {{$user->name}}. Forgot Your Password ?
    <p>Please click on the link below to reset your password</p>

    @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
        Reset Your Password
    @endcomponent

    ! in case you did not request a password reset, please ignore this email
    please do not reply to this email
    Thanks, <br>
    {{ config('app.name') }}
@endcomponent