@foreach($hours as $e)
<form method="POST" action="/cms/hours/edit/{{$e->id}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
            <label for="desc">Working hours on {{$e->day}}</label>
            <textarea name="hours" id="" cols="10" rows="1" class="form-control">{{$e->hours}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit working hours for {{$e->day}}</button>
  </form>
  <hr>
  @endforeach