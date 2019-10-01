<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <h3>Cars</h3>
    </div>
    <hr>
    <div class="col-auto">
        <a href="/cms/car/new">
            <button type="button" class="btn btn-success">New car</button>
        </a>
    </div>
</div>
<hr> @foreach($cars as $car)
<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#CAR{{$car->id}}"><i class="fas fa-car"></i> {{$car->name}}</button>
    </div>
    <div class="col-auto">

        {{$car->created_at->diffForHumans()}}

    </div>
</div>
<hr>
<div class="modal fade" id="CAR{{$car->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$car->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-4 box-shadow">
                    <a href="/car/{{$car->id}}">
                        <img class="card-img-top" src=<?php echo '/images/'. $car->coverImage($car->id)?> alt="image">
                    </a>
                    <div class="card-body">
                        <h3 class="card-text text-center">
                            <span class="badge badge-pill badge-dark">£ {{$car->price}}</span>
                        </h3>
                        <hr>
                        <div class="text-center">
                            @foreach($car->manufacturer as $c)
                            <div class="row">
                                <p class="col-md-6">Manufacturer:</p> <p class="col-md-6">{{$c->name}}</p>
                            </div>
                            @endforeach
                            @foreach($car->enginetype as $c)
                            <div class="row">
                                    <p class="col-md-6">Engine type:</p> <p class="col-md-6">{{$c->name}}</p>
                            </div>
                            @endforeach
                            <div class="row">
                            <p class="col-md-6">Mileage:</p> <p class="col-md-6">{{$car->mileage}} KM</p>
                            </div>
                            <p class="small"> {{$car->description}} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form method="POST" action="/cms/car/archive/{{$car->id}}">
                <button type="submit button" class="btn btn-warning">Archive</button>
                {{csrf_field()}}
                </form>

                <form method="POST" action="/cms/car/delete/{{$car->id}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/cms/car/edit/{{$car->id}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    {{csrf_field()}}
                    
                    <button type="button submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach