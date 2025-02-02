@extends('dashboard.layouts.template')
@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Update Form <small>update existing record</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a class="dropdown-item" href="#">Settings 1</a></li>
                <li><a class="dropdown-item" href="#">Settings 2</a></li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" action="{{ route('destinations.update', $destination->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="name" name="name" required="required" class="form-control" value="{{ $destination->name }}">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Price <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="price" name="price" required="required" class="form-control" value="{{ $destination->price }}">
              </div>
            </div>
            <div class="item form-group">
              <label for="location" class="col-form-label col-md-3 col-sm-3 label-align">Location</label>
              <div class="col-md-6 col-sm-6 ">
                <input id="location" class="form-control" type="text" name="location" value="{{ $destination->location }}">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align " for="city_id">Select</label>
              <div class="col-md-6 col-sm-6 ">
                <select class="form-control" name="city_id">
                  @foreach ($cities as $city)
                  <option value="{{$city->id}}" {{ $destination->city_id == $city->id ? 'selected' : '' }}>{{$city->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="item form-group">
              <label for="description" class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
              <div class="col-md-6 col-sm-6 ">
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $destination->description }}</textarea>
              </div>
            </div>
            <div class="item form-group">
              <label for="image" class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
              <div class="col-md-6 col-sm-6 ">
                <input type="file" name="image" id="image">
                <br>
                <img id="preview-image" src="{{ asset('assets/img/' . $destination->image) }}" style="max-width:100%; height:auto; margin-top:10px;"/>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <button class="btn btn-primary" type="button">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
document.getElementById('image').addEventListener('change', function(e) {
  var preview = document.getElementById('preview-image');
  var file = e.target.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    preview.src = reader.result;
    preview.style.display = 'block';
  }
  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
    preview.style.display = 'none';
  }
});
</script>
@endsection
