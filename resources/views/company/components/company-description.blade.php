@if($user->info->description)
<div class="info-card-light card ml-2">
  <div class="card-header">
    <h4 class="info-card__heading">{{ __("About company") }}</h4>
  </div>
  <div class="card-body">
    <div class="info-card__text">
      <div class="mb-10">
          @if(Auth::user()->id == $user->id)
              <livewire:edit-company-description :user="$user">
          @else
              {{ $user->info->description }}
          @endif
      </div>
        <div>

          <a href="http://{{ $user->info->website }}" target="_blank">
             {{ $user->info->website }}
           </a>
        </div>
    </div>
  </div>
</div>
@endif
