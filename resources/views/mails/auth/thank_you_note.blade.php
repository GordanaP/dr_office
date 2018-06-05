@component('mail::message')
# Introduction

Thank you for registering with us.

<br>

To access the site content <a href="{{ route('login') }}">click here</a>.

To reset your password <a href="{{ route('password.request') }}">click here</a>.

<br>
{{ config('app.name') }}
@endcomponent
