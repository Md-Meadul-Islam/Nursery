<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 </script>
  <script>
    $(document).ready(function () {
         $('.carousel').each(function () {
             var index = $(this).data('index');
             $(this).children('.carousel-control-prev').on('click', function () {
                 navigateCarousel($(this).closest('.carousel'), 'prev');
             });
             $(this).children('.carousel-control-next').on('click', function () {
                 navigateCarousel($(this).closest('.carousel'), 'next');
             });
         });
     }); 
     // Function to navigate a specific carousel
     function navigateCarousel(carousel, direction) {
         var carouselItems = carousel.find('.carousel-inner .carousel-item');
         var activeIndex = getActiveIndex(carouselItems);
         if (direction === 'prev') {
             activeIndex = (activeIndex - 1 + carouselItems.length) % carouselItems.length;
         } else {
             activeIndex = (activeIndex + 1) % carouselItems.length;
         }
         carouselItems.each(function (i, item) {
             $(item).toggleClass('active', i === activeIndex);
         });
     } 
     // Function to get the index of the active carousel item
     function getActiveIndex(items) {
         for (var i = 0; i < items.length; i++) {
             if ($(items[i]).hasClass('active')) {
                 return i;
             }
         }
         return 0;
     }
 </script> 
 <script>
     $(document).ready(function(){
           //for pagination
        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            $.ajax({
                url:"/homepagination?page="+page,
                success: function(res){
                    $('.plants_index_main').html(res);
                }
            });
        });
        //for search
        $(document).on('click', '#mainsearch', function(){
                $.ajax({
                    url: "{{ route('home.search') }}",
                    method: 'GET',
                    data: { searchString: $('.searchString').val() },
                    success: function(res) {
                        $('.plants_index_main').html(res);
                    },
                    error:function(xhr){
                    var errors = xhr.responseJSON.error;
                    toastr["error"](errors[0], "Cancelled");
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                }
            });            
        });
        $(document).on('change', '.perpage', function(e){
            e.preventDefault();
            $.ajax({
                url:"{{route('home.perpage')}}",
                method:"GET",
                data:{
                    perpage:$('.perpage').val()
                },
                success:function(res){
                    $('.plants_index_main').html(res);
                }
            });
        });
        //for filters
        $(document).on('click', '.filter', function(e){
            e.preventDefault();
            let price_rangefrom= $('.rangefrom').text();
            let price_rangeto = $('.rangeto').text();
            let price = $('.price').val();
            let category = $('.category').val();
            let season = $('.season').val();
            $.ajax({
                url:"{{route('home.filter')}}",
                method:'GET',
                data:{
                    rangefrom:price_rangefrom, rangeto:price_rangeto, price:price, category:category, season:season
                },
                success:function(res){
                    $('.plants_index_main').html(res);
                },error:function(err){
                    console.log(err);
                }
            })
        });
        //for add to cart
        $(document).on('click', '.addtocart', function(){
            let plantId = $(this).data('id');
            $.ajax({
                url:"{{route('home.addcart')}}",
                method:'GET',
                data:{plantId:plantId},
                success:function(res){
                    $('.incarts').text(res.pieces.pieces);
                    toastr["success"](res.success, "Success");
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }       
                },error:function(xhr){
                    var errors = xhr.responseJSON.error;
                    toastr["error"](errors[0], "Cancelled");
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                }
            })
        });
        //open the cart
        $(document).on('click', '.cartdetails', function(e){
                $("html, body").animate({
                        scrollTop: $(".forCart").offset().top
                    }, 500);
                $.ajax({
                    url: "{{ route('home.cart') }}",
                    method: 'GET',
                    success: function(res) {
                        $('.forCart').html(res);
                    },
                });            
        });
        //Adjust cart items Quantity
        $(document).on('input', '.qtyadjust', function(){
            let pricedetails = $(this).closest('.pricedetails');
            let priceValue = parseInt(pricedetails.find('.offer_price').text()) || 0;
            let qty = parseInt($(this).val()) || 0;
            let total = priceValue * qty;
            console.log(priceValue, qty, total);
            pricedetails.find('.total').text(total);
                let intotal = 0;
            $('.total').each(function() {
                intotal += parseInt($(this).text());
            });
           $('.cartintotal').text(intotal);
        });
        //remove from Cart
        $(document).on('click', '.remove', function(){
            $.ajax({
                url:"{{route('home.removecart')}}",
                method:'GET',
                data:{id:$(this).data('id')},
                success:function(res){
                    $('.forCart').html(res);
                    toastr["success"](res.success, "Success");
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }       
                }
            });
        });
        //confirm order
        $(document).on('click', '.confirmorder', function(){
            let arrayLength = $('.plantname').length;
            let plantdetails = [];
            for (let i = 0; i < arrayLength; i++) {
                plantdetails.push({
                plantId: $('.plantname').eq(i).data('id'),
                gardenId: $('.getowner').eq(i).data('id'),
                priceValue: $('.offer_price').eq(i).text(),
                qty: $('.qtyadjust').eq(i).val()
            });
            }
            $.ajax({
                url:"{{route('home.confirmorder')}}",
                method: 'POST',
                data:{orderDetails:plantdetails},
                success:function(res){
                    toastr["success"](res.success, "Confirmed");
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }  
                }
            });
        });
        //view top ten plants
        $(document).on('click', '.topTen', function(){
            $("html, body").animate({
                        scrollTop: $(".forCart").offset().top
                    }, 500);
            $.ajax({
                url:"{{route('home.topten')}}",
                success: function(res) {
                    $('.forCart').html(res);
                },
            })
        });
        //view garden owner
        $(document).on('click', '.getowner', function(){
            $.ajax({
                url:"{{route('home.getowner')}}",
                method:'GET',
                data:{id:$(this).data('id')},
                success:function(res){
                    $('#gardenowner').html(res);
                    $("html, body").animate({
                        scrollTop: $("#gardenowner").offset().top
                    }, 500);
                },
                error:function(xhr){
                    var errors = xhr.responseJSON.error;
                   alert(xhr);
                }
            });
        });
        $(document).on('click', '.viewratings', function(event){
            if($('.changeratings.show')){
                $('.changeratings').slideUp(300, function() {
                    $(this).html('');
                });
            }
            let plant_id = $(this).parent().next().children().data('id');
            let changeratings = $(this).next();
            changeratings.addClass('show');
            $.ajax({
                url:"{{route('home.plantratingdetails')}}",
                method:'POST',
                data:{plant_id:plant_id},
                success:function(res){
                    changeratings.html(res);
                },
            });
        });
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.viewratings').length) {
                $('.changeratings').slideUp(300, function() {
                    $('.changeratings').html('');
                });
            }
        });
      });
      $(document).on('click','.carousel-inner', function(e){
        let parentDiv = $(this).parent().closest('.spreadDiv');
        parentDiv.addClass('spread');
        console.log();
      })
 </script>