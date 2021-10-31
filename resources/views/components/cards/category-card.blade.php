<div class="category-card border-left border-right border-bottom rounded m-3">

    <div class="category-card__header d-flex align-items-center rounded-top px-4 text-white">
        <div>
            @if ( $category->icon_url == null )
                @include('components.icons.product')
            @else
                <img class="category-icon" src="{{config('app.url') . '/storage/' . $category->icon_url}}" />
            @endif            
        </div>        
        <span class="pl-3">
            {{ $category->name }}
        </span>        
    </div>

    <div class="category-card__body">
        @foreach($category->childCategories as $index => $child)
            @if( $index < 6 )
                @if( $category->childCategories->count() == $index + 1 )
                    <a href="{{ route('category.show', $child->id) }}">
                        <div class="category-card__child py-3 px-4">
                            {{ $child->name }} 
                        </div>          
                    </a>              
                @else 
                    <a href="{{ route('category.show', $child->id) }}">
                        <div class="category-card__child py-3 px-4 border-bottom">
                            {{ $child->name }} 
                        </div>          
                    </a>         
                @endif      
            @endif              
        @endforeach

        @if($category->childCategories->count() > 6)
            <div class="collapse" id="moreCategories-{{$category->id}}">
                @foreach($category->childCategories as $index => $child)
                    @if( $index > 5 )
                        <a href="{{ route('category.show', $child->id) }}">
                            <div class="category-card__child py-3 px-4 border-bottom">
                                {{ $child->name }} 
                            </div>          
                        </a>              
                    @endif  
                @endforeach
            </div>
            <a class="text-dark" data-toggle="collapse" href="#moreCategories-{{$category->id}}" role="button" aria-expanded="false" aria-controls="moreCategories-{{$category->id}}">
                <div class="category-card__child d-flex align-items-center py-3 px-4 expander show">
                    <div class="expand-text mr-auto">{{ __('EXPAND ') }}</div> 
                    <i class="fa fa-angle-down"></i> 
                </div>  
                <div class="category-card__child d-flex align-items-center py-3 px-4 expander">
                    <div class="expand-text mr-auto">{{ __('COLLAPSE ') }}</div> 
                    <i class="fa fa-angle-up"></i> 
                </div>
            </a>
        @endif
     </div>
</div>

@section('custom_scripts')
    <script>

        $(document).ready(function () {

            $('.collapse').on('hidden.bs.collapse', function () {
                var children = $(this).next().children();
                $(children[0]).toggleClass('show');
                $(children[1]).toggleClass('show');
            });

            $('.collapse').on('shown.bs.collapse', function () {
                var children = $(this).next().children();
                $(children[0]).toggleClass('show');
                $(children[1]).toggleClass('show');
            })

        });
    </script>
@endsection