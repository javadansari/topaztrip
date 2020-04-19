@php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Redirect;
    $parents = DB::table('properties')->get()->whereNull('parent');


@endphp
@if($errors->any())
<div class="alert alert-danger jj-text">
    <ul>

        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="jj-text rounded p-2" action="\trip\create" method="post" enctype="multipart/form-data">

    @csrf

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>نام</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group col-md-6">

            <label>عکس شاخص</label>

                <input id="file" type="file" class="form-control form-control-file" name="file">
        </div>
    </div>
    <div class="form-group">
        <label>توضیحات</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>


    <div class="form-row">
        @foreach($parents as $parent)
            <div class="col-md-3 border border-primary p-2 m-1">
                <div class="form-check">
                    <label class="border-3 col-md-4">{{$parent->name}}</label>
                    @php ($children = DB::table('properties')->get()->where('parent',$parent->id))
                    @foreach($children as $child)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tagItems-{{$child->id}}" value="{{$child->id}}"
                                   id="defaultCheck">
                            <label class="form-check-label" for="defaultCheck2">
                                {{$child->name}}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach

    </div>
    <button type="submit" class="btn btn-success w-100">ثبت</button>


</form>