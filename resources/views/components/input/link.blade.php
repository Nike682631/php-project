
@if ($type == "link")
    <a 
        href="{{ $link }}" 
        target="{{ $target }}" 
        class="{{ $class }}">

        {{ $slot }}
    </a>
@else
    <a 
        href="#" 
        data-toggle="modal" 
        data-target="{{ $target }}" 
        class="{{ $class }}">
        
        {{ $slot }}
    </a>
@endif
