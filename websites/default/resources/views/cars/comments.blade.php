<div class="comments">
       
        <div class="card">
                <div class="card-block">
                    <form method="POST" action="/car/{{$car->id}}/comment" >
                        {{csrf_field()}}
                      
                            <textarea name="body" placeholder="leave a comment" class="form-control">{{old('body')}}</textarea>
                        
                  
                                <button type="submit" class="btn btn-primary">Add comment</button>
                            
                    </form>
                </div>
        </div>
        <hr>
        <ul class="list-group">
             @foreach ($car->comments as $comment)
                 <li class="list-group-item">
                     <div class="text-left">
                     {{$comment->body}}
                    </div>
                    <div class="text-right">
                     <p class="small">
                            Posted by: {{$comment->user->name}}
                         {{$comment->created_at->diffForHumans()}}
                     </p>
                    </div>
                 </li>
             @endforeach
         </ul>
         </div>