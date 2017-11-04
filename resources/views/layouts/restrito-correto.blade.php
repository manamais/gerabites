<!DOCTYPE html>
<html lang='en'>

    <head>

        <meta charset='UTF-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <meta name='msapplication-tap-highlight' content='no' />
        <meta name="csrf-token" content="{{ csrf_token() }}" />


        <!-- Chrome, Firefox OS and Opera -->
        <meta name='theme-color' content='#49CEFF'/>
        <!-- Windows Phone -->
        <meta name='msapplication-navbutton-color' content='#49CEFF' />
        <!-- iOS Safari -->
        <meta name='apple-mobile-web-app-capable' content='yes'/>
        <meta name='apple-mobile-web-app-status-bar-style' content='black-translucent'/>

        <title>GERABITES</title>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/bootstrap/dist/css/bootstrap.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/animate.css/animate.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/metisMenu/dist/metisMenu.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/Waves/dist/waves.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/toastr/toastr.css')}}'/>


        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/datatables/media/css/jquery.dataTables.min.css')}}'/>
        <!--<link rel='stylesheet' href='{{url('/assets/restrito/bower_components/bootstrap-sweetalert/lib/sweet-alert.css')}}'/>-->
        <link rel='stylesheet' href='{{url('assets/restrito/css/style.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/sweetalert.css')}}'/>


        @stack('css')
        @stack('js-topo')

        <script> window.bemfuncional = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>

        <!--[if lt IE 9]>
          <script src='{{url('assets/restrito/bower_components/html5shiv/dist/html5shiv.min.js')}}'></script>
          <script src='{{url('assets/restrito/bower_components/respondJs/dest/respond.min.js')}}'></script>
        <![endif]-->
    </head>


   

    <body class='icon-menu menu-alt'>

        <!--Preloader-->
        <!--<div id='preloader'>
              <div class='refresh-preloader'><div class='preloader'><i>.</i><i>.</i><i>.</i></div></div>
        </div>-->


        <div class='wrapper'>
            <nav class='navbar'>
                <div class='navbar-header container'>
                    <a href='#' class='menu-toggle'><i class='zmdi zmdi-menu'></i></a>
                    <a href='{{url('/')}}' class='logo'><img src='{{url('assets/restrito/img/logo.png')}}' alt='Logo Pacificonis'></a>
                    <a href='{{url('/')}}' class='icon-logo'></a>
                </div>
                <div class='navbar-container clearfix'>
                    <div class='pull-left'>
                        <a href='{{url('/')}}' class='page-title text-uppercase'>GERABITES</a>
                    </div>

                    <div class='pull-right'>
                        <div class='pull-left search-container'>
                            <form class='searchbox'>
                                <input type='search' placeholder='Search' name='search' class='searchbox-input'>
                                <input type='submit' class='searchbox-submit' value=''>
                                <span class='searchbox-icon'><span class='zmdi zmdi-search search-icon'></span></span>
                            </form>
                        </div>

                        <ul class='nav pull-right right-menu'>


                            <li class='more-options dropdown'>
                                <a class='dropdown-toggle' data-toggle='dropdown'>
                                    <i class='zmdi zmdi-account-circle'></i>
                                </a>

                                <div class='more-opt-container dropdown-menu'>
                                    <a href='#'><i class='zmdi zmdi-account-o'></i>Account<span class='badge badge-warning'>3</span></a>
                                    <a href='#'><i class='zmdi zmdi-storage'></i>Storage <span class='badge badge-danger'>2</span></a>
                                    <a href='#'><i class='zmdi zmdi-calendar-note'></i>Calendar <span class='badge badge-success'>2</span></a>
                                    <a href='#'><i class='zmdi zmdi-chart-donut'></i>Analytics <span class='badge badge-success'>7</span></a>
                                    <a href='#'><i class='zmdi zmdi-balance'></i>Balance <span class='badge badge-info'>5</span></a>
                                    <a href='#'><i class='zmdi zmdi-run'></i>Exit</a>
                                </div>
                            </li>
                            <li class='notification dropdown'>
                                <a class='dropdown-toggle'>
                                    <i class='zmdi zmdi-notifications'></i>
                                    <span class='badge badge-primary'>8</span>
                                </a>

                                <div class='dropdown-menu'>
                                    <h4 class='text-center info-color m-0'>You have 19 new notifications</h4>
                                    <div class='notification-container'>
                                        <a href='#'><i class='zmdi zmdi-email warning-color m-r-5'></i> You have 16 messages <span class='pull-right'>4 minutes ago</span></a>
                                        <a href='#'><i class='zmdi zmdi-twitter info-color m-r-5'></i> 3 new followers <span class='pull-right'>12 minutes ago</span></a>
                                        <a href='#'><i class='zmdi zmdi-dropbox info-color m-r-5'></i> 7 changed files <span class='pull-right'>18 minutes ago</span></a>
                                        <a href='#'><i class='zmdi zmdi-instagram warning-color m-r-5'></i> 26 new followers <span class='pull-right'>22 minutes ago</span></a>
                                        <a href='#'><i class='zmdi zmdi-twitter info-color m-r-5'></i> 8 new followers <span class='pull-right'>23 minutes ago</span></a>
                                    </div>
                                </div>
                            </li>




                            <li class='notification dropdown'>
                                <a class='dropdown-toggle'>
                                    <i class='zmdi zmdi-settings'></i>
                                </a>

                                <div class='dropdown-menu'>
                                    <h4 class='text-center info-color m-0'>Configurações</h4>
                                    <div class='notification-container'>
                                        <a href='{{url('/restrito/configuracoes-sistema')}}'>
                                            <i class='zmdi zmdi-settings info-color m-r-10'></i>Sistema
                                        </a>
                                        <a href='{{url('/restrito/configuracoes-boleto')}}'>
                                            <i class='zmdi zmdi-money info-color m-r-10'></i>Boleto
                                        </a>
                                        <a href='{{url('/restrito/configuracoes-midias')}}'>
                                            <i class='zmdi zmdi-share info-color m-r-10'></i>Mídias Sociais
                                        </a>
                                    </div>
                                </div>
                            </li>

















                            @if (Auth::guest())
                            <li></li>
                            @else
                            <li class='more-options dropdown'>
                                <a 
                                    data-toggle='tooltip' data-placement='left' title='Logout' data-original-title='Logout'
                                    href='{{url('/logout')}}'
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class='zmdi zmdi-sign-in'></i>
                                </a>
                            </li>
                            <input type="hidden" id="token" value="{{csrf_token()}}"/>
                            <form id='logout-form' action='{{ url('/logout')}}' method='POST' style='display: none;'>
                                {{ csrf_field() }}
                            </form>
                            @endif





                        </ul>
                    </div>
                </div>
            </nav>
            <aside class='sidebar'>
                <ul class='nav metismenu'>
                    <li>
                        <a aria-expanded='false' href='#'><i class='zmdi zmdi-accounts'></i>Usuários<span class='zmdi arrow'></span></a>
                        <ul aria-expanded='false' class='nav nav-inside collapse'>
                            <li class='inside-title'>Usuários</li>
                            <li><a href='{{url('/restrito/empresas')}}'>Empresas</a></li>
                            <li><a href='{{url('/restrito/usuarios')}}'>Usuários</a></li>
                            <li><a href='{{url('/restrito/permissoes')}}'>Permissões</a></li>
                            <li><a href='{{url('/restrito/papeis')}}'>Papéis</a></li>
                            <li><a href='{{url('/restrito/permissoes-perfil')}}'>Permissões do Perfil</a></li>
                            <li><a href='{{url('/restrito/perfil-usuarios')}}'>Perfil dos Usuários</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href='#'><i class='zmdi zmdi-money'></i>Financeiro
                            <span class='zmdi arrow'></span>
                        </a>
                        <ul class='nav nav-inside collapse'>
                            <li class='inside-title'>Financeiro</li>
                            <li class='menu-child'>
                                <a aria-expanded='false' href='#'><i class='zmdi zmdi-email'></i>
                                    BemFuncional<span class='zmdi arrow'></span>
                                </a>
                                <ul aria-expanded='false' class='nav nav-inside collapse'>
                                    <li class='inside-title'>BemFuncional</li>
                                    <li><p class='m-t-15 m-l-20 f-s-16' style='color: #546e7a'>Débitos</p></li>
                                    <li><a href='{{url('restrito/despesas/categorias')}}'>Categorias</a></li>
                                    <li><a href='{{url('restrito/despesas')}}'>Despesas</a></li>
                                    <li><p class='m-t-15 m-l-20 f-s-16' style='color: #546e7a'>Precificações</p></li>
                                    <li><a href='{{url('restrito/produtos')}}'>Produtos e Serviços</a></li>
                                    <li><a href='{{url('restrito/impostos')}}'>Taxas e Impostos</a></li>
                                </ul>
                            </li>
                            <li><a href='#'>Cotações (Clientes)</a></li>
                            <li><a href='#'>Faturas (Clientes)</a></li>
                            <li><a href='#'>Pagamentos (Clientes)</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href='{{url('restrito/projetos')}}'><i class='zmdi zmdi-developer-board'></i>Projetos
                            <span class='zmdi arrow'></span>
                        </a>
                    </li>

                    <li>
                        <a href='#'><i class='zmdi zmdi-blogger'></i>Blogs
                            <span class='zmdi arrow'></span>
                        </a>
                        <ul class='nav nav-inside collapse'>
                            <li class='inside-title'>Blogs</li>

                            <li><p class='m-t-15 m-l-20 f-s-16' style='color: #546e7a'>Classificação</p></li>
                            <li><a href='{{url('restrito/posts/categorias')}}'>Categorias</a></li>
                            <li><a href='{{url('restrito/posts/subcategorias')}}'>SubCategorias/Páginas</a></li>
                            <li><a href='{{url('restrito/posts/reacoes')}}'>Reações</a></li>

                            <li><p class='m-t-15 m-l-20 f-s-16' style='color: #546e7a'>Postagens</p></li>
                            <li><a href='{{url('restrito/posts/artigos')}}'>Artigos</a></li>
                            <li><a href='{{url('restrito/posts/banners')}}'>Banners</a></li>
                            <li><a href='{{url('restrito/posts/portifolio')}}'>Portifólio</a></li>
                            <li><a href='{{url('restrito/posts/depoimentos')}}'>Depoimentos</a></li>


                        </ul>
                    </li>



                    <li>
                        <a href='{{url('restrito/tickets')}}'>
                            <i class='zmdi zmdi-labels'></i>Tickets
                        </a>
                    </li>

                    <li>
                        <a href='{{url('restrito/produtos-servicos')}}'><i class='zmdi zmdi-codepen'></i>Produtos e Serviços
                            <span class='zmdi arrow'></span>
                        </a>
                    </li>




                </ul>
            </aside>






            <div class="container-fluid">
                <!-- containner content -->
                @yield('content')
                <!-- containner content -->
            </div>





        </div>



        <script src='{{url('assets/restrito/bower_components/jquery/dist/jquery.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/bootstrap/dist/js/bootstrap.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/metisMenu/dist/metisMenu.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/Waves/dist/waves.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/toastr/toastr.js')}}'></script>


        <script src='{{url('assets/restrito/bower_components/datatables/media/js/jquery.dataTables.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/datatables.net-responsive/js/dataTables.responsive.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/moment/min/moment.min.js')}}'></script>

        <!--<script src='{{url('assets/restrito/bower_components/Chart.js/Chart.js')}}'></script>-->
        <!--<script src='{{url('assets/restrito/bower_components/flot/jquery.flot.js')}}'></script>-->
        <!--<script src='{{url('assets/restrito/bower_components/flot/jquery.flot.resize.js')}}'></script>-->
        <!--<script src='{{url('assets/restrito/bower_components/flot.tooltip/js/jquery.flot.tooltip.js')}}'></script>-->
        <!--<script src='{{url('assets/restrito/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js')}}'></script>-->

        <script src='{{url('assets/restrito/js/tinymce/tinymce.min.js')}}'></script>
        <script src='{{url('assets/restrito/js/common.js')}}'></script>
        <script src='{{url('assets/sweetalert.min.js')}}'></script>

        <script src='{{url('assets/restrito/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js')}}'></script>





        @stack('js-footer')
        @include('sweet::alert')
        @include('restrito._includes.scripts_home')









    </body>
</html>