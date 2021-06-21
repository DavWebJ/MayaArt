@extends('layouts.master')

@section('title')
Informations et facturations
@endsection

@section('shipping')
<!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Informations requise</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="breadcrumb-item active">Facturation et livraison</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
 <!-- Checkout Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="section-title2">
                <h2 class="title">Informations de facturation</h2>
            </div>
            <form class="checkout-form learts-mb-50" action="{{route('billing.store')}}" id="form" data-select2-id="9" method="post">
                @csrf
                @method('post')
                @include('includes.errors')
                <div class="row">
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdFirstName">Prénom <abbr class="required">*</abbr></label>
                        <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                        @error('prenom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdLastName">Nom <abbr class="required">*</abbr></label>
                        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
                        @error('nom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdCountry">Pays<abbr class="required">*</abbr></label>
                        <select id="pays" class="select2-basic" name="pays" >
                            <option value="" selected style="display:none;">Selectionnez votre pays…</option>
                            <option value="Afghanistan">Afghanistan </option>
                            <option value="Afrique_Centrale">Afrique_Centrale </option>
                            <option value="Afrique_du_sud">Afrique_du_Sud </option>
                            <option value="Albanie">Albanie </option>
                            <option value="Algerie">Algerie </option>
                            <option value="Allemagne">Allemagne </option>
                            <option value="Andorre">Andorre </option>
                            <option value="Angola">Angola </option>
                            <option value="Anguilla">Anguilla </option>
                            <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                            <option value="Argentine">Argentine </option>
                            <option value="Armenie">Armenie </option>
                            <option value="Australie">Australie </option>
                            <option value="Autriche">Autriche </option>
                            <option value="Azerbaidjan">Azerbaidjan </option>

                            <option value="Bahamas">Bahamas </option>
                            <option value="Bangladesh">Bangladesh </option>
                            <option value="Barbade">Barbade </option>
                            <option value="Bahrein">Bahrein </option>
                            <option value="Belgique">Belgique </option>
                            <option value="Belize">Belize </option>
                            <option value="Benin">Benin </option>
                            <option value="Bermudes">Bermudes </option>
                            <option value="Bielorussie">Bielorussie </option>
                            <option value="Bolivie">Bolivie </option>
                            <option value="Botswana">Botswana </option>
                            <option value="Bhoutan">Bhoutan </option>
                            <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                            <option value="Bresil">Bresil </option>
                            <option value="Brunei">Brunei </option>
                            <option value="Bulgarie">Bulgarie </option>
                            <option value="Burkina_Faso">Burkina_Faso </option>
                            <option value="Burundi">Burundi </option>

                            <option value="Caiman">Caiman </option>
                            <option value="Cambodge">Cambodge </option>
                            <option value="Cameroun">Cameroun </option>
                            <option value="Canada">Canada </option>
                            <option value="Canaries">Canaries </option>
                            <option value="Cap_vert">Cap_Vert </option>
                            <option value="Chili">Chili </option>
                            <option value="Chine">Chine </option>
                            <option value="Chypre">Chypre </option>
                            <option value="Colombie">Colombie </option>
                            <option value="Comores">Colombie </option>
                            <option value="Congo">Congo </option>
                            <option value="Congo_democratique">Congo_democratique </option>
                            <option value="Cook">Cook </option>
                            <option value="Coree_du_Nord">Coree_du_Nord </option>
                            <option value="Coree_du_Sud">Coree_du_Sud </option>
                            <option value="Costa_Rica">Costa_Rica </option>
                            <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                            <option value="Croatie">Croatie </option>
                            <option value="Cuba">Cuba </option>

                            <option value="Danemark">Danemark </option>
                            <option value="Djibouti">Djibouti </option>
                            <option value="Dominique">Dominique </option>

                            <option value="Egypte">Egypte </option>
                            <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                            <option value="Equateur">Equateur </option>
                            <option value="Erythree">Erythree </option>
                            <option value="Espagne">Espagne </option>
                            <option value="Estonie">Estonie </option>
                            <option value="Etats_Unis">Etats_Unis </option>
                            <option value="Ethiopie">Ethiopie </option>

                            <option value="Falkland">Falkland </option>
                            <option value="Feroe">Feroe </option>
                            <option value="Fidji">Fidji </option>
                            <option value="Finlande">Finlande </option>
                            <option value="France">France </option>

                            <option value="Gabon">Gabon </option>
                            <option value="Gambie">Gambie </option>
                            <option value="Georgie">Georgie </option>
                            <option value="Ghana">Ghana </option>
                            <option value="Gibraltar">Gibraltar </option>
                            <option value="Grece">Grece </option>
                            <option value="Grenade">Grenade </option>
                            <option value="Groenland">Groenland </option>
                            <option value="Guadeloupe">Guadeloupe </option>
                            <option value="Guam">Guam </option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernesey">Guernesey </option>
                            <option value="Guinee">Guinee </option>
                            <option value="Guinee_Bissau">Guinee_Bissau </option>
                            <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                            <option value="Guyana">Guyana </option>
                            <option value="Guyane_Francaise ">Guyane_Francaise </option>

                            <option value="Haiti">Haiti </option>
                            <option value="Hawaii">Hawaii </option>
                            <option value="Honduras">Honduras </option>
                            <option value="Hong_Kong">Hong_Kong </option>
                            <option value="Hongrie">Hongrie </option>

                            <option value="Inde">Inde </option>
                            <option value="Indonesie">Indonesie </option>
                            <option value="Iran">Iran </option>
                            <option value="Iraq">Iraq </option>
                            <option value="Irlande">Irlande </option>
                            <option value="Islande">Islande </option>
                            <option value="Israel">Israel </option>
                            <option value="Italie">italie </option>

                            <option value="Jamaique">Jamaique </option>
                            <option value="Jan Mayen">Jan Mayen </option>
                            <option value="Japon">Japon </option>
                            <option value="Jersey">Jersey </option>
                            <option value="Jordanie">Jordanie </option>

                            <option value="Kazakhstan">Kazakhstan </option>
                            <option value="Kenya">Kenya </option>
                            <option value="Kirghizstan">Kirghizistan </option>
                            <option value="Kiribati">Kiribati </option>
                            <option value="Koweit">Koweit </option>

                            <option value="Laos">Laos </option>
                            <option value="Lesotho">Lesotho </option>
                            <option value="Lettonie">Lettonie </option>
                            <option value="Liban">Liban </option>
                            <option value="Liberia">Liberia </option>
                            <option value="Liechtenstein">Liechtenstein </option>
                            <option value="Lituanie">Lituanie </option>
                            <option value="Luxembourg">Luxembourg </option>
                            <option value="Lybie">Lybie </option>

                            <option value="Macao">Macao </option>
                            <option value="Macedoine">Macedoine </option>
                            <option value="Madagascar">Madagascar </option>
                            <option value="Madère">Madère </option>
                            <option value="Malaisie">Malaisie </option>
                            <option value="Malawi">Malawi </option>
                            <option value="Maldives">Maldives </option>
                            <option value="Mali">Mali </option>
                            <option value="Malte">Malte </option>
                            <option value="Man">Man </option>
                            <option value="Mariannes du Nord">Mariannes du Nord </option>
                            <option value="Maroc">Maroc </option>
                            <option value="Marshall">Marshall </option>
                            <option value="Martinique">Martinique </option>
                            <option value="Maurice">Maurice </option>
                            <option value="Mauritanie">Mauritanie </option>
                            <option value="Mayotte">Mayotte </option>
                            <option value="Mexique">Mexique </option>
                            <option value="Micronesie">Micronesie </option>
                            <option value="Midway">Midway </option>
                            <option value="Moldavie">Moldavie </option>
                            <option value="Monaco">Monaco </option>
                            <option value="Mongolie">Mongolie </option>
                            <option value="Montserrat">Montserrat </option>
                            <option value="Mozambique">Mozambique </option>

                            <option value="Namibie">Namibie </option>
                            <option value="Nauru">Nauru </option>
                            <option value="Nepal">Nepal </option>
                            <option value="Nicaragua">Nicaragua </option>
                            <option value="Niger">Niger </option>
                            <option value="Nigeria">Nigeria </option>
                            <option value="Niue">Niue </option>
                            <option value="Norfolk">Norfolk </option>
                            <option value="Norvege">Norvege </option>
                            <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                            <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                            <option value="Oman">Oman </option>
                            <option value="Ouganda">Ouganda </option>
                            <option value="Ouzbekistan">Ouzbekistan </option>

                            <option value="Pakistan">Pakistan </option>
                            <option value="Palau">Palau </option>
                            <option value="Palestine">Palestine </option>
                            <option value="Panama">Panama </option>
                            <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                            <option value="Paraguay">Paraguay </option>
                            <option value="Pays_Bas">Pays_Bas </option>
                            <option value="Perou">Perou </option>
                            <option value="Philippines">Philippines </option>
                            <option value="Pologne">Pologne </option>
                            <option value="Polynesie">Polynesie </option>
                            <option value="Porto_Rico">Porto_Rico </option>
                            <option value="Portugal">Portugal </option>

                            <option value="Qatar">Qatar </option>

                            <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                            <option value="Republique_Tcheque">Republique_Tcheque </option>
                            <option value="Reunion">Reunion </option>
                            <option value="Roumanie">Roumanie </option>
                            <option value="Royaume_Uni">Royaume_Uni </option>
                            <option value="Russie">Russie </option>
                            <option value="Rwanda">Rwanda </option>

                            <option value="Sahara Occidental">Sahara Occidental </option>
                            <option value="Sainte_Lucie">Sainte_Lucie </option>
                            <option value="Saint_Marin">Saint_Marin </option>
                            <option value="Salomon">Salomon </option>
                            <option value="Salvador">Salvador </option>
                            <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                            <option value="Samoa_Americaine">Samoa_Americaine </option>
                            <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                            <option value="Senegal">Senegal </option>
                            <option value="Seychelles">Seychelles </option>
                            <option value="Sierra Leone">Sierra Leone </option>
                            <option value="Singapour">Singapour </option>
                            <option value="Slovaquie">Slovaquie </option>
                            <option value="Slovenie">Slovenie</option>
                            <option value="Somalie">Somalie </option>
                            <option value="Soudan">Soudan </option>
                            <option value="Sri_Lanka">Sri_Lanka </option>
                            <option value="Suede">Suede </option>
                            <option value="Suisse">Suisse </option>
                            <option value="Surinam">Surinam </option>
                            <option value="Swaziland">Swaziland </option>
                            <option value="Syrie">Syrie </option>

                            <option value="Tadjikistan">Tadjikistan </option>
                            <option value="Taiwan">Taiwan </option>
                            <option value="Tonga">Tonga </option>
                            <option value="Tanzanie">Tanzanie </option>
                            <option value="Tchad">Tchad </option>
                            <option value="Thailande">Thailande </option>
                            <option value="Tibet">Tibet </option>
                            <option value="Timor_Oriental">Timor_Oriental </option>
                            <option value="Togo">Togo </option>
                            <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                            <option value="Tristan da cunha">Tristan de cuncha </option>
                            <option value="Tunisie">Tunisie </option>
                            <option value="Turkmenistan">Turmenistan </option>
                            <option value="Turquie">Turquie </option>

                            <option value="Ukraine">Ukraine </option>
                            <option value="Uruguay">Uruguay </option>

                            <option value="Vanuatu">Vanuatu </option>
                            <option value="Vatican">Vatican </option>
                            <option value="Venezuela">Venezuela </option>
                            <option value="Vierges_Americaines">Vierges_Americaines </option>
                            <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                            <option value="Vietnam">Vietnam </option>

                            <option value="Wake">Wake </option>
                            <option value="Wallis et Futuma">Wallis et Futuma </option>

                            <option value="Yemen">Yemen </option>
                            <option value="Yougoslavie">Yougoslavie </option>

                            <option value="Zambie">Zambie </option>
                            <option value="Zimbabwe">Zimbabwe </option>
                        </select>
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdAddress1">Adresse <abbr class="required">*</abbr></label>
                        <input type="text" id="adresse" name="adresse" placeholder="votre adresse" value="{{ old('adresse') }}"  required>
                        @error('adresse')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdAddress2" class="sr-only">Appartement, suite, unit etc. (facultatif)</label>
                        <input type="text" id="line2" name="line2" placeholder="Appartement, étage, escalier...">
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdTownOrCity">Ville <abbr class="required">*</abbr></label>
                        <input type="text" id="ville" name="ville" placeholder="votre ville"  value="{{ old('ville') }}" required>
                            @error('ville')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdPostcode">Code postal <abbr class="required">*</abbr></label>
                        <input type="text" id="zip" name="zip" pattern="[0-9]*" maxlength="5" placeholder="votre departement *****" value="{{ old('zip') }}" required>
                        @error('zip')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdEmail">Email <abbr class="required">*</abbr></label>
                        <input type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="{{ auth()->user()->email }}" readonly required>
                        @error('email')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            <div class="section-title2 my-2">
                <label class="rose-red" for="shipping">l'adresse de livraison est différente de l'adresse de facturation ?</label>
                     <input type="checkbox" class="shipping" name="ship_is_diff" id="shipping" value="0">
            </div>
            <div class="checkout-form learts-mb-50" id="shipping_container">
                <h2 class="title">Adresse de livraison </h2>
                @include('includes.errors')
                <div class="row">
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="prenom">Prénom <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_prenom" name="shp_prenom">
                        @error('shp_prenom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="nom">Nom <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_nom" name="shp_nom">
                        @error('shp_nom')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="pays">Pays<abbr class="required">*</abbr></label>
                        <select id="shp_pays" class="select2-basic" name="shp_pays">
                            <option value="" selected style="display:none;">Selectionnez votre pays…</option>
                            <option value="Afghanistan">Afghanistan </option>
                            <option value="Afrique_Centrale">Afrique_Centrale </option>
                            <option value="Afrique_du_sud">Afrique_du_Sud </option>
                            <option value="Albanie">Albanie </option>
                            <option value="Algerie">Algerie </option>
                            <option value="Allemagne">Allemagne </option>
                            <option value="Andorre">Andorre </option>
                            <option value="Angola">Angola </option>
                            <option value="Anguilla">Anguilla </option>
                            <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                            <option value="Argentine">Argentine </option>
                            <option value="Armenie">Armenie </option>
                            <option value="Australie">Australie </option>
                            <option value="Autriche">Autriche </option>
                            <option value="Azerbaidjan">Azerbaidjan </option>

                            <option value="Bahamas">Bahamas </option>
                            <option value="Bangladesh">Bangladesh </option>
                            <option value="Barbade">Barbade </option>
                            <option value="Bahrein">Bahrein </option>
                            <option value="Belgique">Belgique </option>
                            <option value="Belize">Belize </option>
                            <option value="Benin">Benin </option>
                            <option value="Bermudes">Bermudes </option>
                            <option value="Bielorussie">Bielorussie </option>
                            <option value="Bolivie">Bolivie </option>
                            <option value="Botswana">Botswana </option>
                            <option value="Bhoutan">Bhoutan </option>
                            <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                            <option value="Bresil">Bresil </option>
                            <option value="Brunei">Brunei </option>
                            <option value="Bulgarie">Bulgarie </option>
                            <option value="Burkina_Faso">Burkina_Faso </option>
                            <option value="Burundi">Burundi </option>

                            <option value="Caiman">Caiman </option>
                            <option value="Cambodge">Cambodge </option>
                            <option value="Cameroun">Cameroun </option>
                            <option value="Canada">Canada </option>
                            <option value="Canaries">Canaries </option>
                            <option value="Cap_vert">Cap_Vert </option>
                            <option value="Chili">Chili </option>
                            <option value="Chine">Chine </option>
                            <option value="Chypre">Chypre </option>
                            <option value="Colombie">Colombie </option>
                            <option value="Comores">Colombie </option>
                            <option value="Congo">Congo </option>
                            <option value="Congo_democratique">Congo_democratique </option>
                            <option value="Cook">Cook </option>
                            <option value="Coree_du_Nord">Coree_du_Nord </option>
                            <option value="Coree_du_Sud">Coree_du_Sud </option>
                            <option value="Costa_Rica">Costa_Rica </option>
                            <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                            <option value="Croatie">Croatie </option>
                            <option value="Cuba">Cuba </option>

                            <option value="Danemark">Danemark </option>
                            <option value="Djibouti">Djibouti </option>
                            <option value="Dominique">Dominique </option>

                            <option value="Egypte">Egypte </option>
                            <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                            <option value="Equateur">Equateur </option>
                            <option value="Erythree">Erythree </option>
                            <option value="Espagne">Espagne </option>
                            <option value="Estonie">Estonie </option>
                            <option value="Etats_Unis">Etats_Unis </option>
                            <option value="Ethiopie">Ethiopie </option>

                            <option value="Falkland">Falkland </option>
                            <option value="Feroe">Feroe </option>
                            <option value="Fidji">Fidji </option>
                            <option value="Finlande">Finlande </option>
                            <option value="France">France </option>

                            <option value="Gabon">Gabon </option>
                            <option value="Gambie">Gambie </option>
                            <option value="Georgie">Georgie </option>
                            <option value="Ghana">Ghana </option>
                            <option value="Gibraltar">Gibraltar </option>
                            <option value="Grece">Grece </option>
                            <option value="Grenade">Grenade </option>
                            <option value="Groenland">Groenland </option>
                            <option value="Guadeloupe">Guadeloupe </option>
                            <option value="Guam">Guam </option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernesey">Guernesey </option>
                            <option value="Guinee">Guinee </option>
                            <option value="Guinee_Bissau">Guinee_Bissau </option>
                            <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                            <option value="Guyana">Guyana </option>
                            <option value="Guyane_Francaise ">Guyane_Francaise </option>

                            <option value="Haiti">Haiti </option>
                            <option value="Hawaii">Hawaii </option>
                            <option value="Honduras">Honduras </option>
                            <option value="Hong_Kong">Hong_Kong </option>
                            <option value="Hongrie">Hongrie </option>

                            <option value="Inde">Inde </option>
                            <option value="Indonesie">Indonesie </option>
                            <option value="Iran">Iran </option>
                            <option value="Iraq">Iraq </option>
                            <option value="Irlande">Irlande </option>
                            <option value="Islande">Islande </option>
                            <option value="Israel">Israel </option>
                            <option value="Italie">italie </option>

                            <option value="Jamaique">Jamaique </option>
                            <option value="Jan Mayen">Jan Mayen </option>
                            <option value="Japon">Japon </option>
                            <option value="Jersey">Jersey </option>
                            <option value="Jordanie">Jordanie </option>

                            <option value="Kazakhstan">Kazakhstan </option>
                            <option value="Kenya">Kenya </option>
                            <option value="Kirghizstan">Kirghizistan </option>
                            <option value="Kiribati">Kiribati </option>
                            <option value="Koweit">Koweit </option>

                            <option value="Laos">Laos </option>
                            <option value="Lesotho">Lesotho </option>
                            <option value="Lettonie">Lettonie </option>
                            <option value="Liban">Liban </option>
                            <option value="Liberia">Liberia </option>
                            <option value="Liechtenstein">Liechtenstein </option>
                            <option value="Lituanie">Lituanie </option>
                            <option value="Luxembourg">Luxembourg </option>
                            <option value="Lybie">Lybie </option>

                            <option value="Macao">Macao </option>
                            <option value="Macedoine">Macedoine </option>
                            <option value="Madagascar">Madagascar </option>
                            <option value="Madère">Madère </option>
                            <option value="Malaisie">Malaisie </option>
                            <option value="Malawi">Malawi </option>
                            <option value="Maldives">Maldives </option>
                            <option value="Mali">Mali </option>
                            <option value="Malte">Malte </option>
                            <option value="Man">Man </option>
                            <option value="Mariannes du Nord">Mariannes du Nord </option>
                            <option value="Maroc">Maroc </option>
                            <option value="Marshall">Marshall </option>
                            <option value="Martinique">Martinique </option>
                            <option value="Maurice">Maurice </option>
                            <option value="Mauritanie">Mauritanie </option>
                            <option value="Mayotte">Mayotte </option>
                            <option value="Mexique">Mexique </option>
                            <option value="Micronesie">Micronesie </option>
                            <option value="Midway">Midway </option>
                            <option value="Moldavie">Moldavie </option>
                            <option value="Monaco">Monaco </option>
                            <option value="Mongolie">Mongolie </option>
                            <option value="Montserrat">Montserrat </option>
                            <option value="Mozambique">Mozambique </option>

                            <option value="Namibie">Namibie </option>
                            <option value="Nauru">Nauru </option>
                            <option value="Nepal">Nepal </option>
                            <option value="Nicaragua">Nicaragua </option>
                            <option value="Niger">Niger </option>
                            <option value="Nigeria">Nigeria </option>
                            <option value="Niue">Niue </option>
                            <option value="Norfolk">Norfolk </option>
                            <option value="Norvege">Norvege </option>
                            <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                            <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                            <option value="Oman">Oman </option>
                            <option value="Ouganda">Ouganda </option>
                            <option value="Ouzbekistan">Ouzbekistan </option>

                            <option value="Pakistan">Pakistan </option>
                            <option value="Palau">Palau </option>
                            <option value="Palestine">Palestine </option>
                            <option value="Panama">Panama </option>
                            <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                            <option value="Paraguay">Paraguay </option>
                            <option value="Pays_Bas">Pays_Bas </option>
                            <option value="Perou">Perou </option>
                            <option value="Philippines">Philippines </option>
                            <option value="Pologne">Pologne </option>
                            <option value="Polynesie">Polynesie </option>
                            <option value="Porto_Rico">Porto_Rico </option>
                            <option value="Portugal">Portugal </option>

                            <option value="Qatar">Qatar </option>

                            <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                            <option value="Republique_Tcheque">Republique_Tcheque </option>
                            <option value="Reunion">Reunion </option>
                            <option value="Roumanie">Roumanie </option>
                            <option value="Royaume_Uni">Royaume_Uni </option>
                            <option value="Russie">Russie </option>
                            <option value="Rwanda">Rwanda </option>

                            <option value="Sahara Occidental">Sahara Occidental </option>
                            <option value="Sainte_Lucie">Sainte_Lucie </option>
                            <option value="Saint_Marin">Saint_Marin </option>
                            <option value="Salomon">Salomon </option>
                            <option value="Salvador">Salvador </option>
                            <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                            <option value="Samoa_Americaine">Samoa_Americaine </option>
                            <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                            <option value="Senegal">Senegal </option>
                            <option value="Seychelles">Seychelles </option>
                            <option value="Sierra Leone">Sierra Leone </option>
                            <option value="Singapour">Singapour </option>
                            <option value="Slovaquie">Slovaquie </option>
                            <option value="Slovenie">Slovenie</option>
                            <option value="Somalie">Somalie </option>
                            <option value="Soudan">Soudan </option>
                            <option value="Sri_Lanka">Sri_Lanka </option>
                            <option value="Suede">Suede </option>
                            <option value="Suisse">Suisse </option>
                            <option value="Surinam">Surinam </option>
                            <option value="Swaziland">Swaziland </option>
                            <option value="Syrie">Syrie </option>

                            <option value="Tadjikistan">Tadjikistan </option>
                            <option value="Taiwan">Taiwan </option>
                            <option value="Tonga">Tonga </option>
                            <option value="Tanzanie">Tanzanie </option>
                            <option value="Tchad">Tchad </option>
                            <option value="Thailande">Thailande </option>
                            <option value="Tibet">Tibet </option>
                            <option value="Timor_Oriental">Timor_Oriental </option>
                            <option value="Togo">Togo </option>
                            <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                            <option value="Tristan da cunha">Tristan de cuncha </option>
                            <option value="Tunisie">Tunisie </option>
                            <option value="Turkmenistan">Turmenistan </option>
                            <option value="Turquie">Turquie </option>

                            <option value="Ukraine">Ukraine </option>
                            <option value="Uruguay">Uruguay </option>

                            <option value="Vanuatu">Vanuatu </option>
                            <option value="Vatican">Vatican </option>
                            <option value="Venezuela">Venezuela </option>
                            <option value="Vierges_Americaines">Vierges_Americaines </option>
                            <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                            <option value="Vietnam">Vietnam </option>

                            <option value="Wake">Wake </option>
                            <option value="Wallis et Futuma">Wallis et Futuma </option>

                            <option value="Yemen">Yemen </option>
                            <option value="Yougoslavie">Yougoslavie </option>

                            <option value="Zambie">Zambie </option>
                            <option value="Zimbabwe">Zimbabwe </option>
                        </select>
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="adresse">Adresse <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_adresse" name="shp_adresse" placeholder="4 rue de la couture">
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="appt" class="sr-only">Appartement, suite, unit etc. (facultatif)</label>
                        <input type="text" id="shp_line2" name="shp_line2" placeholder="Appartement, étage, escalier..." >
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="ville">Ville <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_ville" name="shp_ville"  placeholder="Paris">
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="zip">Code postal <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_zip" name="shp_zip"  pattern="[0-9]*" minlength="2" maxlength="5" >
                        @error('shp_zip')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="mail">Email <abbr class="required">*</abbr></label>
                        <input type="text" id="shp_email" name="email" value="{{ auth()->user()->email }}" placeholder="{{ auth()->user()->email }}" readonly >
                        @error('shp_email')
                            <span class="rose-red">{{ $message }}</span>
                        @enderror
                    </div>
                        </div>
                            </div>
                            
                                <button id="submit" class="btn btn-stripe mt-5" type="submit">
                                        <span id="button-text"> <i class="fas fa-credit-card px-2"></i> Procéder au paiement</span>
                                </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="container-pannier ">
    <div class="row justify-between">
        <section id="shipping" class="col-lg-8 h-100">
                <div class=" container-fluid">
                    <div class=" h-100" id="info-billing">
                        <h1 class="h1-payement">Informations de paiement</h4>

                        <h2 class="facturation-title">Adresse de facturation</h4>
                        @if ($shipping ?? '')
                        <form action="{{route('shipping.store')}}" method="post" class="form-payement">
                            @csrf
                            <div class="row justify-between">
                                <input class=" col-lg-5   input-payement" type="text" id="prenom" name="billing_prenom" placeholder="Prénom" value="{{$shipping->user->prenom}}">
                                <input class=" col-lg-5 input-payement" type="text" id="name" name="billing_name" placeholder="Nom" value="{{$shipping->user->name}}">
                            </div>
                            
                            <input class="input-payement"  type="text" id="adresse" name="billing_adress" placeholder="Adresse" required value="{{$shipping->billing_adress}}">
                            <div class="row justify-between">
                                <input class=" col-lg-5 input-payement" type="text" id="postal" name="billing_zip" placeholder="Code postal" required value="{{$shipping->billing_zip}}">
                                <input class=" col-lg-5 input-payement" type="text" id="ville" name="billing_city" placeholder="Ville" required value="{{$shipping->billing_city}}">
                            </div>
                            
                            
                        <h2 class="livraison-title">Adresse de livraison</h4>

                        <div class="row justify-between">
                            <input class="col-lg-5 input-payement" type="text" id="prenom" name="shipping_prenom" placeholder="Prénom" required value="{{$shipping->user->prenom}}">
                            <input class="col-lg-5 input-payement" type="text" id="name" name="shipping_name" placeholder="Nom" required value="{{$shipping->user->name}}">
                        </div>
                        <input class="input-payement" type="text" id="adresse" name="shipping_adress" placeholder="Adresse" required value="{{$shipping->shipping_adress}}">
                        <div class="row justify-between">
                            <input class="col-lg-5 input-payement" type="text" id="postal" name="shipping_zip" placeholder="Code postal" required value="{{$shipping->shipping_zip}}">
                            <input class="col-lg-5 input-payement" type="text" id="ville" name="shipping_city" placeholder="Ville" required value="{{$shipping->shipping_city}}">
                        </div>
                            
                            
                            
                            <button type="submit" class="playfair commande-payement-button font-bold uppercase text-center" name="billing">payer la commande</button>
                        </form>
                        @else

                        <form action="{{route('shipping.store')}}" method="post" class="form-payement">
                            @csrf
                            <div class="row justify-between">
                                <input class=" col-lg-5   input-payement" type="text" id="prenom" name="billing_prenom" placeholder="Prénom" >
                                <input class=" col-lg-5 input-payement" type="text" id="name" name="billing_name" placeholder="Nom" >
                            </div>
                            
                            <input class="input-payement"  type="text" id="adresse" name="billing_adress" placeholder="Adresse" required >
                            <div class="row justify-between">
                                <input class=" col-lg-5 input-payement" type="text" id="postal" name="billing_zip" placeholder="Code postal" required >
                                <input class=" col-lg-5 input-payement" type="text" id="ville" name="billing_city" placeholder="Ville" required >
                            </div>
                            
                            
                            <h2 class="livraison-title">Adresse de livraison</h4>

                            <div class="row justify-between">
                                <input class="col-lg-5 input-payement" type="text" id="prenom" name="shipping_prenom" placeholder="Prénom" required >
                                <input class="col-lg-5 input-payement" type="text" id="name" name="shipping_name" placeholder="Nom" required >
                            </div>
                            <input class="input-payement" type="text" id="adresse" name="shipping_adress" placeholder="Adresse" required>
                            <div class="row justify-between">
                                <input class="col-lg-5 input-payement" type="text" id="postal" name="shipping_zip" placeholder="Code postal" required >
                                <input class="col-lg-5 input-payement" type="text" id="ville" name="shipping_city" placeholder="Ville" required >
                            </div>
                                
                                
                                
                                <button type="submit" class="playfair commande-payement-button font-bold uppercase text-center" name="billing">payer la commande</button>
                        </form>
                        @endif
                    </div>
            </section>
            <section class="col-lg-3">
                <div class="resume-container">
                    <div class="commande-resume"> 
                        <h3 class="commande-resume-title uppercase font-bold ">Résumé de votre commande</h3>
                        @if (  IsFreeShipping() )
                        <p>Total TTC:  {{FormatPrice(Total())}}</p>  <br>
                        <span>frais de livraison : offert </span>
                                    
                        @else
                                    <span>Frais de livraison: {{FormatPrice(FraisDePort())}}</span> <br>
                                    <span>Sous Total: (hors frais de port): {{FormatPrice(Total())}}</span> <br>
                                    <p>Total TTC:  {{ FormatPrice(TotalTTC()) }}</p> 
                                    <p class=" text-muted text-gray-700">*livraison offerte à partir de 50 € d'achat</p>
                                    
                        @endif
                        
                    </div>
                    <div class="commande-pay">
                        <div class="flex justify-between commande-pay-total ">
                            <h3 class="commande-pay-title font-bold ">Total</h3>
                            @if (  IsFreeShipping()  )
                            <p class="font-bold playfair commande-pay-price"> {{FormatPrice(Total())}}</p>
                            @else
                            <p class="font-bold playfair commande-pay-price"> {{ FormatPrice(TotalTTC()) }}</p>
                            @endif
                        </div>

                        
                    </div>   
                </div>
        </section>

    </div>
</div>
<script>
    $(function () {
   
        let shipp = $('#shipping_container');
        shipp.hide();
        $("#shipping").on("click",function() {
            $("#shipping_container").toggle(this.checked);
            $("#shipping").val(this.checked)
        });

    });

</script>
@endsection