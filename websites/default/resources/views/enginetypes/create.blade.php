@extends ('layouts.master') @section ('content')
<div class="container products">
  <h1>Add Engine Type</h1>
  <form method="POST" action="/cms/enginetype/new" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
      <label for="title">Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@stop