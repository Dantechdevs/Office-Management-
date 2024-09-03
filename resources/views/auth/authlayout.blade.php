     <!DOCTYPE html>
<html>
    <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8" />
        <title>{{$title ?? 'hi'}}-{{ config('app.name', 'Laravel') }}</title>

        <!-- Site favicon -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="vendors/images/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="vendors/images/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="vendors/images/favicon-16x16.png"
        />

        <!-- Mobile Specific Metas -->
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1"
        />

        <!-- Google Font -->
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/theme/vendors/styles/core.css')}}" />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('admin/theme/vendors/styles/icon-font.min.css')}}"
        />
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('admin/theme/src/plugins/jquery-steps/jquery.steps.css')}}"
        />
        <link rel="stylesheet" type="text/css" href="{{asset('admin/theme/vendors/styles/style.css')}}" />

        <!-- Global site tag (gtag.js) - Google Analytics -->

        <!-- End Google Tag Manager -->
    </head>

            <body class="login-page">
     
       @yield('content')
        <!-- js -->
        <script src="{{asset('admin/theme/vendors/scripts/core.js')}}"></script>
        <script src="{{asset('admin/theme/vendors/scripts/script.min.js')}}"></script>
        <script src="{{asset('admin/theme/vendors/scripts/process.js')}}"></script>
        <script src="{{asset('admin/theme/vendors/scripts/layout-settings.js')}}"></script>
        <script src="{{asset('admin/theme/src/plugins/jquery-steps/jquery.steps.js')}}"></script>
        <script src="{{asset('admin/theme/vendors/scripts/steps-setting.js')}}"></script>
        <!-- Google Tag Manager (noscript) -->
        
        <!-- End Google Tag Manager (noscript) -->
    </body>
</html>
