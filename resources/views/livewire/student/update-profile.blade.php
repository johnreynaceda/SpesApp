<div>
    <x-button label="EDIT FORM" right-icon="pencil-alt" wire:click="$set('update_modal', true)" md rounded positive
        class="font-semibold" />

    <x-modal wire:model.defer="update_modal" max-width="6xl">

        <x-card title="UPDATE PROFILE">

            <div>
                {{ $this->form }}
            </div>


            <x-slot name="footer">

                <div class="flex justify-end gap-x-4">

                    <x-button flat label="Cancel" x-on:click="close" />

                    <x-button dark label="Submit" class="font-bold" spinner="submitUpdate" wire:click="submitUpdate" />

                </div>

            </x-slot>

        </x-card>

    </x-modal>
</div>
