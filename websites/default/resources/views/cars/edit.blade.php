@extends ('layouts.master') 
@section ('content')
<div class="container products">
    <div class="row">
        <div class="col-auto mr-auto">
<h1>Edit car</h1>
        </div>
        <div class="col-auto">
<form method="POST" action="/cms/car/delete/{{$car->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <button type="submit" class="btn btn-danger">Delete</button>
</div>
</form>
</div>
<hr>
<form method="POST" action="/cms/car/edit/{{$car->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    

    <div class="form-group">
        <label for="title">Car</label>
        <input type="text" class="form-control" name="name" value="{{$car->name}}" required>
    </div>
    <label for="title">Manufacturer</label>
    <select class="custom-select" name="manufacturer">
            @foreach ($manufacturers as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach      
    </select>
    <hr>
    <label for="enginetype">Engine type:</label>
    <select class="custom-select" name="enginetype">
            @foreach ($enginetype as $type)
            <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach    
    </select>
    <hr>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="any" class="form-control" name="price" value="{{$car->price}}" required>
    </div>

    <div class="form-group">
        <label for="discount">Discounted price:</label>
        <input type="number" class="form-control" name="discount" value="{{$car->discount}}" placeholder="Optional">
    </div>

    <div class="form-group">
        <label for="Name">Mileage</label>
        <input type="number" class="form-control" name="mileage" required placeholder="35.000" value={{$car->mileage}}>
    </div>

    <div class="form-group">
        <label for="desc">Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{$car->description}}</textarea>
    </div>

    <div class="input-group control-group increment" >
            <input type="file" name="filename[]" class="form-control"  value="{{$car->filename}}">
            <div class="input-group-btn"> 
              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
          </div>
          <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
              <input type="file" name="filename[]" class="form-control">
              <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              </div>
            </div>
          </div>
          <hr>
          <h5>Existing car images </h5>
          
          <hr>
          
          <div class="zoom-gallery row">
              
                @foreach($car->images($car->id) as $image)
                
                <div class="col-md-2 col-sm-3">
                  <a href="<?php echo '/images/'. $image?>">
                    <img class="img-fluid" src=<?php echo '/images/'. $image?> alt="image"></a>
                  </div>
                @endforeach
                </div>
                <p class="small">Adding new images overwrites old ones</p>
                <hr>
    <button type="submit" class="btn btn-primary">Edit</button>

</form>
</div>
@stop