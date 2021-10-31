<div>

    <div
        x-data="
        {
             isEditing: false,
             focus: function() {
                const companyPhoneInput = this.$refs.companyPhoneInput;
                companyPhoneInput.focus();
                companyPhoneInput.select();
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
        >{{ $origPhone}}
            @include('components.icons.pencil-primary')
        </span>
        </div>
        <div x-show=isEditing >
            <form class="flex" wire:submit.prevent="save">
                <input
                    type="text"
                    placeholder="100 characters max."
                    x-ref="companyPhoneInput"
                    wire:model.lazy="newPhone"
                    x-on:keydown.enter="isEditing = false"
                    x-on:keydown.escape="isEditing = false"
                    required
                >
                @include("livewire.cancel-submit")
            </form>
            <small>{{ __('Enter to save, Esc to cancel') }}</small>
        </div>
        @error('newPhone') <small style="color: red;">{{ $message }}</small> @enderror
    </div>




</div>
