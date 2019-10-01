<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <h3>Engine types</h3>
    </div>
    <hr>
    <div class="col-auto">
        <a href="/cms/enginetype/new">
            <button type="button" class="btn btn-success">New engine type</button>
        </a>
    </div>
</div>
<hr> @foreach($enginetypes as $category)
<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#ET{{$category->id}}"><i class="fas fa-cogs"></i> {{$category->name}}</button>
    </div>
    <div class="col-auto">
        <span class="badge badge-pill badge-success"><h6>{{$category->cars()->count()}}</h6></span>
    </div>
</div>
<hr>
<div class="modal fade" id="ET{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$category->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                            <h3 class="card-text text-center">
                                    <span class="badge badge-pill badge-dark">Cars with this engine type: {{$category->cars()->count()}}</span><br><hr>
                                        @foreach($category->cars as $car)             
                                        {{$car->name}}
                                        <a href="car/{{$car->id}}">
                                            <img class="card-img-top" src="<?php echo '/images/'.$car->coverImage($car->id)?>"alt="car"></a>                                
                                        <hr>
                                        @endforeach
                                </h3>
                        <div class="text-center">

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form method="POST" action="/cms/enginetype/delete/{{$category->id}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/cms/enginetype/edit/{{$category->name}}">
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