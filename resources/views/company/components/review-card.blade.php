<div class="card">
    <span class="card-title">{{$data->author->name}}</span>
    <div class="star-group">
        @for($i = 1; $i <= $data->rating; $i ++)
            <span class="fa fa-star checked" data-rating="{{$i}}"></span>
        @endfor
        @for($i = $data->rating + 1; $i <= 5; $i ++)
            <span class="fa fa-star" data-rating="{{$i}}"></span>
        @endfor
    </div>
    <div class="description">{{$data->description}}</div>
</div>