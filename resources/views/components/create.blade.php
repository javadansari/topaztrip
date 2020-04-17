
@php
use Illuminate\Support\Facades\DB;
$parents = DB::table('properties')->get()->whereNull('parent');

@endphp


<form class="jj-text rounded p-2" action="create.blade.php">


    <div class="form-group">
        <label>نام</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label>توضیحات</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>

    <div class="form-row">
    @foreach($parents as $parent)
    <div class="form-group col-md-6">
        <label for="exampleFormControlSelect1">{{$parent->name}}</label>
        <select class="form-control" name="{{$parent->name}}"  id="exampleFormControlSelect1">
           @php ($children = DB::table('properties')->get()->where('parent',$parent->id))
            @foreach($children as $child)
                <option>{{$child->name}}</option>
            @endforeach
        </select>
    </div>
    @endforeach
    </div>
    <button type="submit" class="btn btn-success">ثبت</button>
</form>