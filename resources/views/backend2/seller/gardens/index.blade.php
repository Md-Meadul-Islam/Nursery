<div class="row">
  <div class="col-12">
    <div class="row d-flex">
      <div class="col-lg-6 col-md-6 col-sm-12 p-1">
        <label for="gardenname" class="form-label"><strong>Garden Name</strong></label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">🥀</span>
          <input type="text" name="gardenname" class="form-control" id="gardenname" required>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 p-1">
        <label for="gardensize" class="form-label"><strong>Garden Size</strong></label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">🧩</span>
          <input type="text" name="gardensize" class="form-control" id="gardensize" required>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <label for="localaddress" class="form-label"><strong>Local Address</strong></label>
    <div class="input-group">
      <span class="input-group-text" id="inputGroupPrepend">🏝</span>
      <textarea name="localaddress" id="localaddress" class="form-control" required></textarea>
    </div>
  </div>
  <div class="col-12">
    <div class="row d-flex">
      <div class="col-lg-4 col-md-6 col-sm-12 p-1">
        <label for="gardencity" class="form-label"><strong>City</strong></label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">&#128506;</span>
          <input type="text" name="gardencity" class="form-control" id="gardencity" required>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 p-1">
        <label for="gardentotalplants" class="form-label"><strong>Total Plants</strong></label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">🔢</span>
          <input type="number" name="gardentotalplants" class="form-control" id="gardentotalplants" required>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 p-1">
        <label for="gardencategory" class="form-label"><strong>Category</strong></label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">🌺</span>
          <select name="gardencategory" id="gardencategory" class="form-select">
            @foreach ($gardencategories as $category)
            <option value="{{$category}}">{{$category}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 d-flex justify-content-end w-100">
    <button type="submit" class="btn btn-success addgarden" style="width:100px">Save</button>
  </div>
</div>