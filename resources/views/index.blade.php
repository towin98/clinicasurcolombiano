@extends('estructura.estructura')
@section('css')
<style>
    body {
        font-family: 'Nunito', sans-serif !important;
    }

    /* Clientes */
    .img-clientes{
        transition: box-shadow .3s;
    }
    .img-clientes:hover{
        box-shadow: 0 0 11px rgba(33,33,33,.2);
    }

    /* Visión */
    .container-vision{
        background: #025;
        border-radius: 20px;
        color: #fff;
    }
    /* Quienes somos */
    .container-quienes-somos{
        background: #f3f3f3;
        border-radius: 20px;
        margin-left: -20px;
        margin-top: 20px !important;
        position: relative;
    }

    .container-mision{
        background: #025;
        border-radius: 20px;
        margin-left: -20px;
        color: #fff;
    }
    .alturaLogo{
        height: 15vh;
        padding: 5px;
    }
    .alturaCarrusel{
        height: 65vh !important;
    }

    @media only screen and (max-width: 600px) {
        .container-quienes-somos{
            margin-left: 0px;
            margin-bottom: 20px;
        }
        .container-mision{
            margin-left: 0px;
        }
        .alturaCarrusel{
            height: 40vh !important;
        }
        .alturaLogo{
            height: 20vh;
            padding: 10px;
        }
    }
</style>
@endsection

@section("index")
    @include('menu.menu-login')
    <!-- Logo Organizacion -->
    <div class="alturaLogo">
        <img src="{{ asset('logo-clinica/logo-organizacion.png') }}" class="h-100 mx-auto d-block" alt="Logo Organización">
    </div>

    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide w-100 alturaCarrusel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner alturaCarrusel">
            <div class="carousel-item active alturaCarrusel" data-bs-interval="10000">
                <img src="{{ asset('img-clinica/img-clinica.jpg') }}" class=" w-100 img-fluid alturaCarrusel" alt="Clinica">
            </div>
            <div class="carousel-item alturaCarrusel" data-bs-interval="10000">
                <img src="{{ asset('img-clinica/img-personal-medico.jpg') }}" class=" w-100 img-fluid alturaCarrusel" alt="Imagen de Personal Medico">
            </div>
            <div class="carousel-item alturaCarrusel" data-bs-interval="10000">
                <img src="{{ asset('img-clinica/img-servicios.jpg') }}" class=" w-100 img-fluid alturaCarrusel" alt="Imagen de servicios">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Agenda tu Cita -->
    <div class="container" style="height: 12vh">
        <div class="pt-2 d-flex justify-content-center">
            <a href="{{ route('agendar_cita') }}" class="btn btn-primary btn-lg w-100">AGENDA TÚ CITA</a>
        </div>
    </div>

    <div class="container pt-2 pb-2">
        <div class="row">
            <div class="col">
                <h3 class="text-center fw-bold">Nuestros Clientes</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 pb-2 d-flex justify-content-center">
                <img src="{{ asset('img-clientes/img-cliente-prueba.jpg') }}" class="img-clientes" alt="...">
            </div>
            <div class="col-md-4 pb-2 d-flex justify-content-center">
                <img src="{{ asset('img-clientes/img-cliente-prueba.jpg') }}" class="img-clientes"  alt="...">
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ asset('img-clientes/img-cliente-prueba.jpg') }}" class="img-clientes" alt="...">
            </div>
        </div>
    </div>

    <div class="container pt-5 pb-2">
        <div class="row">
            <!---Visión-->
            <div class="col-md-4 container-vision text-wrap">
                <h3 class="text-center fw-bold">Visión</h3>
                <hr class="border-2 border-top border-white m-0">
                <p class="px-3">
                    <small>
                        El Centro Oftalmológico Surcolombiano quiere en el 2024 convertirse en uno de los líderes regionales en
                        el tratamiento de enfermedades visuales, siendo reconocidos por su excelencia, profesionalismo y tecnología de punta,
                        manteniéndose a la vanguardia de los últimos avances tecnológicos al servicio de todos nuestros usuarios.
                    </small>
                </p>
            </div>
            <!---Quines somos-->
            <div class="col-md-4 container-quienes-somos text-wrap">
                <h3 class="text-center fw-bold">Quines Somos</h3>
                <hr class="border-2 border-top border-dark m-0">
                <p>
                    <small>
                        El Centro Oftalmológico Surcolombiano es una Institución de Salud dedicada al cuidado de la salud visual de los
                        habitantes del Departamento del Huila y sus departamentos aledaños, su larga trayectoria en su campo, la inclusión
                        de tecnologías de punta y la alta preparación de su personal profesional y paramédico nos ubican como una de las
                        clínicas mejor categorizadas de la región. <br>

                        Está comprometido en el cumplimiento de lo normativizado en los requisitos mínimos de habilitación, teniendo como
                        meta primordial el mejoramiento continuo bajo las políticas de seguridad del paciente y con un enfoque de gestión
                        del riesgo, tomando como base los documentos de la Organización Mundial de la Salud en lo relacionado en el segundo
                        reto mundial por la Seguridad del paciente “La Cirugía Segura para Salvar Vidas”.
                    </small>
                </p>
            </div>
            <!---Misión-->
            <div class="col-md-4 container-mision text-wrap">
                <h3 class="text-center fw-bold">Misión</h3>
                <hr class="border-2 border-top border-white m-0">
                <p class="ps-3">
                    <small>
                        El Centro Oftalmológico Surcolombiano es una IPS privada dedicada a la prevención, diagnóstico y tratamiento de
                        las enfermedades visuales contando con profesionales altamente especializados,
                        con una gran calidad humana y la más avanzada tecnología al servicio del Huila y el sur de Colombia.
                    </small>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3 class="text-center fw-bold pt-3">Ubicanos</h3>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2369.2466573249867!2d-75.29185223662002!3d2.935755895290054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b746103d16f57%3A0xb6be4657ceef7f19!2sCl.%2018%20%235-96%2C%20Neiva%2C%20Huila!5e0!3m2!1ses!2sco!4v1636006975155!5m2!1ses!2sco"
                class="mx-auto d-block"
                style=" border-width:1px;
                        border-style: solid;
                        border-color: black;
                        min-width: 100%;
                        min-height: 350px;"
                allowfullscreen="" loading="lazy">
        </iframe>
    </div>

    <!-- start of footer --->
    <footer class="text-white text-center text-lg-start bg-dark mt-5">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright:
        <a class="text-white text-decoration-none" href="#">Centro Oftamológico Surcolombiano Ltda.</a>
    </div>
    <!-- Copyright -->
    </footer>
@endsection
