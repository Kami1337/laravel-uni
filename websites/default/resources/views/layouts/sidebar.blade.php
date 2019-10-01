<div class="block">
    <a href="/showroom">
        <h4><span class="badge badge-secondary">All brands</span></h4>
    </a>

    @foreach ($manufacturers as $manufacturer)

    <h4>
        <a href="/car/manufacturer/{{$manufacturer}}">
            <span class="badge badge-primary">{{$manufacturer}}</span>
        </a>
    </h4>

    @endforeach

</div>