<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'shinny-label']) }}

    @if(count($attributes) > 0)
        @if($attributes[0] == 'required')
            <span class="text-danger">*</span>
        @endif
    @endif


    {{ Form::text($name, $value, array_merge(['class' => 'form-control'],
    $attributes,['class' => ($errors->has($name)) ? 'form-control is-invalid' : 'form-control'] )) }}

    @error($name)
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>