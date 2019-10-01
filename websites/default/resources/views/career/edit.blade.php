@extends ('layouts.master') 
@section ('content')
<div class="container products">
<h1>Create a new career post</h1>
<hr>
<form method="POST" action="/cms/career/edit/{{$career->id}}" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="Name">Title:</label>
        <input type="text" class="form-control" name="title" required placeholder="Mechanic wanted" value={{$career->title}}>
    </div>
    
    <div class="form-group">
        <label for="desc">Content:</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control" required>{{$career->body}}</textarea>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop