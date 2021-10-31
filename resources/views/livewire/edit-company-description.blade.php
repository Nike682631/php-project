<div>

    <div
        x-data="
        {
             isEditing: false,
             focus: function() {
                const descriptionInput = this.$refs.descriptionInput;
                descriptionInput.focus();
                descriptionInput.select();
             }
        }
    "
        x-cloak
    >
        <div
            x-show=!isEditing
        >
        <span
            x-on:click="isEditing = true; $nextTick(() => focus())"
            style="line-height: 26px;"
        >
            {{$origDescription}}
            <span class="edit-desc-area">
                @include('components.icons.pencil-primary')
            </span>            

        </span>
        </div>
        <!--x-on:keydown.enter="isEditing = false" it's not possible to run enter keypress cause we are using textarea -->
        <!-- enter == new line if we bind this alpineJS property keydown.enter it will disable edit mode without submitting the form -->
        <div x-show=isEditing >
            <form class="flex" wire:submit.prevent="save">
                <textarea rows="10" cols="100"
                    type="text"
                    placeholder="Enter Description"
                    x-ref="descriptionInput"
                    wire:model.lazy="newDescription"
                    x-on:keydown.escape="isEditing = false"
                ></textarea>
                @include("livewire.cancel-submit")
            </form>
            <small>{{ __('Enter to save, Esc to cancel') }}</small>
        </div>
        @error('newDescription') <small style="color: red;">{{ $message }}</small> @enderror
    </div>




</div>
