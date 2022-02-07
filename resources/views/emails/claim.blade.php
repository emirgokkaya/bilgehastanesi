@component('mail::message')
# {{ $request->topic }}

{{ $request->message }}

{{--@component('mail::button', ['url' => ''])
Button Text
@endcomponent--}}

<b>İsim:</b> {{ $request->name }}
<br>
<b>E-Posta:</b> {{ $request->email }}
<br>
<b>GSM:</b> {{ $request->phone }}

{{--Thanks,<br>
{{ config('app.name') }}--}}
@endcomponent
