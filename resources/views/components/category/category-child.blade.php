<ul>
    @foreach($childs as $child)
        <li>
            <div x-data="{ checked: false }" class="tree-header">
                <a class="btn-custom-check" wire:click="handleCheck({{$child->id}})" x-on:click="checked = !checked">
                    <div x-show="checked" style="display:none;">
                        @include('components.icons.custom-checked')
                    </div>
                    <div x-show="!checked">
                        @include('components.icons.custom-uncheck')
                    </div>
                </a>

                {{ $child->name }}

                <div class="ml-auto tree-expand-right d-block pl-1">
                    @include('components.icons.expand-right')
                </div>
                <div class="ml-auto tree-expand-down d-none pl-1">
                    @include('components.icons.expand-down')
                </div>
            </div>
            @if(count($child->childCategories))
                <x-category.category-child :childs="$child->childCategories" />
            @endif
        </li>
    @endforeach
</ul>