@if($request->request_type == 1)
<div class="request_type">{{ __("Air freight") }}</div>
@elseif($request->request_type == 2)
    <div class="request_type">{{ __("Cargo truck") }}</div>

@elseif($request->request_type == 3)
    <div class="request_type">{{ __("Courier") }}</div>

@elseif($request->request_type == 4)
    <div class="request_type">{{ __("Container ship") }}</div>

@elseif($request->request_type == 5)
    <div class="request_type">{{ __("Train") }}</div>
@endif