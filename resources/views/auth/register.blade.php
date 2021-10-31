@extends('layouts.livewire')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
    
            @include('auth.register.components.left-side')
            
            <div class="right-side-container col-md-7 col-sm-12">
                @livewire('login-form')
            </div>
        </div>
    </div>
</section>

@endsection
