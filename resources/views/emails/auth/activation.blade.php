<x-mail::message>
# Aktivasi Email

Hai, {{$user->name}}<br>

Berikut kode OTP Anda <b>{{$user->token_activation}}</b><br>
Silahkan masukkkan kode OTP tersebut untuk verifikasi
akun Anda!<br>

Terima kasih,<br>
TokOnlen
</x-mail::message>
