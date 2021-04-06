<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>PPE4 LARAVEL</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/light-bootstrap-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('/css/demo.css')}}" rel="stylesheet" />
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script src="{{asset('/js/vicopo.js')}}"></script>
     <script src="{{asset('/js/validate.min.js')}}"></script>
     <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
                       

    <div class="wrapper">
        <div class="sidebar" data-image="{{asset('/img/sidebar-5.jpg')}}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text" style="color:yellow;">
                      PPE4 LARAVEL
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item {{request()->routeis('poste.index') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('poste.index')}}">
                            <i class="nc-icon nc-icon nc-paper-2"></i>
                            <p>Accueil</p>
                        </a>
                    </li>  
                    <li class="nav-item {{request()->routeis('user.index') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('user.index')}}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Gérer utilisateurs {{$nbValid}}</p>
                        </a>
                    </li> 
                     <li class="nav-item {{request()->routeis('type.index') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('type.index')}}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Gérer types</p>
                        </a>
                    </li>
                    <li class="nav-item {{request()->routeis('categorie.index') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('categorie.index')}}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Gérer catégories</p>
                        </a>
                    </li>
                    <li class="nav-item {{request()->routeis('poste.validation') ? 'active' : ''}}">
                     
                        <a class="nav-link" href="{{route('poste.validation')}}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Validation ({{$nbValid}})</p>
                        </a>
                    </li>
                    <li class="nav-item {{request()->routeis('message.index') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('message.index')}}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Messagerie</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg colorperso" color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo" style="color:green;">Template</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Profil</span>
                                </a>
                            </li>
                            <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>-->
                            @if(Auth::check())
                            <li class="nav-item">
                            <form name="form" action="{{route('logout')}}" method="POST">
                                @csrf 
                                <button type="submit" class="btn">Se déconnecter</button>
                            </form>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">
                                    <span class="no-icon">Se connecter</span>
                                </a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            
            @if(request()->session()->get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative alert" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline"> {{request()->session()->get('success')}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                </span>
            </div>
      
      @endif
       @if(request()->session()->get('error'))
       <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative alert" role="alert">
                <strong class="font-bold">Erreur!</strong>
                <span class="block sm:inline"> {{request()->session()->get('error')}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                </span>
            </div>
      
      @endif
          
            <div class="content">
                <div class="container-fluid ">
                    <div class="section ">
                    @section('content')
                    <div class="card">
                        <div class="card-header">
                            Nom offre
                        </div>
                    <div class="card-body colorpersocard">
                        <blockquote class="blockquote mb-0">
                            <p>Description offre</p>
                            <footer class="blockquote-footer">Entreprise</footer>
                        </blockquote>
                    </div>
                </div>
                    @show
                </div>
                </div>
            </div>
      
      
        </div>
       
    </div>
    
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->

</body>
<!--   Core JS Files   -->
<script src="{{asset('/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{asset('/js/light-bootstrap-dashboard.js?v=2.0.0')}}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('/js/demo.js')}}"></script>

@section('script')
@show
</body>

</html>
