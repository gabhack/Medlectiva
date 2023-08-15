@component('mail::message')
    # ¡Hola, {{ $name }}!

    Usted ha sido invitado como especialista de la IPS **{{ $hospitalName }}** para publicar su programa de rotación médica.

    Haga clic en el siguiente botón para inscribirse y completar su perfil e información sobre su programa.

    @component('mail::button', ['url' => route('register') . "?token={$token}"])
        Inscribirse
    @endcomponent

    Gracias,<br>
    {{ config('app.name') }}
@endcomponent
