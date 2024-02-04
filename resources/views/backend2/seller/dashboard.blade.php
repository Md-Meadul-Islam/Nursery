@extends('backend2_layouts.app')
@section('backend_title', 'Seller Dashboard | Nursery')
@section('breadcrumb', 'Dashboard')
@section('backend2_content')
<!-- Left side columns -->
<div class="row">
  <div class="col-12">
    <div class="row">
      <!-- Sales Card -->
      <div class="col-md-6 col-sm-12">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">New Order <span>| Today</span></h5>
            <div class="d-flex align-items-center pull-up">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
              </div>
              <div class="ps-3">
                <h6>145</h6>
                <span class="text-success small pt-1 fw-bold">12%</span> <span
                  class="text-muted small pt-2 ps-1">increase</span>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Sales Card -->
      <!-- Revenue Card -->
      <div class="col-md-6 col-sm-12">
        <div class="card info-card revenue-card">
          <div class="card-body">
            <h5 class="card-title">Total Order <span>| This Month</span></h5>
            <div class="d-flex align-items-center pull-up">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
              </div>
              <div class="ps-3">
                <h6>1234</h6>
                <span class="text-success small pt-1 fw-bold">8%</span> <span
                  class="text-muted small pt-2 ps-1">increase</span>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Revenue Card -->
    </div>
    {{-- top search --}}
    <div class="row">
      <div class="col-12">
        <div class="card overflow-auto">
          <div class="card-body">    
            <h5 style="padding-top: 20px;margin-bottom:0;
            font-size: 18px;
            font-weight: 500;
            color: #012970;
            font-family: Poppins, sans-serif;">Top Searched</h5>
            <p>Customer's searches but not found in our collections.</p>
            <div class="row topSearched">
              <ul class="nav-item">
               @if($searchString)
               @foreach ($searchString as $item)
                   <li class="nav-link"><a href="javascript:void(0)" class="btn btn-sm btn-warning text-white">{{$item['searchString']}}</a></li>
               @endforeach
               @endif
              </ul>  
            </div>        
          </div>
        </div>
      </div>
    </div>
    <!--Your Garden-->
    <div class="row">
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Your Gardens/Nursery</h5>
            <div class="row gardens">
              <ul class="nav-item d-flex">
                @foreach ($gardensname as $gname)
                <li class="nav-link p-2">
                  <a href="javascript:void(0)" class="btn btn-success text-white">{{$gname->garden_name}}</a>
                 </li>
                @endforeach                
                <li class="nav-link p-2">
                  <a href="javascript:void(0)" class="btn btn-secondary addgardenbtn">➕</a>
                </li>
              </ul>
            </div>
            <div class="addgardenform"></div>
          </div>
        </div>
      </div>
    </div>
    {{-- all orders --}}
    <div class="row">
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Pending Orders<span></span></h5>
            <table class="table table-bordered table-striped datatable w-100">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">C. Name</th>
                  <th scope="col">C. Phone</th>
                  <th scope="col">Plant Name</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total Price</th>                  
                  <th scope="col">Status</th>
                  <th scope="col">Garden Name</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($getPlant as $orderedPlants)
                    @foreach ($orderedPlants as $key =>  $orderedPlant)
                        <tr>
                          <th><a href="javascript:void(0)"data-id="{{$orderedPlant['plant_id']}}">{{$key+1}}</a></th>
                          <td>{{$orderedPlant['user']['name']}}</td>
                          <td>{{$orderedPlant['user']['phone']}}</td>
                          <td>{{$orderedPlant['allplants']['globalname'] .'|'. $orderedPlant['allplants']['localname']}}</td>
                          <td>{{$orderedPlant['pieces']}}</td>
                          <td>{{$orderedPlant['total_price']}}</td>                      <td ><a href="javascript:void(0)" class="btn btn-sm btn-warning">{{$orderedPlant['status']}}</a></td>
                          <td>{{$orderedPlant['gardens']['garden_name']}}</td>
                        </tr>
                    @endforeach
                @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- End Recent Sales -->
      <!-- Top Selling -->
      <div class="col-12">
        <div class="card top-selling overflow-auto">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Top Selling <span>| Today</span></h5>

            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col">Preview</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Sold</th>
                  <th scope="col">Revenue</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><a href="#"><img src="{{asset('backend2')}}/img/product-1.jpg" alt=""></a></th>
                  <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                  <td>$64</td>
                  <td class="fw-bold">124</td>
                  <td>$5,828</td>
                </tr>
                <tr>
                  <th scope="row"><a href="#"><img src="{{asset('backend2')}}/img/product-2.jpg" alt=""></a></th>
                  <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                  <td>$46</td>
                  <td class="fw-bold">98</td>
                  <td>$4,508</td>
                </tr>
                <tr>
                  <th scope="row"><a href="#"><img src="{{asset('backend2')}}/img/product-3.jpg" alt=""></a></th>
                  <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                  <td>$59</td>
                  <td class="fw-bold">74</td>
                  <td>$4,366</td>
                </tr>
                <tr>
                  <th scope="row"><a href="#"><img src="{{asset('backend2')}}/img/product-4.jpg" alt=""></a></th>
                  <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                  <td>$32</td>
                  <td class="fw-bold">63</td>
                  <td>$2,016</td>
                </tr>
                <tr>
                  <th scope="row"><a href="#"><img src="{{asset('backend2')}}/img/product-5.jpg" alt=""></a></th>
                  <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                  <td>$79</td>
                  <td class="fw-bold">41</td>
                  <td>$3,239</td>
                </tr>
              </tbody>
            </table>

          </div>

        </div>
      </div><!-- End Top Selling -->
    </div>
  </div>
</div>

@endsection