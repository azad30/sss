<option selected="selected" value="">Select Zone</option>
@foreach($zones as $item)
    <option value="{{  $item->id }}">{{ $item->name  }}</option>
@endforeach
