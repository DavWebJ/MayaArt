<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          
        </h2>
    </x-slot>
        <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>

    <div class="py-12 container">
@if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <h2 class="text-center font-bold text-2xl my-2">Liste de vos commandes</h2> <hr> <br>
                @if ($order ?? '')
                    <p class="text-center font-bold  my-2">Vous n'avez pas de commandes en cours</p>
                @endif
                @if($orders_encours->count() > 0)
                <h2 class="text-center font-bold text-2xl my-2 text-blue-600">Vos commandes en cours de préparation</h2>
                 @foreach ($orders_encours as $order)
                     <div class="card my-5">
                            <div class="card-header">
                                Commande passée le <span class="date">{{Carbon\Carbon::parse($order->order_at)->format('d/m/Y à  H:i')}}</span> 
                                <h5>Commande N° {{$order->transaction_id}}</h5>
                                @if($order->status != 'annuler')
                                <div class="row justify-between mx-2">
                                   <div>Status de la commande: <span class=" text-blue-600 fas fa-clipboard">  {{$order->status}} de préparation...</span></div>
                                </div>
                                @endif
                            </div>
                         <div class="card-body">
                            <table class="table table-hover table-striped table-bordered border-primary">
                                  <thead>
                                <tr>
                                <th scope="col">#</th>
                                  <th scope="col">Produit</th>
                                  <th scope="col">Prix</th>
                                  <th scope="col">Quantité</th>
                                 </tr>
                                </thead>
                                <tbody>
                                @foreach (unserialize($order->products) as $item)
                                    <tr>
                                    <th scope="row"></th>
                                    <th scope="row">{{$item[0]}}</th>
                                    <th scope="row">{{ formatPrice($item[1]) }}</th>
                                    <th scope="row">{{$item[2]}}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <caption>
                                        @if($order->status == 'annuler')
                                            Status de la commande: <span class=" text-red-600">Annuler</span>
                                        @endif
                                       <span class="fas fa-credit-card text-green-500">  Total : {{FormatPrice($order->total / 100)}} </span> 
                                    </caption>
                                </tfoot>
                            </table>
                         </div>
                     </div>
                 @endforeach
                 @endif
                 @if($orders_preparer->count() > 0)
                 <h2 class="text-center font-bold text-2xl my-2 text-green-600">Vos commandes prêtes à être expediées</h2>
                    @foreach ($orders_preparer as $order)
                     <div class="card my-5">
                            <div class="card-header">
                                Commande passée le <span class="date">{{Carbon\Carbon::parse($order->order_at)->format('d/m/Y à  H:i')}}</span> 
                                pour un total de {{FormatPrice($order->total / 100)}} 
                                <h5>Commande N° {{$order->transaction_id}}</h5>
                                @if($order->status != 'annuler')
                                <div class="row justify-between mx-2">
                                   <div>Status de la commande: <span class=" text-green-600 fas fa-gift mx-2">  {{$order->status}}</span></div>
                                </div>
                                @endif
                            </div>
                         <div class="card-body">
                            <table class="table table-hover table-striped table-bordered border-primary">
                                  <thead>
                                <tr>
                                <th scope="col">#</th>
                                  <th scope="col">Produit</th>
                                  <th scope="col">Prix</th>
                                  <th scope="col">Quantité</th>
                                 </tr>
                                </thead>
                                <tbody>
                                @foreach (unserialize($order->products) as $item)
                                    <tr>
                                    <th scope="row"></th>
                                    <th scope="row">{{$item[0]}}</th>
                                    <th scope="row">{{ formatPrice($item[1]) }}</th>
                                    <th scope="row">{{$item[2]}}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <caption>
                                        @if($order->status == 'annuler')
                                            Status de la commande: <span class=" text-red-600">Annuleé</span>
                                        @endif
                                         <span class="fas fa-credit-card text-green-500">  Total : {{FormatPrice($order->total / 100)}} </span> 
                                    </caption>
                                </tfoot>
                            </table>
                         </div>
                     </div>
                 @endforeach
                 @endif
                 @if($orders_expedier->count() > 0)
                 <h2 class="text-center font-bold text-2xl my-2 text-green-600">Vos commandes éxpediées</h2>
                    @foreach ($orders_expedier as $order)
                     <div class="card my-5">
                            <div class="card-header">
                                Commande passée le <span class="date">{{Carbon\Carbon::parse($order->order_at)->format('d/m/Y à  H:i')}}</span> 
                                pour un total de {{FormatPrice($order->total / 100)}} 
                                <h5>Commande N° {{$order->transaction_id}}</h5>
                                @if($order->status != 'annuler')
                                <div class="row justify-between mx-2">
                                   <div>Status de la commande: <span class=" text-green-600 fas fa-shipping-fast mx-2">  {{$order->status}}</span></div>
                                </div>
                                @endif
                            </div>
                         <div class="card-body">
                            <table class="table table-hover table-striped table-bordered border-primary">
                                  <thead>
                                <tr>
                                <th scope="col">#</th>
                                  <th scope="col">Produit</th>
                                  <th scope="col">Prix</th>
                                  <th scope="col">Quantité</th>
                                 </tr>
                                </thead>
                                <tbody>
                                @foreach (unserialize($order->products) as $item)
                                    <tr>
                                    <th scope="row"></th>
                                    <th scope="row">{{$item[0]}}</th>
                                    <th scope="row">{{ formatPrice($item[1]) }}</th>
                                    <th scope="row">{{$item[2]}}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <caption>
                                        @if($order->status == 'annuler')
                                            Status de la commande: <span class=" text-red-600">Annulée</span>
                                        @endif
                                         <span class="fas fa-credit-card text-green-500">  Total : {{FormatPrice($order->total / 100)}} </span> 
                                    </caption>
                                </tfoot>
                            </table>
                         </div>
                     </div>
                 @endforeach
                 @endif
                 @if ($orders_annuler->count() > 0)
                 <h2 class="text-center font-bold text-2xl my-2 text-red-600">Vos commandes annulées</h2>
                        @foreach ($orders_annuler as $order)
                     <div class="card my-5">
                            <div class="card-header">
                                Commande passée le <span class="date">{{Carbon\Carbon::parse($order->order_at)->format('d/m/Y à  H:i')}}</span> 
                                pour un total de {{FormatPrice($order->total / 100)}} 
                                <h5>Commande N° {{$order->transaction_id}}</h5>
                                @if($order->status == 'annuler')
                                <div class="row justify-between mx-2">
                                   <div>Status de la commande: <span class=" text-red-600 fas fa-ban">  La commande est annulée</span></div>
                                </div>
                                @endif
                            </div>
                         <div class="card-body">
                            <table class="table table-hover table-striped table-bordered border-primary">
                                  <thead>
                                <tr>
                                <th scope="col">#</th>
                                  <th scope="col">Produit</th>
                                  <th scope="col">Prix</th>
                                  <th scope="col">Quantité</th>
                                 </tr>
                                </thead>
                                <tbody>
                                @foreach (unserialize($order->products) as $item)
                                    <tr>
                                    <th scope="row"></th>
                                    <th scope="row">{{$item[0]}}</th>
                                    <th scope="row">{{ formatPrice($item[1]) }}</th>
                                    <th scope="row">{{$item[2]}}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <caption>
                                        @if($order->status == 'annuler')
                                            Status de la commande: <span class=" text-red-600">Annulée*</span> <br>
                                            <span>*la commande à été annulée. Nous procédons dès que possible au remboursement</span>
                                        @endif
                                         <span class="fas fa-credit-card text-red-500 mx-2">  Total : {{FormatPrice($order->total / 100)}} </span> 
                                    </caption>
                                </tfoot>
                            </table>
                         </div>
                     </div>
                 @endforeach
                 @endif
            </div>
        </div>
    </div>
</x-app-layout>

