<ul class="submenu dropdown-menu">
    @foreach ($items as $item)
    <li><a class="dropdown-item" href="{{$item[1]}}">{{$item[0]}}</a></li>
    @endforeach
</ul>
