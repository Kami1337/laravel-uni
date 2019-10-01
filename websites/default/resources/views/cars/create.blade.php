@extends ('layouts.master') 
@section ('content')
<div class="container products">
<h1>Create a new car</h1>
<hr>
<form method="POST" action="/cms/car/new" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="Name">Car:</label>
        <input type="text" class="form-control" name="name" required placeholder="Reliant Regal" value={{old('name')}}>
    </div>
    <label for="manufacturer">Manufacturer:</label>
    <select class="custom-select" name="manufacturer">
            <option selected>Select category:</option>
            @foreach ($manufacturers as $manufacturer)
            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
            @endforeach    
    </select>
    <hr>
    <label for="enginetype">Engine type:</label>
    <select class="custom-select" name="enginetype">
            <option selected>Select engine type:</option>
            @foreach ($enginetype as $type)
            <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach    
    </select>
    <hr>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" step="any" class="form-control" name="price" required placeholder="Numeric values only" value={{old('price')}}>
    </div>

    <div class="form-group">
        <label for="discount">Discounted price:</label>
        <input type="number" class="form-control" name="discount" placeholder="Optional" value={{old('discount')}}>
    </div>

    <div class="form-group">
        <label for="mileage">Mileage</label>
        <input type="number" class="form-control" name="mileage" required placeholder="35.000" value={{old('mileage')}}>
    </div>

    <div class="form-group">
        <label for="desc">Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{old('description')}}</textarea>
    </div>
    <h5>Car images:</h5>
    <div class="input-group control-group increment" >
            <input type="file" name="filename[]" class="form-control" required>
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
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
@stop