<x-admin-layout>
<!-- Page Content -->
<div class="content">
    <div class="row invisible" data-toggle="appear">
            <!-- Overview -->
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="{{ url('admin/product') }}">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="fa fa-shopping-bag fa-3x text-xinspire"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{ $product->count() }} produits dans la boutique</div>
                        @if ($emptystock > 0)
                            <div class="text-xplay-darker">dont {{ $emptystock }} produits ne sont plus en stock
                               @foreach ($emptyproduct as $item)
                                    <div class="text-muted">- {{ $item->name }}</div>
                               @endforeach
                            </div>
                            @else
                            <div class="text-muted">tous les produits sont en stock</div>
                        @endif
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="{{ url('admin/order') }}">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="far fa-credit-card fa-3x text-xsmooth"></i>
                        </div>
                        <div class="font-size-h4 font-w600">{{ $order->count() }} commandes passer au total !</div>
                        <div class="text-success">dont {{ $ordertoday }} commandes passée aujourd'hui</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="{{ route('rating.index') }}">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-comments fa-3x text-info"></i>
                        </div>
                        <div class="font-size-h4 font-w600 text-green-600"> {{ $totalcomment }} Avis sont validés</div>
                        <div class="text-red-500">{{ $comment }} Avis attendent d'être validés</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="{{ route('user.index') }}">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-users fa-3x text-info"></i>
                        </div>
                        <div class="font-size-h4 font-w600 text-green-600"> {{ $currentcustomer }}  clients inscrit au total</div>
                        <div class="text-blue-500">dont {{ $newcustomer }} inscrit aujourd'hui</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-dollar-sign fa-3x text-info"></i>
                        </div>
                        <div class="font-size-h4 font-w600 text-green-600"> {{ $total }} € de chiffres d'affaires</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="{{ route('shop.show',['slug' => $lastcomment->product->slug]) }}">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-comment fa-3x text-info"></i>
                        </div>
                        <div class="font-size-h4 font-w600 ">voici le dernier avis laisser: <br>
                            <!-- Blockquotes -->
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">le @displayDate($lastcomment->created_at ,'d-m-Y g:i', true) </h3>
                                </div>
                                <div class="block-content">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">" {{ $lastcomment->comment }} "</p> <br>
                                            {!! str_repeat('<i class="fa fa-star text-yellow-400" aria-hidden="true"></i>', $lastcomment->rating) !!}
                                            {!! str_repeat('<i class="fa fa-star-o text-gray-400" aria-hidden="true"></i>', 5 - $lastcomment->rating) !!}
                                        <footer class="blockquote-footer">écrit par {{ $lastcomment->user->prenom }} {{ $lastcomment->user->name }}</footer>
                                    </blockquote>
                                </div>
                            </div>
                            <!-- END Blockquotes -->
                        </div>
                    </div>
                </div>
            </a>
        </div>
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                @livewire('profile.update-profile-information-form')
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
            @endif

    </div>
    </div>
</div>
</x-admin-layout>
