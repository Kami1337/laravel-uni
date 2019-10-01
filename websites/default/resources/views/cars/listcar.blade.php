<div class="row">
    <div class="col-auto mr-auto col-2 col-sm-12 col-md-3 col-xl-2">
        @include('layouts.sidebar')
    </div>
    @foreach($cars as $car)
    <div class="col-auto ml-auto col-10 col-sm-12 col-md-9 col-xl-10">
        <div class="card mb-4 box-shadow">
            <a href="/car/{{$car->id}}">
                <img class="card-img-top" src=<?php echo '/images/'. $car->coverImage($car->id)?> alt="image">
            </a>
            <div class="card-body">
                <h5 class="card-text text-center"> £{{$car->price}}</h5>         
                <hr>
                <h4 class="card-text text-center">@foreach($car->manufacturer as $c){{$c->name}}@endforeach {{$car->name}}</h4>      
                <div class="text-center">
                        <form method="POST" action="/car/{{$car->id}}/add" >
                            {{csrf_field()}}
                            <input type="hidden" value={{$car->id}} name="id">
                            <button type="submit" class="btn btn-primary text-center">Add to Cart</button>
                        </form>
        
                </div>  
            </div>
        </div>
    </div>



@endforeach