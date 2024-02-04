<div class="container-fluid py-5" id="viewcart" name="viewcart">
    <div class="container py-5 px-0">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h2>In Cart<sup style="color: #81c408;">{{count($cartPlants)}}</sup></h2>
        </div>
        <div class="row g-2 justify-content-center align-items-center">
            @foreach ($cartPlants as $key=>$cartPlant)
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="row align-items-center h-50 w-100">
                        <div class="col-6">
                            <img src="{{Storage::url('plants_images/'.$cartPlant->photo_1)}}"
                                class="img-fluid rounded-circle p-2" alt="">
                        </div>
                        <div class="col-6">
                            <div>
                                <p class="plantname" data-id="{{$cartPlant->id}}"><span class="h5">{{$cartPlant->globalname}}</span> / {{$cartPlant->localname}}</p>
                                <div>
                                    <p>Category: <span style="font-weight: 700" class="plantcatetory">{{$cartPlant->category}}</span></p>
                                    <p>Season: <span style="font-weight: 700">{{$cartPlant->sub_category}}</span></p>
                                    <p class="getowner" data-id="{{$cartPlant->garden->id}}">Gardens: <span style="font-weight: 700" class="gardenname">{{$cartPlant->garden->garden_name}}</span></p>
                                </div>
                            </div>
                            <div class="pricedetails">
                                <p class="mb-3">Price: <span class="h5 offer_price" style="font-family: monospace">{{$cartPlant->offer_price}}</span><sub>BDT</sub></p>
                            <input type="number" class="form-control qtyadjust" name="qtyadjust" min="0" max="1000" value="1" placeholder="Quantity">  
                            <div class="d-flex justify-content-between">
                                <p class="btn btn-sm btn-primary my-2 text-white">Total: <span class="total">{{$cartPlant->offer_price}}</span></p>
                                <p class="btn btn-sm btn-warning my-2 remove" data-id="{{$key}}">Remove</p>
                            </div>                           
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 g-2">
               <div class="d-flex card justify-content-center align-items-center">
                <div class="card-body text-center g-2">
                    <p style="font-size: 30px">In Total: <span class="cartintotal" style="color: green;font-weight:800">00</span><sub>BDT</sub></p>
                    <div class="d-flex">
                        <p class=" btn btn-rounded btn-success confirmorder">Confirm Order</p>
                    </div>
                    <script>
                        let intotal = 0;
                        $('.total').each(function() {
                            intotal += parseInt($(this).text());
                        });
                        $('.cartintotal').text(intotal);
                    </script>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>