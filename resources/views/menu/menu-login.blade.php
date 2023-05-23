<style>
    /*MENU*/
    .menu-login {
        min-height: 3vh;
        background:#e7e7e7;
    }

    .menu-login a {
        font-size: 20px;
        font-weight: 700;
        color: black;
        text-decoration: none;
    }
    .iniciarSesion{
        text-align: right;
    }
</style>
<!-- Menú login-->
<div class="menu-login">
    @if (Route::has('login'))
    @auth
        <div>
            <a href="{{ url('/dashboard') }}" class="px-2 text-decoration-none fw-bold h4">Dashboard</a>
        </div>
    @else
        <div class="iniciarSesion">
            <a href="{{ route('login') }}" class="px-2 text-decoration-none fw-bold h4">Iniciar Sesión</a>
        </div>
        {{-- @if (Route::has('registrarse'))
            <div>
                <a href="{{ route('registrarse') }}" class="px-2 text-decoration-none fw-bold link-light h4">Registrarse</a>
            </div>
        @endif --}}
    @endauth
    @endif
</div>
