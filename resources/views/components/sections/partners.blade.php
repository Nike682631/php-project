<section class="c-partners">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="c-partners__heading text-center mb-40">{{ __("Partnerships")}} </h3>

        <div class="logos text-center justify-content-between d-flex">
          @php $logos = json_decode(nova_get_setting('logos')); @endphp
          @for($i = 0; $i < count($logos); $i ++)
		  	<a href = "{{$logos[$i]->attributes->url}}" target="_blank">
            <img src="{{url('storage/' . $logos[$i]->attributes->image)}}" />
			</a>
          @endfor
        </div>
      </div>
    </div>
  </div>
</section>
