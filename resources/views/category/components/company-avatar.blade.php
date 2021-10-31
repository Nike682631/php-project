@if($user->photo == null)
<img src="{{ asset('assets/user/images/thumb.jpg') }}" alt="">
@else
<img src="{{ asset('uploads/' . $user->photo) }}" alt="">
@endif