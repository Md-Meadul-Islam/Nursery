<div class="container-fluid py-5" id="topTen" name="topTen">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h2>Top<sup style="color: #81c408;">10</sup> Plants</h2>
            <p>This result is produced by searching and viewing of plants.</p>
        </div>
        <div class="row g-4 justify-content-center align-items-center">
            @if ($topPlants)
            @foreach ($topPlants as $top)
            <div class="col-lg-6 col-xl-4">
                <div class="p-4 rounded bg-light">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <img src="{{Storage::url('plants_images/'.$top->photo_1)}}"
                                class="img-fluid rounded-circle w-100" alt="">
                        </div>
                        <div class="col-6">
                            <a href="#" class="h5">{{$top->globalname}}</a>
                            <div class="d-flex my-3 ratingdiv">
                                <i class="fas fa-star text-warning rating1"></i>
                                <i class="fas fa-star text-warning rating2"></i>
                                <i class="fas fa-star text-warning rating3"></i>
                                <i class="fas fa-star text-warning rating4"></i>
                                <i class="fas fa-star text-warning rating5"></i>
                            </div>
                            <h4 class="mb-3">{{$top->offer_price}}</h4>
                            <a href="javascript:void(0);" data-id="{{$top->id}}" class="btn border border-secondary rounded-pill px-3 text-primary addtocart"><span class="pe-1 text-primary">🛒</span> Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <p>Nothing to Showing at this moment!</p>
            @endif
        </div>
    </div>
</div>