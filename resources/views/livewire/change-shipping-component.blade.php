<div>
<div class="inner">
            <div class="head">
                <span class="title">Modifier l'adresse de livraison</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <form class="checkout-form learts-mb-50"  id="form" wire:submit.prevent="createshipping">
                @include('includes.errors')
                <div class="row">
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdFirstName">Prénom <abbr class="required">*</abbr></label>
                        <input type="text" id="prenom" name="prenom" value="{{ $shipping->prenom ?? ''}}" placeholder="{{ $shipping->prenom ?? 'votre Prénom'}}" wire:model="prenom" required>
                        @error('prenom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdLastName">Nom <abbr class="required">*</abbr></label>
                        <input type="text" id="nom" name="nom"value="{{ $shipping->nom ?? ''}}" placeholder="{{ $shipping->nom ?? 'votre Nom'}}" wire:model="nom" required>
                        @error('nom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdCountry">Pays *(livraison uniquement en France)</label>
                        <select id="pays" class="custom-select" name="pays" wire:model="pays">
                            <option value="{{ $shipping->pays ?? 'France' }}" selected style="display:none;">{{ $shipping->pays ?? 'France' }}</option>
                            <option value="France">France </option>
                        </select>
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdAddress1">Adresse <abbr class="required">*</abbr></label>
                        <input type="text" id="adresse" name="adresse" placeholder="{{ $shipping->adresse ?? 'votre adresse de livraison'}}" value="{{ $shipping->adresse ?? '' }}" wire:model="adresse"  required>
                        @error('adresse')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdTownOrCity">Ville <abbr class="required">*</abbr></label>
                        <input type="text" id="ville" name="ville" placeholder="{{ $shipping->ville ?? 'la ville de  livraison'}}" value="{{ $shipping->ville ?? '' }}" wire:model="ville" required>
                            @error('ville')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdPostcode">Code postal <abbr class="required">*</abbr></label>
                        <input type="text" id="zip" name="zip" pattern="[0-9]*" maxlength="5" placeholder="{{ $shipping->zip ?? 'département de la ville'}}" value="{{ $shipping->zip ?? '' }}" wire:model="zip" required>
                        @error('zip')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="buttons">
                        <button class="btn btn-dark btn-hover-primary" type="submit">Sauvegarder la livraison</button>
                </div>
                </form>
            </div>
        </div>
</div>
