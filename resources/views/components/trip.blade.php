@php
    use Illuminate\Support\Facades\DB;
    $parents = DB::table('properties')->get()->whereNull('parent');
    $tags = DB::table('tags')->get()->where('tripID',$trip->id);


@endphp


<div class="card mb-3 jj-text">
    <img src="{{ URL::to('/') }}/upload/images/{{$trip->picture}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$trip->name}}</h5>
        <p class="card-text">{{$trip->description}}</p>

        @foreach($parents as $parent)
            <div class="container jj-text text-center ">
                <div class="row">
                    <div class="col-md-4 border p-2">
                        {{$parent->name}}
                    </div>
                    <div class="col-md-4 border p-2">
                        @php ($children = DB::table('properties')->get()->where('parent',$parent->id))
                        @php($empty = true)
                        @foreach($children as $child)
                            @foreach($tags as $tag)
                                @if($tag->PropertiesID == $child->id)
                                    {{$child->name}}
                                    @php($empty = false)
                                @endif
                            @endforeach
                        @endforeach
                        @if($empty)
                            -
                        @endif
                    </div>

                </div>
            </div>
        @endforeach


    </div>
</div>


