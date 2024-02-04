@extends('backend2_layouts.app')
@section('backend_title', 'All Plants | Nursery')
@section('breadcrumb', 'All Plants / View')
@section('backend2_content')
<style>
    .detialsContent{
        transition: all .25s ease-in;
    }
    .hide{
        display: none;
        transition: all .25s ease-out;
    }.pagination{
        justify-content: end;
    }
</style>
<div class="row">
    <div class="col-12 px-0">
        <div class="">            
            <div class="d-block">
                <h2 style="font-size:30px;font-weight:800;color:rgb(129, 196, 8)">All Plants</h2>
                <h6 class="card-subtitle text-muted pt-1">All of your plants, which you are added.</h6>
                <a href="#" class="btn btn-secondary btn-outline-success my-2"  style="color: white" data-bs-toggle="modal" data-bs-target="#add_plant_modal">Add New</a>
            </div>
            <div class="card-body plants_index px-0">
                <div class="row d-flex justify-content-center">                                      
                    @foreach ($plants as $index=> $plant)
                    <div class="col-lg-6 col-md-6 col-sm-12 py-2">
                        <div class="card pull-up bg-white">
                            <div class="card-body">
                                <div class="carousel slide position-relative pt-2" data-bs-interval="false" data-index="{{ $index }}">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img src="{{Storage::url('plants_images/'.$plant->photo_1)}}"class="img-fluid files"
                                                style="width:100%; height:300px; object-fit: cover;" alt="First slide">
                                        </div>
                                        @if ($plant->photo_2)
                                        <div class="carousel-item active">
                                            <img src="{{Storage::url('plants_images/'.$plant->photo_2)}}"class="img-fluid files"
                                                style="width:100%; height:300px; object-fit: cover;" alt="Second slide">
                                        </div>
                                        @endif
                                        @if ($plant->photo_3)
                                        <div class="carousel-item active">
                                            <img src="{{Storage::url('plants_images/'.$plant->photo_3)}}"class="img-fluid files"
                                                style="width:100%; height:300px; object-fit: cover;" alt="Third slide">
                                        </div>
                                        @endif
                                        @if ($plant->video)
                                        <div class="carousel-item">
                                            <video class="files" style="object-fit: cover; width:100%; height: 300px;" controls muted>
                                                <source src="{{Storage::url('plants_video/'.$plant->video)}}" alt="Video">
                                            </video>
                                        </div>
                                        @endif
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="row justify-content-center m-0 p-0">
                                    <div class="col-12 text-start pt-2 px-0">
                                        <p class="mb-0"><span title="Name" style="font-size: 20px; font-weight:800">{{$plant->globalname}}</span> / <span title="Local Name">{{$plant->localname}}</span></p>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between px-0">
                                        <p class="mb-0">Category: <strong>{{$plant->category}}</strong></p>
                                        <p class="mb-0 btn btn-sm btn-success">Price: <del style="color: red">{{$plant->price}}  </del><span>{{$plant->offer_price}}</span></p>                    
                                    </div>
                                    <div class="col-12 text-start px-0">
                                        <p class="mb-0">Season: <strong>{{$plant->sub_category}}</strong></p>
                                        <p class="mb-0" title="Details">{{$plant->details}}</p>
                                        <p>Garden Name: <strong> {{$plant->garden->garden_name}}</strong></p>
                                    </div>
                                </div>
                                <div class="row justify-content-around mx-5">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-success mx-2 w-100 update_plant_form"
                                        title="Edit" data-bs-toggle="modal"
                                        data-bs-target="#update_plant_modal"
                                        data-plant = "{{json_encode($plant)}}"style="font-size: 20px">&#9997;</a>                                       
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-warning mx-2 w-100 delete_plant" data-id="{{$plant->id}}" title="Delete" style="font-size: 20px; font-weight:900; color:white">🗑</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ $plants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('../backend2/seller/allplants/addPlant_modal')
@include('../backend2/seller/allplants/updatePlant_modal')
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var carousels = document.querySelectorAll('.carousel');
        carousels.forEach(function (carousel) {
            var index = carousel.dataset.index;
            // Add event listeners to controls
            carousel.children[1].addEventListener('click', function () {
                navigateCarousel(carousel, 'prev');
            });
            carousel.children[2].addEventListener('click', function () {
                navigateCarousel(carousel, 'next');
            });
        });
    });
    // Function to navigate a specific carousel
    function navigateCarousel(carousel, direction) {
        var carouselItems = carousel.querySelectorAll('.carousel-inner .carousel-item');
        var activeIndex = getActiveIndex(carouselItems);
        if (direction === 'prev') {
            activeIndex = (activeIndex - 1 + carouselItems.length) % carouselItems.length;
        } else {
            activeIndex = (activeIndex + 1) % carouselItems.length;
        }
        carouselItems.forEach(function (item, i) {
            item.classList.toggle('active', i === activeIndex);
        });
    }
    // Function to get the index of the active carousel item
    function getActiveIndex(items) {
        for (var i = 0; i < items.length; i++) {
            if (items[i].classList.contains('active')) {
                return i;
            }
        }
        return 0;
    }
</script>