<div class="form-group">
    <label class="pr-1 text-uppercase label-title">{{ __($title) }}</label>
    @if ($required == true)
        <span class="text-danger">*</span>
    @endif    
    <input 
        wire:model="{{$id}}" 
        type="text"
        placeholder="{{$placeholder}}"
        class="form-control @error($id) is-invalid @enderror" />
    @error($id)
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>