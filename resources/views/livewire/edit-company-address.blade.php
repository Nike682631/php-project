<div>

    <div
        x-data="
        {
             isEditing: false,
             focus: function() {
                const addressInput = this.$refs.addressInput;
                addressInput.focus();
                addressInput.select();
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
        >
            {{ $origAddress}}
        @include('components.icons.pencil-primary')
        </span>
        </div>
        <div x-show=isEditing >
            <form class="flex" wire:submit.prevent="save">
                <input
                    type="text"
                    placeholder="100 characters max."
                    x-ref="addressInput"
                    wire:model.lazy="newAddress"
                    x-on:keydown.enter="isEditing = false"
                    x-on:keydown.escape="isEditing = false"
                >
              @include("livewire.cancel-submit")
            </form>

            <small>{{ __('Enter to save, Esc to cancel') }}</small>
        </div>
        @error('newAddress') <small style="color: red;">{{ $message }}</small> @enderror
    </div>




</div>
