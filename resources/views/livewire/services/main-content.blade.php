<div class="row">
    <div class="d-flex justify-content-end col-12" wire:ignore>
        <a class="btn btn-sm btn-primary btn-customized d-lg-none text-white" type="button" data-toggle="collapse"
            data-target="#sidebar" aria-label="Toggle categoriescompanies"> {{ __('Categories') }}
        </a>
    </div>    
    <div class="col-lg-4">
        <div class="sidebar collapse sidebar-collapse border-0" id="sidebar" wire:ignore>
            <div class="service-content__sidebar">
                <a type="button" class="close d-lg-none close__sidebar" data-toggle="collapse" data-target="#sidebar" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
                @include('category.components.category-tree')
            </div>
        </div>
    </div>    
    <div class="col-lg-8 col-md-12">        
        <div class="d-flex flex-wrap justify-content-between mb-4">
            <div class="service-content__country" wire:ignore>
                @include('components.forms.countries-select') 
            </div>
            <div class="d-flex mt-3" x-data="{
                type: 0,
                isSell: false,
                isBuy: false,
                updateType: function() {
                    if (this.isSell && this.isBuy) {
                        this.type = 3;
                    }
                    if (this.isSell && !this.isBuy) {
                        this.type = 1;
                    }
                    if (!this.isSell && this.isBuy) {
                        this.type = 2;
                    }
                    if (!this.isSell && !this.isBuy) {
                        this.type = 0;
                    }
                }
            }" x-cloak>
                <a class="d-flex mr-4" x-on:click="isSell = !isSell; updateType(); $wire.setType(type)">
                    <div x-show="isSell" style="display:none;">
                        @include('components.icons.custom-checked')
                    </div>
                    <div x-show="!isSell">
                        @include('components.icons.custom-uncheck')
                    </div>
                    <span class="custom-text-info pl-2">{{ __("Company Sells") }}</span>
                </a>
                <a class="d-flex" x-on:click="isBuy = !isBuy; updateType(); $wire.setType(type)">
                    <div x-show="isBuy" style="display:none;">
                        @include('components.icons.custom-checked')
                    </div>
                    <div x-show="!isBuy">
                        @include('components.icons.custom-uncheck')
                    </div>
                    <span class="custom-text-info pl-2">{{ __("Company Buys") }}</span>
                </a>
            </div>            
        </div>

        <div>
            @auth
                @if ($companies->count() == 0)
                    <p id="no-companies" class="text-center">

                        {{ __('There are no companies for this filter...') }}</p>
                @endif
            @endauth
        </div>
        <div class="list">
            @foreach ($companies as $user)
                <livewire:services.company-card :user="$user" :key="$user->id">
            @endforeach
        </div>

        @auth
            <div class="wood-pagination text-center mt-3">
                {{ $companies->links('pagination::bootstrap-4') }}
            </div>

        @else
            @include('components.sections.restricted-content')
        @endauth
    </div>
</div>
