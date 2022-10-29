<x-mail::message>
# Aktivasi Email

Hai, {{$user->name}}<br>

Berikut kode OTP Anda <b>{{$user->token_activation}}</b><br>
Silahkan masukkkan kode OTP tersebut untuk verifikasi
akun Anda!

<x-mail::button :url="''">
    Active
</x-mail::button>

Terima kasih,<br>
TokOnlen
</x-mail::message>
