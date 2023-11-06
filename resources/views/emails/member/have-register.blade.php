@component('mail::message')
# Hallo {!! $name !!}
<br/>
Selamat akun Anda terlah berhasil didaftarkan oleh admin kami.
Dengan kredensial berikut :

<br/><br/>
user  email : {!! $email !!} <br/>
password    : {!! $password !!}

Klik tombol dibawah untuk login ke aplikasi..! Setalah berhasil login,
diharapkan untuk segera memperbaharui password di halaman profil Anda!

@component('mail::button', ['url' => route('login')])
Silahkan Login
@endcomponent


Thanks,<br>
Admin {{ config('app.name') }}
@endcomponent
