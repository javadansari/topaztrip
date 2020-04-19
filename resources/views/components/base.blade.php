@section('style')
    <link rel="stylesheet" href="/css/zoom.css">
@show

<div class="container jj-text p-2">
    <div class="row">
        @foreach($trips as $trip)
            <div class="col-md-4 p-2">

                <div class="card" style="width: 18rem;">
                    <div class="img-hover-zoom">
                        <a href="/trip/show?id={{$trip->id}}">
                            <img src="{{ URL::to('/') }}/upload/images/{{$trip->picture}}" class="card-img-top">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$trip->name}}</h5>
                        <p class="card-text">{{$trip->description}}</p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>