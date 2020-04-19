@section('style')
    <link rel="stylesheet" href="/css/zoom.css">
@show

<div class="p-2">

</div>
<div class="container jj-text">
    <div class="row">
        @foreach($trips as $trip)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="img-hover-zoom">
                        <img src="{{ URL::to('/') }}/upload/images/{{$trip->picture}}" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$trip->name}}</h5>
                        <p class="card-text">{{$trip->description}}</p>
                        <a href="/trip/show?id={{$trip->id}}" class="btn btn-primary">بیشتر</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>