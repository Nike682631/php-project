@if(Auth::user()->id == $user->id)
    <a href="{{route("user.edit",$user)}}" style="float: right;text-decoration: none; color: inherit">
        @include("components.icons.pencil-primary")
        <span>{{ __('Edit') }}</span>
    </a>
@endif
