<select class="form-control form-control" id="select-countries" name="country" required wire:ignore>
    @foreach($countries as $country) 
        @foreach($country as $key => $value) 
            <option value="{{ $key }}" 
                @if (isset($user) && $key == $user->info->country)
                    selected="selected"
                @endif
            >{{ $value }}</option>
        @endforeach
    @endforeach
</select>

<script>
    $(document).ready(function () {
        $('#select-countries').on('change', function (e) {
            @this.set('country', e.target.value);
        });
    });
</script>