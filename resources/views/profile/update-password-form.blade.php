<div>
    <form action="" wire:submit.prevent="updatePassword">
        <fieldset>
            <div class="row learts-mb-n30 mb-4">
        
        <div class="col-12 learts-mb-30">
            <label for="current_password" value="{{ __('Current Password') }}" ></label>
            <input id="current_password" type="password"  class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" placeholder="*****" />
       
        </div>

        <div class="col-12 learts-mb-30">
            <label for="new-pwd" value="{{ __('New Password') }}"></label>
            <input id="new-pwd" type="password"  wire:model.defer="state.password" autocomplete="new-pwd" />

        </div>

        <div class="col-12 learts-mb-30">
            <label for="password_confirmation" value="{{ __('Confirm Password') }}" ></label>
            <input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
      
        </div>
            </div>
        </fieldset>
        <button type="submit">Sauvegarder</button>
        </form>
</div>
