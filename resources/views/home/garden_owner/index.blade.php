<div class="container py-5">
    <h2>Garden's Info</h2>
    <div class="row">
        <div class="col-12 w-100 justify-content-around">
            <div class="card p-1">
                <h2 class="text-center text-primary">{{$gardens->garden_name}}</h2>
                <div class="row d-flex justify-content-center p-1">
                    <div class="col-md-6 col-sm-12 justify-content-center p-2">
                        <div class="card">
                            <h5 class="card-header text-center text-warning">Garden/Nursery Address</h5>
                            <div class="card-body">
                                <p>Local Address: <strong>{{$gardens->local_address}}</strong></p>
                                <p>City: <strong>{{$gardens->city}}</strong></p>
                                <p>Total Plants: <strong>{{$gardens->total_plants}}</strong></p>
                                <p>Garden Size: <strong>{{$gardens->garden_size}}</strong></p>
                                <p>Category: <strong>{{$gardens->garden_category}}</strong></p>
                                @php
                                    $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $gardens->created_at);
                                    $monthYear = $date->format('F Y');
                                @endphp
                                <p>Since from: <strong>{{$monthYear}}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 p-2">
                        <div class="card">
                            <h5 class="card-header text-center text-warning">Garden Owner Details</h5>
                            <div class="card-body">
                                <p>Name: <strong>{{$gardens->user->name}}</strong></p>
                                <p>Nike Name: <strong>{{$gardens->user->username}}</strong></p>
                                <p>Email: <strong>{{$gardens->user->email}}</strong></p>
                                <p>Phone: <strong>{{$gardens->user->phone}}</strong></p>
                                <p>City: <strong>{{$gardens->user->states}}</strong></p>
                                <p>Country: <strong>{{$gardens->user->country}}</strong></p>
                                <p>Status: <strong>{{$gardens->user->status}}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>