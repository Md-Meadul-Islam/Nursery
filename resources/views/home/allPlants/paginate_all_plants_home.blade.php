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