<div x-data="
        {isCreating: false, rating: 0, ratingHover: 0, starsData: [1, 2, 3, 4, 5], focus: function() {
                const starGroup = this.$refs.starGroup;
                starGroup.focus();
             }
        }" x-cloak>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div x-show=!isCreating>
        <div x-on:click="isCreating = true; $nextTick(() => focus())" class="write-review">
        @include('components.icons.pencil-primary')<span class="ml-2">{{ __('Write Review')}}</span>
        </div>
    </div>
    <div x-show=isCreating >
        <div class="modal" style="display:block">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form wire:submit.prevent="save">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('Create a review') }}</h5>
                            <button x-on:click="isCreating = false; rating = ratingHover = 0; $wire.description = ''" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Rating:
                            <br/>
                            <div class="star-group" x-ref="starGroup">
                                <template x-for="(index) in Array.from(Array(5).keys())" :key="index">
                                    <img :src="index <= ratingHover ? 'https://upload.wikimedia.org/wikipedia/commons/2/29/Gold_Star.svg' : 'https://upload.wikimedia.org/wikipedia/commons/f/f9/Five_Pointed_Star_Solid.svg'" x-on:mouseover="ratingHover = index" x-on:click="rating = ratingHover = index; $wire.rating = rating + 1" x-on:mouseleave="ratingHover = rating" />
                                        
                                </template>
                                @error('rating')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <br/>
                            Description:
                            <br/>
                            <input wire:model="description" class="form-control"/>
                            @error('description')
                            <div style="font-size: 11px; color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button x-on:click="rating = ratingHover = 0" type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            <button x-on:click="isCreating = false; rating = 0; $wire.description = ''" type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="success" class="modal fade" @if ($created) style="opacity: 1; display: block;" @endif>
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <div class="icon-box">
                            <i class="material-icons">&#xE876;</i>
                        </div>
                        <button x-on:click = "$wire.created = false;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Great!</h4>	
                        <p>Your review has been added successfully.</p>
                        <button x-on:click = "$wire.created = false;" class="btn btn-success" data-dismiss="modal"><span>OK</span></button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

