    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/icons/canvas_icon.webp') }}" />
    <!-- Core theme CSS (includes Bootstrap v5.2.3) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->

        <link href="{{ asset('css/homePage.css') }}" rel="stylesheet" />

    @if (Route::current()->uri == 'templates/resume')
        <link href="{{ asset('css/homePage.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/resumeTempletes.css') }}" rel="stylesheet" />
    @endif
    @if (Route::current()->uri == 'register' || Route::current()->uri == 'login')
        <link href="{{ asset('css/loginSignUp.css') }}" rel="stylesheet" />
    @endif
    @if (Route::current()->uri == 'user/dashboard/home' || Route::current()->uri == 'user/dashboard/settings' || Route::current()->uri == 'user/dashboard/subcribtion'  || Route::current()->uri == 'user/dashboard/templates' )
    <link href="{{ asset('css/userDashboards.css') }}" rel="stylesheet" />
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">  --}}
    @endif
    @if (Route::current()->uri == 'payment/subscription')
    <link href="{{ asset('css/subscriptionPlan.css') }}" rel="stylesheet" />
    @endif
    @if (Route::current()->uri == 'edit/resume/{ID}')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" integrity="sha512-cyzxRvewl+FOKTtpBzYjW6x6IAYUCZy3sGP40hn+DQkqeluGRCax7qztK2ImL64SA+C7kVWdLI6wvdlStawhyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endif
    <!-- Boxicons -->
    <link href="{{ asset('fonts/boxicons.css') }}" rel="stylesheet" />
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    {{--  <!-- Add links to Bootstrap and Font Awesome here -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>  --}}

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
