<div>
    @php $categoryStr = implode(",", $arrChecked) @endphp
    <input type="hidden" name="categoryStr" value="{{ $categoryStr }}" />
    <ul id="ul-category-tree" wire:ignore>
        @foreach($categories as $category)
            <li>
                <div x-data="{ checked: false }" class="tree-header">
                    <a class="btn-custom-check" wire:click="handleCheck({{$category->id}})" x-on:click="checked = !checked">
                        <div x-show="checked" style="display:none;">
                            @include('components.icons.custom-checked')
                        </div>
                        <div x-show="!checked">
                            @include('components.icons.custom-uncheck')
                        </div>
                    </a>

                    {{ $category->name }}

                    <div class="ml-auto tree-expand-right d-block pl-1">
                        @include('components.icons.expand-right')
                    </div>
                    <div class="ml-auto tree-expand-down d-none pl-1">
                        @include('components.icons.expand-down')
                    </div>
                </div>
                
                @if(count($category->childCategories))
                    <x-category.category-child :childs="$category->childCategories" />
                @endif
            </li>
        @endforeach
    </ul>
</div>