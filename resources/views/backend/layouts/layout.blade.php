<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ helper()->appName }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ helper()->adminLte() }}bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Ionicons -->
    
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Theme style -->
    <link href="{{ helper()->adminLte() }}dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ helper()->adminLte() }}dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ helper()->adminLte() }}plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{ helper()->assetUrl() }}oblagio/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- jQuery 2.1.3 -->
    <script src="{{ helper()->adminLte() }}plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <!-- AdminLTE App -->

    <script src="{{ helper()->adminLte() }}dist/js/app.min.js" type="text/javascript"></script>
    <script src="{{ helper()->assetUrl() }}oblagio/js/datatables.js" type="text/javascript"></script>
    <script src="{{ helper()->adminLte() }}plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="{{ helper()->assetUrl() }}oblagio/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
    
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the 
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |  
  |---------------------------------------------------------|
  
  -->
  <body class="skin-blue">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">{{ helper()->appName }}</a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown user user-menu">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <span class="hidden-xs">Welcome {{ Auth::user()->username }}</span>
                </a>
                </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          

          <!-- Sidebar Menu -->
          @include('backend.layouts.sidebar')
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            &nbsp;
          </h1>
          {!! helper()->breadCrumbs() !!}
        </section>

        <!-- Main content -->
        <div id = 'model-generate' style="display:none;">{{ helper()->getMenu()->model }}</div>
        
        <section class="content">
          
          @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left --> 
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

     
     
    <script type="text/javascript">
     
      function urlAction(url)
      {
        return '{{ helper()->urlAction() }}/' + url;
      }

      function url(urls)
      {
        return '{{ url() }}' + urls;
      }
     
    </script>
    <script src="{{ helper()->assetUrl() }}oblagio/js/app.js" type="text/javascript"></script>
    <script src="{{ helper()->assetUrl() }}oblagio/js/table.js" type="text/javascript"></script>
    
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
  </body>
</html>