@section('style')
    <link rel="stylesheet" href="/css/zoom.css">
@show


<div class="container">
    <div class="row">
        @foreach($trips as $trip)
            <div class="col-md-4">
                <!--Zoom effect-->
                <div class="img-hover-zoom">
                    <img src="https://cutt.ly/Zt9mi7o" class="img-thumbnail">
                </div>
                <div class="card-body jj-base-trip-card jj-text">
                    <h5 class="card-title"> {{$trip->name}}</h5>
                    <p class="card-text"> {{$trip->description}}</p>
                    <a href=" {{$trip->address}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        @endforeach

    </div>
</div>