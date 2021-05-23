<option disabled selected value="">Select Job Type </option>
@foreach($skills as $skill)
<option  value="{{$skill->name}}">{{$skill->name}}</option>
@endforeach
