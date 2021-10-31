<div class="categories-wrapper" style="max-height: 500px; overflow: scroll; ">

    @if($type == 'buy')
        <form action="{{ route('user.buy-add', Auth::user()->id) }}">

            @elseif($type == 'sell')
                <form action="{{ route('user.buy-sell', Auth::user()->id) }}">

                    @endif
                    @foreach(\App\Category::serviceCategories()->get() as $category)
                        <div class="first-level-checkbox">
                            <div class="form-group submenu-trigger">
                                <input id="cat-item-{{ $category->id }}" type="checkbox" class=""
                                       name="productCategories[]"
                                       {{ is_current_category_selected(Auth::user(), $category, $type) }}

                                       value="{{ $category->id }}">
                                <label for="#cat-item-{{$category->id}}">
                                    {{ $category->name }}
                                </label>
                                <span class="submenu-indicator">+</span>

                                <div class="second-level-checkbox submenu">
                                    @foreach($category->childCategories as $subCat)
                                        <div class="form-group pl-3 submenu-trigger">

                                            <label for="cat-item-{{ $subCat->id }}">
                                                <input id="cat-item-{{ $subCat->id }}" type="checkbox" class=""
                                                       name="productCategories[]"
                                                       @if(Auth::user()->serviceCategoriesUser($subCat->id, $type)) checked @endif
                                                       value="{{ $subCat->id }}">
                                                {{ $subCat->name }}</label>
                                            @if($subCat->childCategories->count() > 0)
                                                <span class="submenu-indicator">+</span>
                                            @endif
                                            <div class="second-level-checkbox submenu">
                                                @foreach($subCat->childCategories as $thirdCat)
                                                    <div class="form-group submenu-trigger">
                                                        <div class="pl-3 submenu-trigger">
                                                            <input id="cat-item-{{ $thirdCat->id }}" type="checkbox"
                                                                   class=""
                                                                   @if(Auth::user()->serviceCategoriesUser($thirdCat->id, $type)) checked @endif
                                                                   name="productCategories[]" value="{{ $thirdCat->id }}">
                                                            <label for="cat-item-{{ $thirdCat->id }}">{{ $thirdCat->name }}</label>

                                                            @if($thirdCat->childCategories->count() > 0)
                                                                <span class="submenu-indicator">+</span>
                                                            @endif
                                                            <div class="submenu">
                                                                @foreach($thirdCat->childCategories as $fourthCat)

                                                                    <div class="pl-3 submenu-trigger">

                                                                        <label for="cat-item-{{ $fourthCat->id }}">
                                                                            <input id="cat-item-{{ $fourthCat->id }}"
                                                                                   type="checkbox"
                                                                                   class=""
                                                                                   @if(Auth::user()->serviceCategoriesUser($fourthCat->id, $type)) checked @endif

                                                                                   name="productCategories[]"
                                                                                   value="{{ $fourthCat->id }}">
                                                                            {{ $fourthCat->name }}</label>

                                                                        @if($fourthCat->childCategories->count() > 0)
                                                                            <span class="submenu-indicator">+</span>
                                                                        @endif

                                                                        <div class="submenu">
                                                                            @foreach($fourthCat->childCategories as $cat5)

                                                                                <div class="pl-3 submenu-trigger">

                                                                                    <label for="cat-item-{{ $cat5->id }}">
                                                                                        <input id="cat-item-{{ $cat5->id }}"
                                                                                               type="checkbox"
                                                                                               class=""
                                                                                               @if(Auth::user()->serviceCategoriesUser($cat5->id, $type)) checked @endif

                                                                                               name="productCategories[]"
                                                                                               value="{{ $cat5->id }}">
                                                                                        {{ $cat5->name }}</label>

                                                                                    @if($cat5->childCategories->count() > 0)
                                                                                        <span class="submenu-indicator">+</span>
                                                                                    @endif
                                                                                </div>


                                                                            @endforeach
                                                                        </div>
                                                                    </div>




                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
</div>
