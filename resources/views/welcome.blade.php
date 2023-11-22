<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description"
        content="Sistema de ventas para gestionar compras, ventas
    clientes, proveedores, productos, categorías, etc. Ideal para pequeños y medianos negocios que deesen 
    automatizar sus procesos y tener a la mano cualquier información sobre su negocio" />
    <meta name="author" content="David Ayala" />
    <title>Sistema de Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <!--Barra de navegación--->
    <nav class="navbar navbar-expand-md bg-body-secondary">
        <div class="container-fluid">
            <!---Marca navegación-->
            <a class="navbar-brand" href="{{ route('panel') }}">
                <img src="{{ asset('assets/img/icon.png') }}" alt="Logo" width="30" height="30"
                    class="d-inline-block align-text-top">
                Sistema de Venta
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!----Lista de opciones del menú-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('panel') }}">Inicio</a>
                    </li>
                </ul>

                <form class="d-flex" action="{{ route('login') }}" method="get">
                    <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
                </form>

            </div>
        </div>
    </nav>

    <!----Carrusel--->
    <div id="carouselExample" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/img_carrusel_1.png') }}" class="d-block w-100"
                    alt="banner de invitacion">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img_carrusel_2.png') }}" class="d-block w-100"
                    alt="Banner de publicidad">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img_carrusel_3.png') }}" class="d-block w-100"
                    alt="Banner de contáctanos">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!---Section Ventajas / Desventajas--->
    <div class="container-md">
        <div class="row my-4 g-5">
            <div class="col-lg-6">
                <div class="card border-0">
                    <div
                        class="card-header text-center text-info border-info fs-5 fw-semibold border-3 rounded-start rounded-end">
                        Con un sistema de ventas web...
                    </div>
                    <div class="card-body">
                        <ul class="text-light">
                            <li>
                                <p class="card-text mb-2">Tienes acceso a tu sistema 24/7 y desde cualquier parte.</p>
                            </li>
                            <li>
                                <p class="card-text mb-2">Permite la automatización de tareas como la gestión de
                                    inventario,
                                    el procesamiento de pedidos y la recopilación de datos,
                                    lo que ahorra tiempo y reduce errores.</p>
                            </li>
                            <li>
                                <p class="card-text mb-2">Proporcionan datos valiosos sobre el comportamiento de los
                                    clientes,
                                    lo que te permite tomar mejores desiciones.</p>
                            </li>
                            <li>
                                <p class="card-text mb-2">Puedes expandir tu negocio en línea de manera relativamente
                                    sencilla
                                    al agregar más productos, servicios o incluso dirigirte a nuevos mercados.</p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0">
                    <div
                        class="card-header text-center text-info border-info fs-5 fw-semibold border-3 rounded-start rounded-end">
                        Sin un sistema de ventas web...
                    </div>
                    <div class="card-body">
                        <ul class="text-light">
                            <li>
                                <p class="card-text mb-2">Estas sujeto a un horario de funcioamiento específico.</p>
                            </li>
                            <li>
                                <p class="card-text mb-2">Las operaciones sin un sistema web a menudo requieren una
                                    mayor cantidad de trabajo manual,
                                    lo que puede llevar más tiempo y aumentar la posibilidad de errores.</p>
                            </li>
                            <li>
                                <p class="card-text mb-2">Dificulta la recopilación y análisis de datos sobre el
                                    rendimiento del
                                    negocio y el comportamiento de los clientes.</p>
                            </li>
                            <li>
                                <p class="card-text mb-2">La expansión de un negocio físico puede ser más complicada y
                                    costosa en
                                    términos de abrir nuevas ubicaciones o llegar a un mercado más amplio.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!---Section Frase--->
    <section class="container-fluid bg-body-secondary text-center">
        <div class="container p-5">
            <h2 class="text-light mb-5">Dale un nuevo enfoque a tu negocio
                <span class="text-info"><br>¡Es momento de usar la tecnología como aliada!</span>
            </h2>
            <div class="">
                <a href="{{ route('login') }}" role="button" class="btn btn-primary">Iniciar Sesión</a>
            </div>
        </div>

    </section>

    <!---Footer--->
    <footer class="text-center text-white">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            Copyright &copy; 2023 - Estándares De Programación - Ciclo 02-2023 -
            Universidad Tecnológica de El Salvador
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
