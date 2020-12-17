
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="/admin/assets/img/rcl.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">

    <link href="/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
     <!-- BEGIN PAGE LEVEL STYLES -->
     <link rel="stylesheet" type="text/css" href="/admin/plugins/table/datatable/datatables.css">
     <link rel="stylesheet" type="text/css" href="/admin/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="/admin/plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->
    <link href="/admin/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/forms/theme-checkbox-radio.css">
    <link href="/admin/plugins/lightbox/photoswipe.css" rel="stylesheet" type="text/css" />
    <link href="/admin/plugins/lightbox/default-skin/default-skin.css" rel="stylesheet" type="text/css" />
    <link href="/admin/plugins/lightbox/custom-photswipe.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->   

    <link rel="stylesheet" type="text/css" href="/admin/assets/css/elements/alert.css">
    <link href="/admin/assets/css/elements/search.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/pages/contact_us.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/forms/theme-checkbox-radio.css">
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/admin/assets/css/apps/scrumboard.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    
    <!-- Dashboard -->
    <link href="/admin/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="/admin/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link href="/admin/plugins/animate/animate.css" rel="stylesheet" type="text/css" />

     <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/admin/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="/admin/plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
    <link href="/admin/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="/admin/plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
    <link href="/admin/plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">
    <!--  END CUSTOM STYLE FILE  -->

    <link href="/admin/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/admin/plugins/jquery-step/jquery.steps.css">

    <link href="/admin/assets/css/components/tabs-accordian/custom-accordions.css" rel="stylesheet" type="text/css" />
    
    <!--  BEGIN CUSTOM STYLE FILE  SELECT-->
    <link href="/admin/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" type="text/css" href="/admin/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/plugins/bootstrap-select/bootstrap-select.min.css">
    <!--  END CUSTOM STYLE FILE  -->

    <link href="/admin/assets/chart/css/app.css" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 184px)!important;
        }

    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
</head>
<body class="sidebar-noneoverflow">
    
  @include('includes.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

       @include('includes.topbar')
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">


                <!-- CONTENT AREA -->
                

                            @yield('content')
                       
                       
                       @include('sweetalert::alert')


                <!-- CONTENT AREA -->

            </div>
           @include('includes.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->


    @include('includes.scripts')

@yield('script')

</body>
</html>