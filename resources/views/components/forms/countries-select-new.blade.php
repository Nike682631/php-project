<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'shinny-label']) }}
    <span class="text-danger">*</span>

    <select id="{{$name}}" name="{{$name}}" class="form-control countries" style="height: 10rem;">
        @foreach($countries as $country)
        <option value = "{{$country->cca2}}">{{$country->name->common}}</option>
        @endforeach
    </select>

    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>