<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            @if(auth()->user()->hasRole('administrator'))
                <div class="menu_section">
                    <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3>
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                {{ __('views.backend.section.navigation.menu_0_1') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>{{ __('Configuracion Maestros') }}</h3>
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('admin.fincas.index') }}">
                                <i class="fa fa-database" aria-hidden="true"></i>
                                {{ __('Fincas y Piscinas') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.planificaciones.index') }}">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                {{ __('Planificaciones') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>{{ __('Activacion y Aplicacion') }}</h3>
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('ciclos.index') }}">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                {{ __('Ciclos') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>{{ __('Configuracion Inicial') }}</h3>
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('admin.products.index') }}">
                                <i class="fa fa-cubes" aria-hidden="true"></i>
                                {{ __('Productos para Balanceado') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.insumos.index') }}">
                                <i class="fa fa-cubes" aria-hidden="true"></i>
                                {{ __('Insumos') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.tallas.index') }}">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                {{ __('Tallas') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.metrics.index') }}">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                {{ __('Metricas') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>{{ __('Administracion de Usuarios') }}</h3>
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('admin.users') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                {{ __('Usuarios') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.permissions') }}">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                {{ __('Permisos de Usuarios') }}
                            </a>
                        </li>
                    </ul>
                </div>
            @else
                <div class="menu_section">
                    <h3>{{ __('Activacion y Aplicacion') }}</h3>
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('ciclos.index') }}">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                {{ __('Ciclos') }}
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
