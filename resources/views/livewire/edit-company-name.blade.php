<div>

    <div
        x-data="
        {
             isEditing: false,
             focus: function() {
                const companyNameInput = this.$refs.companyNameInput;
                companyNameInput.focus();
                companyNameInput.select();
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
        >{{ $origName}}
            @include('components.icons.pencil-primary')
        </span>
        </div>
        <div x-show=isEditing >
            <form class="flex" wire:submit.prevent="save">
                <input
                    type="text"
                    placeholder="100 characters max."
                    x-ref="companyNameInput"
                    wire:model.lazy="newName"
                    x-on:keydown.enter="isEditing = false"
                    x-on:keydown.escape="isEditing = false"
                >
                @include("livewire.cancel-submit")
            </form>
            <small>{{ __('Enter to save, Esc to cancel') }}</small>
        </div>
        @error('newName') <small style="color: red;">{{ $message }}</small> @enderror
    </div>




</div>
