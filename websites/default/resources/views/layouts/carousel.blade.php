<div id="myCarousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            
          <div class="carousel-item active">
              
            <img class="first-slide banner" src="/images/banners/<?php echo rand(1,6);?>.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Welcome to Claire's Cars</h1>
                <p> Northampton's specialist in classic and import cars</p>
                <p><a class="btn btn-lg btn-primary" href="/showroom" role="button">Check our amazing cars</a></p>
              </div>
            </div>
            
          </div>
          @foreach($cars as $car)
           <div class="carousel-item">       
            <img class="{{$car->id}}-slide banner" src="<?php echo '/images/'. $car->coverImage($car->id)?>" alt="{{$car->id}} slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>{{$car->name}}</h1>
                <p>£{{$car->description}}</p>
                <p><a class="btn btn-lg btn-primary" href="/car/{{$car->id}}" role="button">Learn more</a></p>
              </div>
            </div>   
          </div>
          @endforeach
        </div> 
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>