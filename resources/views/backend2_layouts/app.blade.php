<!DOCTYPE html>
<html lang="en">
  <head>
    < <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
    <link rel="canonical" href="https://www.nursery.blooms-ai.com/"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('backend_title')</title>
    <link href="{{asset('backend2')}}/img/favicon.png" rel="icon">
    <link href="{{asset('backend2')}}/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">
    <link href="{{asset('backend2')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('backend2')}}/vendor/bootstrap-icons/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link href="{{asset('backend2')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('backend2')}}/css/flag-icon.min.css" rel="stylesheet">
  </head>
  <body>
    @include('../backend2_layouts/partials/header')
    @include('../backend2_layouts/partials/sidebar')
    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">@yield('breadcrumb')</li>
          </ol>
        </nav>
      </div>
      <section class="section dashboard">
          @yield('backend2_content')
      </section>
    </main>    
    @include('../backend2_layouts/partials/footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
    <script src="{{asset('backend2')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend2')}}/js/main.js"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  @include('../backend2/seller/plants_js')
  {!! Toastr::message() !!}
  </body>
</html>