<div>

    <div
        x-data="
        {
             isEditing: false,
             focus: function() {
                const employeeNbInput = this.$refs.employeeNbInput;
                employeeNbInput.focus();
                employeeNbInput.select();
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
        >{{ $origEmployeeNb}}
            @include('components.icons.pencil-primary')
        </span>
        </div>
        <div x-show=isEditing >
            <form class="flex" wire:submit.prevent="save">
                <input
                    type="text"
                    placeholder="e.g 1-10 "
                    x-ref="employeeNbInput"
                    wire:model.lazy="newEmployeeNb"
                    x-on:keydown.enter="isEditing = false"
                    x-on:keydown.escape="isEditing = false"
                >
                @include("livewire.cancel-submit")
            </form>
            <small>{{ __('Enter to save, Esc to cancel') }}</small>
        </div>
        @error('newEmployeeNb') <small style="color: red;">{{ $message }}</small> @enderror
    </div>




</div>
