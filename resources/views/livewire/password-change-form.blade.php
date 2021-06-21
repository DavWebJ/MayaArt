<div>
    @if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
    @endif
        <form wire:submit.prevent="updateProfileInformation" role="form">
        <fieldset>
        <legend>Modifier votre mot de passe</legend>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row learts-mb-n30 mb-4">
                <div class="col-12 learts-mb-30">
                    <label for="state.current_password">Mot de passe actuel</label>
                    <input type="password" class="form-control" id="state.current_password" wire:model="state.current_password"/>
                </div>

                <div class="col-12 learts-mb-30">
                    <label for="state.password">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="state.password" wire:model="state.password"/>
                </div>
                <div class="col-12 learts-mb-30">
                    <label for="state.password_confirmation">Confirmer le nouveau mot de passe</label>
                    <input type="password" class="form-control" id="state.password_confirmation" wire:model="state.password_confirmation"/>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
        </form>
</div>
