
<div class="cart-header">
    <div id="test-hide2"></div>
    <a href="{{route('customer.cart')}}" class="cart-header text-orange px-3 py-2 rounded-md text-lg font-medium">
        <span class="fas fa-shopping-bag"><i class="badge badge-light" id="carttotal" wire:poll.750ms>({{ Cart::count()}})</i></span>
    </a>
</div>


    <!-- <a href="{{route('customer.cart')}}" class=" text-orange px-3 py-2 text-lg font-medium">
        <span class=" fas fa-shopping-bag"><i class="badge badge-light" id="carttotal" wire:poll.750ms>({{ Cart::count()}})</i></span>
    </a> -->
