@component('mail::message')

{{ $request->message }}

<hr>

<b>İsim:</b> {{ $request->name }}
<br>
<b>E-Posta:</b> {{ $request->email }}
<br>
<b>GSM:</b> {{ $request->phone }}
<br>

@component('mail::button', ['url' => env('APP_URL')])
{{ config('app.name') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

