@php
    use Illuminate\Support\Facades\DB;
    $hows = DB::table('properties')->get()->where('parent',6);
    $prices = DB::table('properties')->get()->where('parent',11);

@endphp
<div class="jj-bg-search jj-text pt-5 pb-5">
    <form action="\trip\search" method="post" enctype="multipart/form-data">
        @csrf


        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-3  d-flex justify-content-center mt-2">
                    <input class="form-control border-1 border-white jj-bg-search jj-text-white" type="text"
                           placeholder="شهری که میخوای بری ؟" aria-label="Search" name="search">
                </div>
                <div class="col-12 col-md-3  d-flex justify-content-center mt-2">
                    <select class="form-control jj-bg-search jj-text-white" id="selectCar" name="hows">
                        <option value="0">وسیله مورد نظرت ؟</option>
                        @foreach($hows as $how)
                            <option value="{{$how->id}}">{{$how->name}}</option>
                        @endforeach
                    </select></div>
                <div class="col-12 col-md-3  d-flex justify-content-center mt-2">
                    <select class="form-control jj-bg-search jj-text-white" id="select" name="prices">
                        <option value="0">دوست داری قیمت چطوری باشه ؟</option>
                        @foreach($prices as $price)
                            <option value="{{$price->id}}">{{$price->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-3  d-flex justify-content-center mt-2">
                    <button type="submit" class="btn btn-light  w-100">بگرد</button>
                </div>
            </div>
        </div>

    </form>
</div>