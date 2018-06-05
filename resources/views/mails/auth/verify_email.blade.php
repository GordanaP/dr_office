@component('mail::message')
# Introduction

Press the button bellow to activate your account.

Your activation link expires on {{ $token->expires_at->toFormattedDateString() }}

@component('mail::button',  ['url' =>  route('token.show', $token) ])
    Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
