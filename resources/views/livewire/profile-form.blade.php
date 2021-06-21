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
            <legend>Modifier vos informations personelles</legend>
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
                    <label for="state.name">Nom</label>
                    <input type="text" class="form-control" id="state.name" wire:model="state.name"/>
                </div>
                <div class="col-12 learts-mb-30">
                    <label for="state.prenom">Prénom</label>
                    <input type="text" class="form-control" id="state.prenom" wire:model="state.prenom"/>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
</div>
