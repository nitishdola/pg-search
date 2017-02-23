@foreach($amenities as $k => $v)
<label for="primary{{$v->id}}" class="btn btn-primary">{{$v->name}} <input type="checkbox" id="primary{{$v->id}}"  value="{{$v->id}}" class="badgebox" name="amenities[]"><span class="badge">&check;</span></label>
@endforeach