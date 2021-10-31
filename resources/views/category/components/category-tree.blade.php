<div class="categories">
    <button class="btn btn-sm btn-light d-lg-none float-right" type="button" data-toggle="collapse"
            data-target="#sidebar" aria-label="Toggle categories"> X
    </button>
    <p class="categories__title mb-0 left">{{ __("Select Categories") }}</p>

    <div id="categories" class="categories category-tree">
        @php
            if(isset($cat_id) && $cat_id != -1) {
                $startingCat = \App\Category::where('id',$cat_id)->with('parent')->get();
               while($startingCat[0]->parent) {
                    $startingCat[0] = $startingCat[0]->parent;
               }
            } else {
                $startingCat = \App\Category::topLevelCategories()->get();
            }
        @endphp
        @if(isset($cat_id) && $cat_id != -1)
            @if($startingCat[0]->parent_category_id)
                <a href="{{ route('category.show',$startingCat[0]->parent->id) }}">
                    <div class="categories__btn-back">< {{ __("Back") }}</div>
                </a>
            @else
                <a href="{{ route('category.index') }}" class="mb-2">
                    <div class="categories__btn-back">< {{ __("Back") }}</div>
                </a>
            @endif
        @endif
        <ul class="submenu">

            @foreach($startingCat as $category)
                <li>
                    <a data-id="5"
                       class="filters-cat {{ is_current_category_active(Request::route( 'id' ), $category->id) }}"
                       href="{{ route('category.show', $category->id) }}">
                        {{ $category->name }}

                    </a>
                    @if($category->childCategories->count() > 0)

                        <span class="submenu-indicator">+</span>
                    @endif
                    <ul class="submenu {{ is_current_category(Request::route( 'id' ), $category->id) }}">
                        @foreach($category->childCategories as $subCat)
                            <li>
                                <a data-id="{{ $subCat->id }}"
                                   class="filters-cat {{ is_current_category_active(Request::route( 'id' ), $subCat->id) }}"
                                   href="{{ route('category.show', $subCat->id) }}">
                                    {{ $subCat->name }}
                                </a>
                                @if($subCat->childCategories->count() > 0)
                                    <span class="submenu-indicator">+</span>
                                @endif

                                <ul class="submenu {{ is_current_category(Request::route( 'id' ), $subCat->id) }}">

                                    @foreach($subCat->childCategories as $thirdCat)
                                        <li>
                                            <a data-id="{{ $thirdCat->id }}"
                                               class="filters-cat {{ is_current_category_active(Request::route( 'id' ), $thirdCat->id) }}"

                                               href="{{ route('category.show', $thirdCat->id) }}">
                                                {{ $thirdCat->name }}
                                            </a>
                                            @if($thirdCat->childCategories->count() > 0)
                                                <span class="submenu-indicator">+</span>
                                            @endif
                                            <ul class="submenu {{ is_current_category(Request::route( 'id' ), $thirdCat->id) }}">
                                                @foreach($thirdCat->childCategories as $fourthCat)
                                                    <li>
                                                        <a data-id="{{ $fourthCat->id }}"
                                                           class="filters-cat   {{ is_current_category_active(Request::route( 'id' ), $fourthCat->id) }}"

                                                           href="{{ route('category.show', $fourthCat->id) }}">
                                                            {{ $fourthCat->name }}
                                                        </a>
                                                        @if($fourthCat->childCategories->count() > 0)
                                                            <span class="submenu-indicator">+</span>
                                                        @endif
                                                        <ul class="submenu {{ is_current_category(Request::route( 'id' ), $fourthCat->id) }}">
                                                            @foreach($fourthCat->childCategories as $cat5)
                                                                <li>
                                                                    <a data-id="{{ $cat5->id }}"
                                                                       class="filters-cat   {{ is_current_category_active(Request::route( 'id' ), $cat5->id) }}"

                                                                       href="{{ route('category.show', $cat5->id) }}">
                                                                        {{ $cat5->name }}
                                                                    </a>
                                                                    @if($cat5->childCategories->count() > 0)
                                                                        <span class="submenu-indicator">+</span>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                    @php $category = $category->childCategories @endphp

                </li>
            @endforeach
        </ul>

    </div>
</div>