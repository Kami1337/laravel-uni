<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <h3>Careers</h3>
    </div>
    <hr>
    <div class="col-auto">
        <a href="/cms/career/new">
            <button type="button" class="btn btn-success">New career</button>
        </a>
    </div>
</div>
<hr> @foreach($careers as $post)
<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#POST{{$post->id}}"><i class="fas fa-newspaper"></i> {{$post->title}}</button>
    </div>
    <div class="col-auto">

        {{$post->created_at->diffForHumans()}}

    </div>
</div>
<hr>
<div class="modal fade" id="POST{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$post->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="postd mb-4 box-shadow">
                    <div class="postd-body">
                        <hr>
                        <div class="text-center">
                            <p> {{$post->body}} </p>
                        </div>
                        <hr>
                        <div class="text-center">
                        <h5>Posted by <a href="mailto:{{$post->user->email}}">{{$post->user->name}}</a>
                            <br> {{$post->created_at->diffForHumans()}}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form method="POST" action="/cms/career/delete/{{$post->id}}">
                     {{csrf_field()}}    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/cms/career/edit/{{$post->id}}">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>   
                    <button type="button submit" class="btn btn-danger">Delete</button>
                </form>
              
            </div>
        </div>
    </div>
</div>
@endforeach