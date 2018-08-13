@if (!empty($prefectures))
    @foreach($prefectures as $prefecture)
        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
    @endforeach
@endif
