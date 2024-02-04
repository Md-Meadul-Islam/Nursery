<div class="container py-5">
    <h2 class="mb-0">New Plants</h2>
    <div class="owl-carousel vegetable-carousel justify-content-center">
     @foreach ($newPlants as $newPlant)
     <div class="border border-primary rounded position-relative vesitable-item">
        <div class="vesitable-img">
            <img src="{{Storage::url('plants_images/'.$newPlant->photo_1)}}"
                class="img-fluid w-100 rounded-top" alt=""style="height:240px">
        </div>
        <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
            style="top: 10px; right: 10px;">{{$newPlant->category}}</div>
        <div class="p-4 rounded-bottom">
            <h4>{{$newPlant->globalname}}</h4>
            <p style="height: 50px;overflow:hidden">{{$newPlant->details}}</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
                <p class="text-dark fs-5 fw-bold mb-0">{{$newPlant->offer_price}}</p>
                <a href="javascript:void(0)" data-id="{{$newPlant->id}}" class="btn border border-secondary rounded-pill px-3 text-primary addtocart"><span class="pe-1 text-primary">🛒</span> Add to cart</a>
            </div>
        </div>
    </div>
     @endforeach
    </div>
</div>