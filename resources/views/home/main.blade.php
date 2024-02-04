@extends('home_layouts.app')
@section('home_title', 'Nursery | Welcome')
@section('main_content')
        <!-- top_plants Start -->
        <section class="forCart">
            @include('home.topPlants.index')
        </section>
        <!-- top_plants End -->
        <!--all_plants Start-->
        <div class="container-fluid fruite py-5" id="all_plants" name="all_plants">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-md-4 col-sm-4 text-start">
                            <h2>All Plants</h2>
                            <h6 class="card-subtitle text-muted pt-1">Choose to your best.</h6>
                        </div>
                        <div class="col-md-8 col-sm-8"> <!-- filters -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-around align-items-center">
                                    <h4 style="letter-spacing:2px">🔍Filters</h4>
                                    <select name="perpage" id="perpage"class="form-select perpage" style="width: 100px; height:40px">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <div class="row py-1">
                                        <div class="col-lg-4 col-md-6 col-sm-12 card mb-2 pb-4">                         
                                            <div class="d-flex">
                                                <span class="text-start">Price Range</span>
                                                <p class="d-flex btn btn-sm btn-warning mx-3"><span class="rangefrom">0</span> - <span class="rangeto">2000</span>
                                                </p>
                                              </div>   
                                            <div class="sliderContainer"><div class="slider-track"></div>
                                            <input type="range" min="1" max="2000" value="300" id="slider-1">
                                            <input type="range" min="1" max="2000" value="700" id="slider-2"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-4 card">
                                            <span class="text-start">Price</span>
                                            <select name="price" id="price" class="form-select price">
                                                <option value="none" selected>not apply</option>
                                                <option value="asc">Lowest Price</option>
                                                <option value="desc">Highest Price</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-4 card">
                                            <span class="text-start">Category</span>
                                            <select name="category" id="category" class="form-select category">
                                                <option value="none" selected>not apply</option>
                                                @foreach ($categories as $item)
                                                <option value="{{$item}}">{{$item}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-4 card">
                                            <span class="text-start">Season</span>
                                            <select name="season" id="season" class="form-select season">
                                                <option value="none" selected>not apply</option>
                                                @foreach ($subCategories as $season)
                                                    <option value="{{$season}}">{{$season}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-0 pb-0">
                                        <div class="col-12">
                                            <button type="submit" class="filter btn btn-primary btn-outline-success w-50" id="filter">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div>        
                                <div class="card-body plants_index_main">
                                    <div class="row d-flex justify-content-center">                    
                                        @foreach ($plants as $index=> $plant)
                                        <div class="col-lg-4 col-md-6 col-sm-12 py-2 spreadDiv">
                                            <div class="card pull-up bg-white">
                                                <div class="card-body">
                                                    <div class="carousel slide position-relative" data-bs-interval="false" data-index="{{ $index }}">
                                                        <div class="carousel-inner" role="listbox">
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('storage/plants_images/' . $plant->photo_1) }}"class="img-fluid files"
                                                                    style="width:100%; height:300px; object-fit: cover;" alt="First slide">
                                                            </div>
                                                            @if ($plant->photo_2)
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('storage/plants_images/' . $plant->photo_2) }}"class="img-fluid files"
                                                                    style="width:100%; height:300px; object-fit: cover;" alt="Second slide">
                                                            </div>
                                                            @endif
                                                            @if ($plant->photo_3)
                                                            <div class="carousel-item active">
                                                                <img src="{{ asset('storage/plants_images/' . $plant->photo_3) }}"class="img-fluid files"
                                                                    style="width:100%; height:300px; object-fit: cover;" alt="Third slide">
                                                            </div>
                                                            @endif
                                                            @if ($plant->video)
                                                            <div class="carousel-item">
                                                                <video class="files" style="object-fit: cover; width:100%; height:300px;" controls muted>
                                                                    <source src="{{ asset('storage/plants_video/' . $plant->video) }}" alt="Video">
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
                                                   <div class="d-block">
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
                                                            <p class="mb-0" style="height: 50px;overflow:hidden" title="Details">{{$plant->details}}</p>
                                                            <p class="getowner" style="cursor: pointer" data-id="{{$plant->garden->id}}">Gardens: <strong> {{$plant->garden->garden_name}}</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 ratingsdiv">
                                                          <div class="d-flex viewratings" style="cursor: pointer">
                                                            @php
                                                                $ratingvalue= 0;
                                                                $avg=1;
                                                                foreach ($plant->ratings as $key=>$rating) {
                                                                    $ratingvalue +=$rating->ratings;
                                                                    $avg = ceil($ratingvalue/($key+1));
                                                                }
                                                            @endphp
                                                            @for ($i = 0; $i<(int)$avg; $i++)
                                                            <i class="fas fa-star text-warning"></i>
                                                            @endfor
                                                          </div>
                                                          <div class="d-block changeratings text-start">
                                                          </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-success mx-2 addtocart"data-id="{{$plant->id}}" title="Add to Cart">🛒<span>Add to Cart</span></a>
                                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
        <!--all_plants End-->
        <!--new_plants Start-->
        <div class="container-fluid vesitable py-5" id="new_plants" name="new_plants">
            @include('home.newPlants.index')
        </div>
        <!--new_plants End -->
        <div class="container-fluid py-5" id="gardenowner" name="gardenowner"></div>
        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <h2>Why Choose Us?</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Free Shipping</h5>
                                <p class="mb-0">Free on order over $300</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Security Payment</h5>
                                <p class="mb-0">100% security payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>30 Day Return</h5>
                                <p class="mb-0">30 day money guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->    
@endsection
