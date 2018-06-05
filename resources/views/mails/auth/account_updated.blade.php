@component('mail::message')
# Introduction

Your account has been updated.

<p style="margin-bottom: 0;">username: {{ $user->email }}</p>
<p>password: {{ $password ?: 'Your password has not been changed' }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
