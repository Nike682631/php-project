<div>

    <div
        x-data="
        {
             isEditing: false,
             focus: function() {
                const companyEmailInput = this.$refs.companyEmailInput;
                companyEmailInput.focus();
                companyEmailInput.select();
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
        >{{ $origEmail}}
            @include('components.icons.pencil-primary')
        </span>
        </div>
        <div x-show=isEditing >
            <form class="flex" wire:submit.prevent="save">
                <input
                    type="email"
                    placeholder="Email"
                    x-ref="companyEmailInput"
                    wire:model.lazy="newEmail"
                    x-on:keydown.enter="isEditing = false"
                    x-on:keydown.escape="isEditing = false"
                    required
                >
                @include("livewire.cancel-submit")
            </form>
            <small>{{ __('Enter to save, Esc to cancel') }}</small>
        </div>
        @error('newEmail') <small style="color: red;">{{ $message }}</small> @enderror
    </div>




</div>
