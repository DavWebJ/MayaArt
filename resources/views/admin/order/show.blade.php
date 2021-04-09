@extends('layouts.admin')

@section('admin.order.show')
      <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Retour au dashboard</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('order.index') }}">Retour à la liste des commandes</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    <section class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Commandes N°: {{$order->transaction_id}}</h4> <br>
                    <input type="hidden" name="id" id="id" value="{{$order->id}}">
                    <span> passer il y a {{ \Carbon\Carbon::parse($order->order_at)->diffForHumans() }}</span>
                </div>
                <div class="card-body">
                    <h2 class=" font-bold text-gray-500 text-3xl text-center">Informations du client</h2><hr>
                    <div class="flex justify-between">
                        <div id="infos_facture" class="flex flex-col ml-5 bg-yellow-300">
                            <h5> Informations de facturation :</h5>
                            <p>Nom du client: <span class="mx-2"> {{$order->user->name}}</span></p>
                            <p>Prénom : <span class="mx-2">{{$order->user->prenom}}</span></p>
                            <p>Email <span class="mx-2"> {{$order->user->email}}</span></p>
                            <p>Adresse <span class="mx-2">{{$shipping->billing_adress}}</span></p>
                            <p>Ville <span class="mx-2">{{$shipping->billing_city}}</span></p>
                            <p>Code postal <span class="mx-2"> {{$shipping->billing_zip}}</span></p>
                        </div>
                        <div id="infos_livraison" class="flex flex-col mr-5 bg-green-300">
                            <h5>Informations de livraison:</h5>
                            <p>Nom du client :<span class="mx-2"> {{$order->user->name}}</span></p>
                            <p>Prénom :  <span class="mx-2">{{$order->user->prenom}}</span></p>
                            <p>Email : <span class="mx-2"> {{$order->user->email}}</span></p>
                            <p>Adresse :  <span class="mx-2">{{$shipping->billing_adress}}</span></p>
                            <p>Ville :  <span class="mx-2">{{$shipping->billing_city}}</span></p>
                            <p>Code postal :  <span class="mx-2"> {{$shipping->billing_zip}}</span></p>
                        </div>
                    </div>
                    <hr class=" text-blue-600 my-2">
                    <div class=" bg-red-300">
                        <h2 class=" font-bold text-gray-700 text-3xl text-center">Détails de la commande</h2><hr>
                         <div id="detail_produit" class="flex bg-red-300 justify-center">
                            @foreach (unserialize($order->products) as $item)
                                <span class="mx-2">{{$item[0]}}</span>
                                <span class="mx-2">X {{$item[2]}}</span>
                                <span class="mx-2">Prix unitaire: {{ formatPrice($item[1]) }}</span> <br>
                            @endforeach
                            <span class="mx-2">Total: <span class="font-bold text-gray-800">{{FormatPrice($order->total / 100)}} </span></span>
                         </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <span>Statut de la commande: <i class="text-green-500 font-semibold">{{$order->status}}</i> </span>
                    </div>
                    <div class="flex justify-between">
                        <select name="status" id="status" class="form-control">
                            <option value="" selected display="none">Changer le statut de la commande</option>
                            <option value="en cours">Prise en compte</option>
                            <option value="preparer">Préparée</option>
                            <option value="expedier">Expediée</option>
                            <option value="annuler">Annulée</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
    $('select').on('change',function (e) { 
        //e.preventDefault();
        let id = $('#id').val();
        let status = this.value;
            $.ajaxSetup({
                 // make the header special laravel for ajax request don't delete this part !
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        $.ajax({
            url: '/change/status',
            type: "POST",
            data: {
                id:id,
                status: status,

            },
            
            success: function (response) {
         
                window.location.href ='/admin/order';
                
                
            }
        });
        
    });
    });

</script>
@endsection
