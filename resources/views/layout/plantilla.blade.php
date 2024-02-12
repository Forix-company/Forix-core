<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SOFTWARE CMS</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/png" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/fonts.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    @stack('styles')
</head>
@php
    $activeModules = Module::allEnabled();
@endphp
@if (auth()->user())
    @php
        $plantilla = Modules\Base\Entities\plantilla::first();
    @endphp

    <body @if ($plantilla->color_body) data-background-color="{{ $plantilla->color_body }}" @endif>
        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->
                <div class="logo-header"
                    @if ($plantilla->color_logo) data-background-color="{{ $plantilla->color_logo }}" @endif>
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="navbar brand" class="navbar-brand">
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="icon-menu"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-expand-lg"
                    @if ($plantilla->color_header) data-background-color="{{ $plantilla->color_header }}" @endif>
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification">
                                        {{ auth()->user()->notifications->count() }}
                                    </span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">Tienes {{ auth()->user()->notifications->count() }}
                                            notificaciones nuevas</div>
                                    </li>
                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                @foreach (auth()->user()->notifications as $notification)
                                                    <a href="{{ route($notification->data['link']) }}" target="_blank">
                                                        <div class="notif-icon notif-primary"> <i
                                                                class="fa fa-user-plus"></i>
                                                        </div>
                                                        <div class="notif-content">
                                                            <span class="subject">
                                                                {{ $notification->data['titulo'] }}
                                                            </span>
                                                            <span
                                                                class="block">{{ $notification->data['descripcion'] }}</span>
                                                            <span class="time">{{ $notification->created_at }}</span>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" data-toggle="modal" data-target="#Notificationes"
                                            href="#">Mirar todas las notificaciones<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fas fa-layer-group"></i>
                                </a>
                                <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                    <div class="quick-actions-header">
                                        <span class="title mb-1">Quick Actions</span>
                                        <span class="subtitle op-8">Shortcuts</span>
                                    </div>
                                    <div class="quick-actions-scroll scrollbar-outer">
                                        <div class="quick-actions-items">
                                            <div class="row m-0">
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-file-1"></i>
                                                        <span class="text">Generated Report</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-database"></i>
                                                        <span class="text">Create New Database</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-pen"></i>
                                                        <span class="text">Create New Post</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-interface-1"></i>
                                                        <span class="text">Create New Task</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-list"></i>
                                                        <span class="text">Completed Tasks</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <i class="flaticon-file"></i>
                                                        <span class="text">Create New Invoice</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    @if (auth()->user()->foto)
                                        <div class="avatar-sm">
                                            <img src="{{ asset(auth()->user()->foto) }}" alt="..."
                                                class="avatar-img rounded-circle">
                                        </div>
                                    @else
                                        <div class="avatar-sm">
                                            <img src="{{ asset('img/avatar_default.png') }}" alt="..."
                                                class="avatar-img rounded-circle">
                                        </div>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    @if (auth()->user()->foto)
                                                        <img src="{{ asset(auth()->user()->foto) }}"
                                                            alt="image profile" class="avatar-img rounded">
                                                    @else
                                                        <img src="{{ asset('img/avatar_default.png') }}"
                                                            alt="image profile" class="avatar-img rounded">
                                                    @endif
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{ auth()->user()->name }}</h4>
                                                    <p class="text-muted">
                                                        @if (auth()->user()->user_id == 1)
                                                            Administrador
                                                        @elseif (auth()->user()->user_id == 2)
                                                            Supervisor
                                                        @else
                                                            Usuario
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            @if (Route::has('usuario.show'))
                                                <a class="dropdown-item"
                                                    href="{{ route('usuario.show', auth()->user()->id) }}">Mi
                                                    Perfil</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('usuario.edit', auth()->user()->id) }}">Editar
                                                    Perfil</a>
                                                <div class="dropdown-divider"></div>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout.user') }}">Salir</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <!-- Sidebar -->
            <div class="sidebar sidebar-style-2"
                @if ($plantilla->color_sidebar) data-background-color="{{ $plantilla->color_sidebar }}" @endif>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">
                            @if (auth()->user()->foto)
                                <div class="avatar-sm float-left mr-2">
                                    <img src="{{ asset(auth()->user()->foto) }}" alt="avatar"
                                        class="avatar-img rounded-circle">
                                </div>
                            @else
                                <div class="avatar-sm float-left mr-2">
                                    <img src="{{ asset('img/avatar_default.png') }}" alt="avatar"
                                        class="avatar-img rounded-circle">
                                </div>
                            @endif
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        <span>{{ auth()->user()->name }}</span>
                                        <span class="user-level">
                                            @if (auth()->user()->user_id == 1)
                                                Administrador
                                            @elseif (auth()->user()->user_id == 2)
                                                Supervisor
                                            @else
                                                Usuario
                                            @endif
                                        </span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>
                                <div class="collapse" id="collapseExample">
                                    <ul class="nav">
                                        @if (Route::has('usuario.show'))
                                            <li>
                                                <a href="{{ route('usuario.show', auth()->user()->id) }}">
                                                    <span class="link-collapse">Mi Perfil</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('usuario.edit', auth()->user()->id) }}">
                                                    <span class="link-collapse">Editar Perfil</span>
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ url('logout') }}">
                                                <span class="link-collapse">Salir</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Sub Menu -->
                        <ul class="nav nav-primary">
                            @if ($activeModules)
                                @include('base::Navbar.index')
                            @endif
                        </ul>
                        <!-- End Sub Menu -->
                    </div>
                </div>
            </div>

            <!-- End Sidebar -->
            <div class="main-panel">
                <div class="content">
                    <div class="panel-header"
                        @if ($plantilla->color_body == 'white') style="background-color:#1572e8" @else style="background-color:#1a2035" @endif>
                        <div class="page-inner py-5 text-capitalize">
                            @yield('page-inner')
                            @include('FlashMessage/message')
                        </div>
                    </div>
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#help">
                                        Obtener Ayuda
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#licence">
                                        Licencia
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright ml-auto">
                            Copyright © 2022,@csrf powered by <a href="tel:+57 3114360830">jhonatan fernandez</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Ventana Emergente Obtener Ayuda -->
        <div class="modal fade" id="help">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Repositorio de Ayuda</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <details>
                                <summary>
                                    <span class="card-title"><strong>Item 1</strong></span>
                                </summary>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you probably haven't heard of them accusamus labore sustainable VHS. </p>

                            </details>
                            <div class="dropdown-divider"></div>
                            <details>
                                <summary>
                                    <span class="card-title"><strong>Item 2</strong></span>
                                </summary>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you probably haven't heard of them accusamus labore sustainable VHS. </p>

                            </details>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ventana Emergente Licencia -->
        <div class="modal fade" id="licence">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Licencia del software</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <pre id="content" style="white-space: pre-wrap;word-wrap: break-word;font-size: 22px;"></pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ventana Emergente Notificaciones -->
        <div class="modal fade" id="Notificationes" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Visualizar Todas las notificaciones</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            @foreach (auth()->user()->notifications as $notification)
                                <li>

                                    <div class="card">
                                        <div class="card-header">
                                            {{ $notification->data['titulo'] }}
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ $notification->data['descripcion'] }}</p>
                                            <p class="card-text">{{ $notification->created_at }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <!-- jQuery UI -->
        <script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

        <!-- Chart JS -->
        <script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Chart Circle -->
        <script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>

        <!-- Datatables -->
        <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        <!-- Fonts and icons -->
        <script src="{{ asset('js/plugin/webfont/webfont.min.js') }}"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

        <!-- Atlantis JS -->
        <script src="{{ asset('js/atlantis.min.js') }}"></script>
        @stack('scripts')
        <script>
            $(document).ready(function() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("content").textContent = this.responseText;
                    }
                };
                xmlhttp.open("GET", "https://raw.githubusercontent.com/apache/.github/main/LICENSE", true);
                xmlhttp.send();

                $('table').DataTable({
                    "language": {
                        "url": "{{ asset('json/DataTable-es-ES.json') }}"
                    },
                    "lengthMenu": [
                        [5, 10, -1],
                        [5, 10, "Todos"]
                    ]
                });

            });
        </script>

    </body>
@else
    <body>
        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="blue2">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="navbar brand" class="navbar-brand">
                    </a>
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="icon-menu"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
                    <div class="container-fluid">
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <!-- Sidebar -->
            <div class="sidebar sidebar-style-2">
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <!-- Sub Menu -->
                        <ul class="nav nav-primary">
                            <li class="nav-item {{ Request::is('/')? 'active' : '' }}">
                                <a href="{{ url('/') }}">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>

                            @if ($activeModules)
                                @include(strtolower(collect(Module::allEnabled())->first()->getName()).'::Navbar.index')
                            @endif
                        </ul>
                        <!-- End Sub Menu -->
                    </div>
                </div>
            </div>

            <!-- End Sidebar -->
            <div class="main-panel">
                <div class="content">
                    <div class="panel-header" style="background-color:#1572e8">
                        <div class="page-inner py-5 text-capitalize">
                            @yield('page-inner')
                            @include('FlashMessage/message')
                        </div>
                    </div>
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#help">
                                        Obtener Ayuda
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#licence">
                                        Licencia
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright ml-auto">
                            Copyright © 2022,@csrf powered by <a href="tel:+57 3114360830">jhonatan fernandez</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Ventana Emergente Obtener Ayuda -->
        <div class="modal fade" id="help">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Repositorio de Ayuda</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <details>
                                <summary>
                                    <span class="card-title"><strong>Item 1</strong></span>
                                </summary>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you probably haven't heard of them accusamus labore sustainable VHS. </p>

                            </details>
                            <div class="dropdown-divider"></div>
                            <details>
                                <summary>
                                    <span class="card-title"><strong>Item 2</strong></span>
                                </summary>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you probably haven't heard of them accusamus labore sustainable VHS. </p>

                            </details>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ventana Emergente Licencia -->
        <div class="modal fade" id="licence">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Licencia del software</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <pre id="content" style="white-space: pre-wrap;word-wrap: break-word;font-size: 22px;"></pre>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <!-- jQuery UI -->
        <script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

        <!-- Chart JS -->
        <script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Chart Circle -->
        <script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>

        <!-- Datatables -->
        <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>

        <!-- Fonts and icons -->
        <script src="{{ asset('js/plugin/webfont/webfont.min.js') }}"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

        <!-- Atlantis JS -->
        <script src="{{ asset('js/atlantis.min.js') }}"></script>
        @stack('scripts')
        <script>
            $(document).ready(function() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("content").textContent = this.responseText;
                    }
                };
                xmlhttp.open("GET", "https://raw.githubusercontent.com/apache/.github/main/LICENSE", true);
                xmlhttp.send();

                $('table').DataTable({
                    "language": {
                        "url": "{{ asset('json/DataTable-es-ES.json') }}"
                    },
                    "lengthMenu": [
                        [5, 10, -1],
                        [5, 10, "Todos"]
                    ]
                });

            });
        </script>

    </body>

@endif

</html>
