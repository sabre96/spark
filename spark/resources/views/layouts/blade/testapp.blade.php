<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Spark')</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="/public/assets/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="/public/assets/images/logo.png">

    <!-- style -->
    <link rel="stylesheet" href="/public/assets/animate.css/animate.min.css" type="text/css"/>
    <link rel="stylesheet" href="/public/assets/glyphicons/glyphicons.css" type="text/css"/>
    <link rel="stylesheet" href="/public/assets/font-awesome/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="/public/assets/material-design-icons/material-design-icons.css" type="text/css"/>

    <link rel="stylesheet" href="/public/assets/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    <!-- build:css /public/assets/styles/app.min.css -->
    <link rel="stylesheet" href="/public/assets/styles/app.css" type="text/css"/>
    <!-- endbuild -->
    <link rel="stylesheet" href="/public/assets/styles/font.css" type="text/css"/>

    <!-- CSS -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
@yield('scripts', '')

<!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
                Spark::scriptVariables(), []
        )); ?>
    </script>
    <script>
        window.Spark = <?php echo json_encode([
                'braintreeToken' => Spark::billsUsing('braintree') ? Braintree\ClientToken::generate() : null,
                'cardUpFront' => Spark::needsCardUpFront(),
                'csrfToken' => csrf_token(),
                'roles' => Spark::roles(),
                'stripeKey' => config('services.stripe.key'),
                'userId' => Auth::id(),
                'usesApi' => Spark::usesApi(),
                'usesBraintree' => Spark::billsUsingBraintree(),
                'usesTeams' => Spark::usesTeams(),
                'usesStripe' => Spark::billsUsingStripe(),
        ]) ?>;
    </script>
</head>
<body>
<div class="app" id="app">

    <!-- ############ LAYOUT START-->

    <!-- aside -->
    <div id="aside" class="app-aside modal fade nav-dropdown">
        <!-- fluid app aside -->
        <div class="left navside dark dk" layout="column">
            <div class="navbar no-radius">
                <!-- brand -->
                <a class="navbar-brand">
                    <div ui-include="'/public/assets/images/logo.svg'"></div>
                    <img src="/public/assets/images/logo.png" alt="." class="hide">
                    <span class="hidden-folded inline">Flatkit</span>
                </a>
                <!-- / brand -->
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll nav-light">

                    <ul class="nav" ui-nav>
                        <li class="nav-header hidden-folded">
                            <small class="text-muted">Main</small>
                        </li>

                        <li>
                            <a href="dashboard.html">
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'/public/assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a>
                    <span class="nav-caret">
                      <i class="fa fa-caret-down"></i>
                    </span>
                                <span class="nav-label">
                      <b class="label rounded label-sm primary">5</b>
                    </span>
                                <span class="nav-icon">
                      <i class="material-icons">&#xe5c3;
                        <span ui-include="'/public/assets/images/i_1.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">Apps</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="inbox.html">
                                        <span class="nav-text">Inbox</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <span class="nav-text">Contacts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                        <span class="nav-text">Calendar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>




                        <li class="nav-header hidden-folded">
                            <small class="text-muted">Help</small>
                        </li>

                        <li class="hidden-folded">
                            <a href="docs.html">
                                <span class="nav-text">Documents</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div flex-no-shrink class="b-t">
                <div class="nav-fold">
                    <a href="profile.html">
        	    <span class="pull-left">
        	      <img src="/public/assets/images/a0.jpg" alt="..." class="w-40 img-circle">
        	    </span>
                        <span class="clear hidden-folded p-x">
        	      <span class="block _500">Jean Reyes</span>
        	      <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>
        	    </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- / -->

    <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">
        <div class="app-header white box-shadow">
            <div class="navbar">
                <!-- Open side - Naviation on mobile -->
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
                    <i class="material-icons">&#xe5d2;</i>
                </a>
                <!-- / -->

                <!-- Page title - Bind to $state's title -->
                <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>

                <!-- navbar right -->
                <ul class="nav navbar-nav pull-right">
                    <li class="nav-item dropdown pos-stc-xs">
                        <a class="nav-link" href data-toggle="dropdown">
                            <i class="material-icons">&#xe7f5;</i>
                            <span class="label label-sm up warn">3</span>
                        </a>
                        {{--<div ui-include="'../views/blocks/dropdown.notification.html'"></div>--}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link clear" href data-toggle="dropdown">
                  <span class="avatar w-32">
                    <img src="/public/assets/images/a0.jpg" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                        </a>
                        {{--<div ui-include="'../views/blocks/dropdown.user.html'"></div>--}}
                    </li>
                    <li class="nav-item hidden-md-up">
                        <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                            <i class="material-icons">&#xe5d4;</i>
                        </a>
                    </li>
                </ul>
                <!-- / navbar right -->

                <!-- navbar collapse -->
                <div class="collapse navbar-toggleable-sm" id="collapse">
                {{--<div ui-include="'../views/blocks/navbar.form.right.html'"></div>--}}
                <!-- link and dropdown -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href data-toggle="dropdown">
                                <i class="fa fa-fw fa-plus text-muted"></i>
                                <span>New</span>
                            </a>
                            {{--<div ui-include="'../views/blocks/dropdown.new.html'"></div>--}}
                        </li>
                    </ul>
                    <!-- / -->
                </div>
                <!-- / navbar collapse -->
            </div>
        </div>
        <div class="app-footer">
            <div class="p-a text-xs">
                <div class="pull-right text-muted">
                    &copy; Copyright <strong>Flatkit</strong> <span
                            class="hidden-xs-down">- Built with Love v1.1.3</span>
                    <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
                </div>
                <div class="nav">
                    <a class="nav-link" href="../">About</a>
                    <span class="text-muted">-</span>
                    <a class="nav-link label accent" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get
                        it</a>
                </div>
            </div>
        </div>
        <div ui-view class="app-body" id="view">

            <!-- ############ PAGE START-->


            <div id="spark-app">
                <!-- Navigation -->
            @if (Auth::check())
                @include('spark::nav.user')
            @else
                @include('spark::nav.guest')
            @endif

            <!-- Main Content -->
            @yield('content')

            <!-- Application Level Modals -->
            @if (Auth::check())
                @include('spark::modals.notifications')
                @include('spark::modals.support')
                @include('spark::modals.session-expired')
            @endif

            <!-- JavaScript -->
                <script src="/js/app.js"></script>
                <script src="/js/sweetalert.min.js"></script>
            </div>

            <!-- ############ PAGE END-->

        </div>
    </div>
    <!-- / -->


    <!-- ############ LAYOUT END-->

</div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
<script src="/public/libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
<script src="/public/libs/jquery/tether/dist/js/tether.min.js"></script>
<script src="/public/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
<script src="/public/libs/jquery/underscore/underscore-min.js"></script>
<script src="/public/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="/public/libs/jquery/PACE/pace.min.js"></script>

<script src="/public/js/scripts/config.lazyload.js"></script>

<script src="/public/js/scripts/palette.js"></script>
<script src="/public/js/scripts/ui-load.js"></script>
<script src="/public/js/scripts/ui-jp.js"></script>
<script src="/public/js/scripts/ui-include.js"></script>
<script src="/public/js/scripts/ui-device.js"></script>
<script src="/public/js/scripts/ui-form.js"></script>
<script src="/public/js/scripts/ui-nav.js"></script>
<script src="/public/js/scripts/ui-screenfull.js"></script>
<script src="/public/js/scripts/ui-scroll-to.js"></script>
<script src="/public/js/scripts/ui-toggle-class.js"></script>

<script src="/public/js/scripts/app.js"></script>

<!-- ajax -->
<script src="/public/libs/jquery/jquery-pjax/jquery.pjax.js"></script>
<script src="/public/js/scripts/ajax.js"></script>
<!-- endbuild -->
</body>
</html>

{{-- NIEUW------------------------------------------------------------------------}}
