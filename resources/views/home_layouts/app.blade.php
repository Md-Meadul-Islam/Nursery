<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.9, user-scalable=0, minimal-ui">
    <meta name="description"
      content="Biggest Plants Gallery. Spread the world Beauty. You can Buy or Sell your favorites plants."/>
    <meta name="keywords"
      content="nursery, gardens, e-garden, e-nursery, plants, plant, flowers, fruits, cactus, ecommerce, e-commerce, blooms, blooms-ai.com"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="E-Nursery | E-Garden"/>
    <meta property="og:title" content="E-Nursery | E-Garden"/>
    <meta property="og:description"
      content="Biggest Plants Gallery. Spread the world Beauty. You can Buy or Sell your favorites plants."/>
    <meta property="og:image" content="https://www.nursery.blooms-ai.com/img/logo.png"/>
    <meta property="og:url" content="https://www.nursery.blooms-ai.com/"/>
    <meta itemprop="name" content="E-Nursery | E-Garden"/>
    <meta itemprop="description"
      content="Biggest Plants Gallery. Spread the world Beauty. You can Buy or Sell your favorites plants."/>
    <meta itemprop="image" content="https://www.nursery.blooms-ai.com/img/logo.png" />
    <meta name="google-adsense-account" content="ca-pub-3304643762159808">
    <meta name="robots" content="index, follow">
    <meta name ="rating" content="adult">
    <meta name="author" content="Blooms-AI">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://www.nursery.blooms-ai.com/"/>
    <link href="{{asset('backend2')}}/img/favicon.png" rel="icon">
    <link href="{{asset('backend2')}}/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
      rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link href="{{asset('frontend')}}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">    
    <link href="{{asset('frontend')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/style.css" rel="stylesheet">
    <title>@yield('home_title')</title>
  </head>
  <body>
    <div id="spinner"
      class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" role="status"></div>
    </div>
    @include('home_layouts.partials.header')
    @include('home_layouts.partials.hero')
    @yield('main_content')
    @include('home_layouts.partials.footer')
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
        class="fa fa-arrow-up"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
      integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('frontend')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('frontend')}}/lib/lightbox/js/lightbox.min.js"></script>
    <script src="{{asset('frontend')}}/lib/owlcarousel/owl.carousel.min.js"></script> 
    <script src="{{asset('frontend')}}/js/main.js"></script>
    @include('home.allPlants.ajax_js_forhome')
    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    {!! Toastr::message() !!}
  </body>
</html>