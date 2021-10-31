<form wire:submit.prevent="createUser">
    @csrf
    <p class="register-right-heading mb-0">{{ __('Login information') }}</p>
    <div class="form-group">
        <div>
            <input 
                wire:model="email" 
                type="email"
                placeholder="Your email address"
                class="form-control @error('email') is-invalid @enderror"/>
            @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div>
            <input 
                wire:model="password" 
                type="password"
                placeholder="Your password"
                class="form-control @error('password') is-invalid @enderror"/>
            @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group mb-5">
        <div>
            <input 
                wire:model="password_confirmation" 
                type="password"
                placeholder="Repeat password"
                class="form-control @error('password_confirmation') is-invalid @enderror"/>
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <p class="register-right-heading__sub">{{ __('Company Type') }}</p>
    <div class="form-group">

            @foreach($user_types as $type)

                <div class="pb-2">
                    <input class="mr-2" type="radio" wire:model="user_type" id="{{$type}}" value="{{$type}}">
                    <label class="label-user-type" for="{{$type}}">
                        {{ $type }}
                    </label>
                </div>


            @endforeach

    </div>

    <button class="btn btn-primary customized" type="submit">
        Next Step <span class="pl-3">@include('components.icons.arrow')</span>
    </button>
</form>
