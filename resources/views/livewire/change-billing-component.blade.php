<div>
<div class="inner">
            <div class="head">
                <span class="title">Modifier l'adresse de facturation</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <form class="checkout-form learts-mb-50" id="form" wire:submit.prevent="createbilling">
                @include('includes.errors')
                <div class="row">
                    <div class="col-12 learts-mb-20">
                        <label for="bdAddress1">Adresse <abbr class="required">*</abbr></label>
                        <input type="text" id="adresse" name="adresse" placeholder="{{ $billing->adresse ?? 'votre adresse'}}" value="{{ $billing->adresse ?? '' }}" wire:model="adresse"  required>
                        @error('adresse')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                      <div class="col-12 learts-mb-20">
                        <label for="bdCountry">Pays *(livraison uniquement en France)</label>
                        <select id="pays" class="custom-select" name="pays" wire:model="pays" >
                            <option value="{{ $shipping->pays ?? 'France' }}" selected style="display:none;">{{ $shipping->pays ?? 'France' }}</option>
                            <option value="France">France </option>
                        </select>
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdTownOrCity">Ville <abbr class="required">*</abbr></label>
                        <input type="text" id="ville" name="ville" placeholder="{{ $billing->ville ?? 'votre ville' }}"  value="{{ $billing->ville ?? '' }}" wire:model="ville" required>
                            @error('ville')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdPostcode">Code postal <abbr class="required">*</abbr></label>
                        <input type="text" id="zip" name="zip" pattern="[0-9]*" maxlength="5" placeholder="{{ $billing->zip ?? 'département' }}" value="{{ $billing->zip ?? '' }}" wire:model="zip" required>
                        @error('zip')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="buttons">
                        <button class="btn btn-dark btn-hover-primary" type="submit">Sauvegarder cette adresse</button>
                </div>
            </form>
            </div>
        </div>
</div>
