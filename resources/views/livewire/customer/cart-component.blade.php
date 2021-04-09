<div class="container-pannier">
    <div class="">
        <h2 class=" panier-title">Panier</h2>
    </div>
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
    <div class="row">
    
        <div class="bg-white col-lg-9">
            @if(Cart::count() > 0)
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="playfair py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark th-cart-border">Produit</th>
                            <th class="playfair py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark th-cart-border">Produit de base</th>
                            <th class="playfair py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark th-cart-border">Option</th>
                            <th class="playfair py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark th-cart-border">Quantité</th>
                            <th class="playfair py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark th-cart-border">Prix</th>
                            <th class="playfair py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark th-cart-border">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $item)
                            <tr class="hover:bg-grey-lighter tr-cart-borber">
                                <td class="py-4 px-6 tr-cart-borber"><a href="{{route('shop.show',['slug'=>$item->model->slug])}}">{{ $item->name }}</a></td>
                                <td class="py-4 px-6 tr-cart-borber"><figure><img src="{{ asset($item->model->vignette1) }}" alt=""></figure></td>
                                @if ($item->options)
                                    <td class="py-4 px-6 tr-cart-borber">{{$item->options->name_option }} supplément: {{ FormatPrice($item->options->option_price)}}</td>
                                @endif
                                <td class="py-4 px-6 tr-cart-border">
                                    <div class="d-flex justify-around">
                                        <button  wire:click="decrease('{{$item->rowId}}')" class="btn selection-number-button"><i class="fas fa-minus-circle text-black"></i></button>
                                        <input type="text" name="qty" value="{{ $item->qty }}"min="1" max="99" pattern="[0-9]*" readonly>                                        
                                        <button  wire:click="increase('{{$item->rowId}}')" class="btn selection-number-button"><i class="fas fa-plus-circle text-black"></i></button>                                      
                                    </div>
                                </td>
                                @if ($item->model->price_promos != 0)
                                     <td class="py-4 px-6 tr-cart-borber"> <del>{{ FormatPrice($item->model->price )}} </del> <span>{{ FormatPrice($item->model->price - $item->model->price_promos)}}</span></td>
                                @else
                                    <td class="py-4 px-6 tr-cart-borber"><span>{{ $item->model->FormatPrice()}}</span></td>
                                @endif
                                
                                <td class="py-4 px-6 tr-cart-borber">
                                    <button wire:click="remove('{{$item->rowId}}')" class="btn  cursor-pointer"><i class="fas fa-times-circle  text-red-600"></i></button>
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                    <div wire:loading wire:target="checkout" class=" vert-background py-2 px-2">
                        <p>Chargement....</p>  <!-- à changer design -->
                    </div>
            @else
                <div class="text-center w-full border-collapse p-6">
                    <span class="text-lg">Aucun produit dans votre panier</span>
                    <a class="vert-background" href="{{route('shop')}}">Faire des achats</a>
                </div>
            @endif
        </div>

        <div class="col-lg-3">
            <div class="resume-container">
                <div class="commande-resume"> 
                    <h3 class="commande-resume-title uppercase font-bold ">Résumé de votre commande</h3>
                    <p>Total HT :  {{FormatPrice(Cart::subtotal())}}</p>  <br>
                    <p class=" text-muted text-gray-700">*livraison offerte à partir de 50 € d'achat</p>
                </div>
                <div class="commande-pay">
                    <div class="flex justify-between commande-pay-total ">
                        <h3 class="commande-pay-title font-bold ">Total</h3>
                        <p class="font-bold playfair commande-pay-price"> {{ FormatPrice(Total()) }}</p>
                    </div>
                    @if (Cart::count() > 0) 
                        <button  wire:click="checkout" class="playfair commande-pay-button font-bold uppercase text-center">
                           Étape suivante
                        </button>
                    @endif
                    
                    
                </div>   

            </div>
        
        </div>
    </div>
</div>

