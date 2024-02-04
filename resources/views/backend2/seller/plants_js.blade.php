
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 </script>
 <script>
    $(document).ready(function(){
        //add Plants
        $(document).on('click', '.add_plant', function(e){
            e.preventDefault();
            var form = $('.add_plant').closest('form')[0];
            var formData = new FormData(form);
            $.ajax({
                url:"{{route('allplants.store')}}",
                method: 'POST',
                data: formData,
                contentType: false,  // Set content type to false
                processData: false,  // Don't process data            
                success:function(res){
                    setTimeout(function() {
                        $('#add_plant_modal').modal('hide');
                        $('#addPlantform')[0].reset();
                        $('.plants_index').load(location.href+' .plants_index');                    
                    }, 500); // 500 milliseconds delay     
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
                },
                error:function(xhr, status, error){
                    var errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            toastr["error"](value[0], "Request Cancelled!");
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
                        });
                }
            });
        });
        //for showing data in update modal
        $(document).on('click', '.update_plant_form', function(){
            var plantData = $(this).data('plant');
            $('#update_plant_modal input[name="up_id"]').val(plantData.id);
            $('#update_plant_modal input[name="globalname"]').val(plantData.globalname);
            $('#update_plant_modal input[name="localname"]').val(plantData.localname);
            $('#update_plant_modal textarea[name="details"]').val(plantData.details);
            $('#update_plant_modal select[name="category"]').val(plantData.category);
            $('#update_plant_modal select[name="sub_category"]').val(plantData.sub_category);
            $('#update_plant_modal select[name="garden_id"]').val(plantData.garden_id);
            $('#update_plant_modal input[name="price"]').val(plantData.price);
            $('#update_plant_modal input[name="offer_price"]').val(plantData.offer_price);          
            for (let i = 1; i <= 3; i++) {
                let photoProperty = 'photo_' + i;
                if (plantData[photoProperty]) {
                    let photoUrl = '/storage/plants_images/' + plantData[photoProperty];
                    $('#update_plant_modal img[name="photo_' + i + '_preview"]').attr('src', photoUrl);
                }
            }
            $('#update_plant_modal span[name="video_name"]').text(plantData.video_original_name);
         });
         //submitting updated data
         $(document).on('click', '.update_plant', function(e){
            e.preventDefault();
            var form = $('.update_plant').closest('form')[0];
            var formData = new FormData(form);
            $.ajax({
                url:"{{route('allplants.update')}}",
                method: 'POST',
                data: formData,
                contentType: false,  // Set content type to false
                processData: false,  // Don't process data            
                success:function(res){
                    let su = res.responseJSON;
                    setTimeout(function() {
                        $('#update_plant_modal').modal('hide');
                        $('#updatePlantform')[0].reset();
                        $('.plants_index').load(location.href+' .plants_index');                    
                    }, 500); // 500 milliseconds delay     
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
                },
                error:function(xhr, status, error){
                    var errors = xhr.responseJSON.errors;
                        // Display individual error messages
                        $.each(errors, function (key, value) {
                            toastr["error"](value[0], "Cancelled")
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
                        });
                }
            });
        });
        //delete data
        $(document).on('click', '.delete_plant', function(e){
            e.preventDefault();
            let delete_id = $(this).data('id');
            if(confirm('Are you sure to delete plant ??')){
                $.ajax({
                url:"{{route('allplants.delete')}}",
                method: 'POST',
                data: {id:delete_id},      
                success:function(res){
                    $('.plants_index').load(location.href+' .plants_index');
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
                   } ;               
                },
            });
            }
        });
        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            $.ajax({
                url:"/seller/allplants/paginated_plants?page="+page,
                success: function(res){
                    $('.plants_index').html(res);
                }
            })
        });
        //add garden btn for seller
        $(document).on('click', '.addgardenbtn', function(){
            $.ajax({
                url:"{{route('seller.addgardenpage')}}",
                method:"GET",
                success:function(res){
                    $('.addgardenform').html(res);
                }
            });
        });
        $(document).on('click', '.addgarden', function(e){
            e.preventDefault();
            $.ajax({
                url:"{{route('seller.addgarden')}}",
                method:"POST",
                data:{gardenname:$('#gardenname').val(),
                gardensize:$('#gardensize').val(),
                localaddress:$('#localaddress').val(),
                gardencity:$('#gardencity').val(),
                gardentotalplants:$('#gardentotalplants').val(),
                gardencategory:$('#gardencategory').val()},
                success:function(res){
                    if(res.success){
                       $('.addgardenform').empty();
                       $('.gardens').load('/seller/viewgardenlist');
                    }
                }
            });
        })
    });
 </script>