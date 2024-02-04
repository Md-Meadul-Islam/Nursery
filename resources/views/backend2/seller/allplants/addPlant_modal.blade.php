<div class="modal fade py-5" id="add_plant_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="max-width: 1000px; height:auto">
      <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" style="font-size:30px;font-weight:800;color:rgb(129, 196, 8)">Add New Plants</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data" id="addPlantform">
              @csrf
              <div class="card">
                <div class="col-12"> <!--name title-->
                  <div class="row d-flex">
                    <div class="col-12">
                      <div class="row">
                        <div class="col-lg-6 col-md-12 pt-1" style="position: relative">
                          <label for="globalname" class="form-label"><strong>{{__('Common/Global Name')}}</strong><span
                              style="color:red; text-align:right">
                              *</span></label>
                          <div class="input-group pull-up">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-alipay"></i></span>
                            <input type="text" name="globalname" class="form-control" id="globalname" required autofocus>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12 pt-1" style="position: relative">
                          <label for="localname" class="form-label"><strong>{{__('Local Name')}}</strong></label>
                          <div class="input-group pull-up">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-alipay"></i></span>
                            <input type="text" name="localname" class="form-control" id="localname"
                              placeholder="{{__('plants local name if has.')}}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12"> <!--sub title-->
                  <label for="details" class="form-label"><strong>{{__('Details')}}</strong></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-body-text"></i></span>
                        <textarea name="details" id="details" class="form-control"placeholder="Species, Sub-species, Hybrid, Organic, Variety, Variation etc.. or any other Details" required></textarea>
                      </div>
                </div>
                <div class="col-12"> <!--category-->
                  <div class="row d-flex">
                    <div class="col-lg-4 col-md-6 pt-1" style="position: relative">
                      <label for="category" class="form-label"><strong>{{__('Category')}}</strong><span
                          style="color:red; text-align:right">
                          *</span></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-diagram-2-fill"></i></span>
                        <select name="category" id="category" class="form-select">
                          @foreach ($categories as $category)
                              <option value="{{$category}}">{{__($category)}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-1" style="position: relative">
                      <label for="sub_category" class="form-label"><strong>{{__('Sub-Category')}}</strong></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-diagram-3-fill"></i></span>
                        <select name="sub_category" id="sub_category" class="form-select">
                          @foreach ($subCategories as $subcategory)
                              <option value="{{$subcategory}}">{{__($subcategory)}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-1" style="position: relative">
                      <label for="garden_id" class="form-label"><strong>{{__('Select Garden')}}</strong><span
                          style="color:red; text-align:right">
                          *</span></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend">&#127794;</span>
                        <select name="garden_id" id="garden_id" class="form-select">
                          @foreach ($gardens as $garden)
                          <option value="{{$garden->id}}">{{$garden->garden_name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12"> <!--price-->
                  <div class="row d-flex">
                    <div class="col-lg-6 col-md-6 pt-1" style="position: relative">
                      <label for="price" class="form-label"><strong>{{__('Regular Price')}}<sub>/pcs</sub></strong><span
                          style="color:red; text-align:right">
                          *</span></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend">&#128178;</span>
                        <input type="number" name="price" id="price" class="form-control" required
                          placeholder="{{$gardens[0]->user->currency}}">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 pt-1" style="position: relative">
                      <label for="offer_price" class="form-label"><strong>{{__('Price Now')}}</strong></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-diagram-2-fill"></i></span>
                        <input type="number" name="offer_price" id="offer_price" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 pt-2" style="position: relative"><!--gallery-->
                  <p style="border-top: 2px solid rgb(63, 57, 57);"><span
                      style="position: absolute; top:12px;left:46%; background-color:white; font-weight:800;letter-spacing:2px">{{__('Gallery')}}</span>
                  </p>
                </div>
                <div class="col-12"> <!--photo-->
                  <div class="row d-flex">
                    <div class="col-lg-4 col-md-6 pt-1" style="position: relative">
                      <label for="photo_1" class="form-label"><strong>{{__('Photo-1')}}</strong><span
                          style="color:red; text-align:right">
                          *</span></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend">&#127804;</span>
                        <input type="file" name="photo_1" id="photo_1" accept="image/*" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-1" style="position: relative">
                      <label for="photo_2" class="form-label"><strong>{{__('Photo-2')}}</strong></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend">&#127804;</span>
                        <input type="file" name="photo_2" id="photo_2" accept="image/*" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pt-1" style="position: relative">
                      <label for="photo_3" class="form-label"><strong>{{__('Photo-3')}}</strong></label>
                      <div class="input-group pull-up">
                        <span class="input-group-text" id="inputGroupPrepend">&#127804;</span>
                        <input type="file" name="photo_3" id="photo_3" accept="image/*" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 pt-1" style="position: relative"> <!--video-->
                  <label for="video" class="form-label"><strong>{{__('Video')}}</strong></label>
                  <div class="input-group pull-up">
                    <span class="input-group-text" id="inputGroupPrepend">&#127910;</span>
                    <input type="file" name="video" id="video" accept="video/*" class="form-control" placeholder="maximum-size: 20mb, maximum-duration: 10s, types: mp4, ogg">
                  </div>
                </div>
              </div>
              <div class="col-12 pt-2">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-outline-warning add_plant"
                  style="background-color:rgb(129, 196, 8)">{{__('Save Plant')}}</button>
              </div>
            </form>
          </div>        
        </div>
      </div>
    </div>
  </div>