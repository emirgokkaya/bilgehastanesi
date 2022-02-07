@component('mail::message')
# {{ $request->topic }}

{{ $request->message }}

<hr>

<b>İsim:</b> {{ $request->name }}
<br>
<b>E-Posta:</b> {{ $request->email }}
<br>
<b>GSM:</b> {{ $request->phone }}
<br>
@if($request->department != null and $request->department != "")
    <b>Tıbbi Bölüm:</b> {{ $request->department }}
    <br>
@endif
@if($request->doctor != null and $request->doctor != "")
    <b>Doktor:</b> {{ $request->doctor }}
    <br>
@endif
@if($request->other_service != null and $request->other_service != "")
    <b>Sağlık Hizmeti:</b> {{ $request->other_service }}
    <br>
@endif
@if($request->date != null and $request->date != "")
    <b>Randevu Tarihi:</b> {{ $request->date }}
    <br>
@endif
@if($request->time != null and $request->time != null)
    <b>Randevu Saati:</b> {{ $request->time }}
    <br>
@endif

@component('mail::button', ['url' => env('APP_URL')])
{{ config('app.name') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
