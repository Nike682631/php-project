@extends('layouts.livewire')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
    
            @include('auth.register.components.left-side')
            
            <div class="right-side-container col-md-7 col-sm-12">
                @if (isset($social_user))
                    @livewire('company-form', ['user' => $social_user])
                @else
                    @livewire('company-form')
                @endif
            </div>
        </div>
    </div>
</section>

@endsection