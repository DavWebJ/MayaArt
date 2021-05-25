 <div>
        <form wire:submit.prevent="rate({{ $product->id }})" >
			<div class="row learts-mb-n30">
				<div class="col-12 learts-mb-10">
					<div class="form-rating">
						<span class="title">Donner votre avis sur ce produit</span>
						<div class="container mt-5">
							<div class="stars row">
								<label class="rate">
									<input type="radio" name="rating" id="star1" value="1" wire:model="rating">
									<div class="face"></div>
									<i class="far fa-star star one-star"></i>
								</label>
								<label class="rate">
									<input type="radio" name="rating" id="star2" value="2" wire:model="rating">
									<div class="face"></div>
									<i class="far fa-star star two-star"></i>
								</label>
								<label class="rate">
									<input type="radio" name="rating" id="star3" value="3" wire:model="rating">
									<div class="face"></div>
									<i class="far fa-star star three-star"></i>
								</label>
								<label class="rate">
									<input type="radio" name="rating" id="star4" value="4" wire:model="rating">
									<div class="face"></div>
									<i class="far fa-star star four-star"></i>
								</label>
								<label class="rate">
									<input type="radio" name="rating" id="star5" value="5" wire:model="rating">
									<div class="face"></div>
									<i class="far fa-star star five-star"></i>
								</label>
							</div>
						</div>
							<div class="col-12 learts-mb-30"><textarea placeholder="Votre avis *" wire:model.lazy="comment" name="comment"></textarea></div>
							<div class="col-12 text-center learts-mb-30"><button class="btn btn-dark btn-outline-hover-dark" type="submit">Voter</button></div>
					</div>
				</div>
			</div>
		</form>
		@error('comment')
		<p class="mt-1 text-red-500">{{ $message }}</p>
	@enderror
</div>


