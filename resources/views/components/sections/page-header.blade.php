<section class="page-header page-header__small bg-overlay">
  <div class="container">
    <div class="row">
		<div class="col-md-10">
			@if (isset($title))
			<h2 class="font-size-30 text-white">{{ $title }} </h2>
			@else
			<h2 class="font-size-30 text-white">{{ __("Company Profile")}} </h2>
			@endif
			
		</div>
    </div>
  </div>
</section>
