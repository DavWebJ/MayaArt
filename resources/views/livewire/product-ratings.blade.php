 <div>
        <form wire:submit.prevent="rate({{ $product->id }})" >
			<div class="mt-5 mx-auto">
				<div class="stars">
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
                    <div class="mb-5">
                        @error('comment')
                            <p class="mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                        <textarea wire:model.lazy="comment" name="comment" class="block w-full px-4 py-3  border-2 rounded-lg focus:outline-none" placeholder="Comment.."></textarea>
                    </div>
                    <button type="submit" class="addcomment w-full px-3 py-4 font-medium rounded-lg">votez</button>
            </form>
</div>

