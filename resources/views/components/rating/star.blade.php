@for ($i = 0; $i < 5; $i++)
  @if ($i < $rate)
    <span class="fa fa-star fa-xs star-rating checked"></span>
  @else
    <span class="fa fa-star fa-xs star-rating"></span>
  @endif
@endfor