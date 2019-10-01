@extends('layouts.master') @section('content')

        <img class="img-fluid" src=<?php echo '/images/'. $car->coverImage($car->id)?> alt="image">
<hr>
<div class="container cars"> 
    <div class="row">
        <div class="col-auto mr-auto">
            <h1>{{$car->name}}</h1>
        </div>
        <div class="col-auto">
            <form method="POST" action="/car/{{$car->id}}/add">
                {{csrf_field()}}
                <input type="hidden" value={{$car->id}} name="id">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-auto mr-auto">
       
                @foreach($car->manufacturer as $c)
                <h6>Manufacturer: {{$c->name}}</h6>
                @endforeach @foreach($car->enginetype as $c)
                <h6>Engine type: {{$c->name}}</h6>
                @endforeach
                <h6>Mileage: {{$car->mileage}} </h6>
             
            <hr>
        </div>
        <div class="col-auto">
            @if($car->discount==0)
            <span class="badge badge-pill badge-success">
                <h3>£{{$car->price}}</h3>
            </span>
            @else
            <span class="badge badge-pill badge-danger">
                <p class="small">Was</p>
                <h4 class="discount">£{{$car->price}}</h4>
            </span>

            <span class="badge badge-pill badge-success">
                <p class="small">Now only</p>
                <h3>£{{$car->discount}}</h3>
            </span>
            @endif
        </div>
    </div>
    <h4>Product images</h4>
    <hr>
    <div class="zoom-gallery row">
        @foreach($car->images($car->id) as $image)
        <div class="col-md-2 col-sm-3">
            <a href="<?php echo '/images/'. $image?>">
                <img class="img-fluid gallery" src=<?php echo '/images/'. $image?> alt="image"></a>
        </div>
        @endforeach
    </div>
    <hr>
    <p>{{$car->description}}</p>
 


    <hr> 
    @if(count($car->manufacturer)) 
    <h4>Related cars</h4>
    @foreach($car->manufacturer as $manufacturer)
    <a href="/car/manufacturer/{{$manufacturer->name}}">
        {{$manufacturer->name}}
    </a>
    @endforeach 
    @endif
    <hr>
    <h5>User feedback</h5>
    @include('cars.comments')
</div>
@stop