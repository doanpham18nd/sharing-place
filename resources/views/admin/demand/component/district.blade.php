@if (!empty($districts))
    @foreach($districts as $district)
        <option value="{{ $district->id }}">{{ $district->title }}</option>
    @endforeach
@endif
