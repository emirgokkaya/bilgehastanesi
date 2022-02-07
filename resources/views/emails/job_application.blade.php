@component('mail::message')
# İş Başvurusu - {{ $request->ad_soyad }}

<b>Pozisyon:</b> {{ $request->is_adi }}
<br>
<b>Daha Önce Hastanemizde Çalıştınız mı ?:</b> {{ $request->daha_once }}
<br>
<b>İş Durumunuz:</b> {{ $request->is_durumu }}
<br>
<br>
<b>Ad Soyad:</b> {{ $request->ad_soyad }}
<br>
<b>Doğum Yeri ve Tarihi:</b> {{ $request->dogum_yeri }} / {{ $request->dogum_tarihi }}
<br>
<b>Cinsiyet:</b> {{ $request->cinsiyet }}
<br>
<b>Uyruk:</b> {{ $request->uyruk }}
<br>
<b>İlişki Durumu:</b> {{ $request->iliski_durumu }}
<br>
<br>
<b>Ev Adresi:</b> {{ $request->ev_adresi }}
<br>
<b>Telefon:</b> {{ $request->telefon1 }}
<br>
@if($request->telefon2 != null and $request->telefon2 != "")
<b>Telefon2:</b> {{ $request->telefon2 }}
<br>
@endif
<b>E-Posta:</b> {{ $request->eposta }}

@component('mail::button', ['url' => route('preview-pdf', ['filename' => $fileNameToStore])])
CV Görüntüle
@endcomponent

İş Başvurusu, {{ config('app.name') }}
@endcomponent
