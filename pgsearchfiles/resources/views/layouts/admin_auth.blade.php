<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>PG Search | Owner Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('assets/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('assets/admin/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/admin/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('assets/admin/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />


        <link href="{{ asset('assets/admin/pages/css/login-2.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            @yield('content')
        </div>
        <div class="copyright hide"> {{ date('Y')}} © Webcom. </div>
        <!-- END LOGIN -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ asset('assets/admin/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('assets/admin/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('assets/admin/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script>
            $('#tnc').click(function () {
                //check if checkbox is checked
                if ($(this).is(':checked')) {

                    $('#register-submit-btn').removeAttr('disabled'); //enable input

                } else {
                    $('#register-submit-btn').attr('disabled', true); //disable input
                }
            });
    </script>
    </body>
</html>