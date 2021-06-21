@extends('layouts.master')
@section('checkout')
<!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="images/bg/page-title-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Page de Paiement</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="breadcrumb-item active">Paiement</li>
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
            <form class="checkout-form learts-mb-50" action="{{ route('customer.paiement') }}" id="form" data-select2-id="9" method="post">
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

            <div class="section-title2">
                <h2 class="title">Adresse de livraison</h2>
            </div>
            <div class="checkout-form learts-mb-50">
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
                    <div class="form-check">
                        <input type="checkbox" class="form-control" name="ship_is_diff" id="ship_is_diff" value="0">
                        <label class="form-check-label" for="ship_is_diff">Adresse de livraison differente ?</label>
                    </div>
                </div>

            <div class="section-title2 text-center">
                <h2 class="title">Votre commande:</h2>
            </div>
            <div class="row learts-mb-n30">
                <div class="col-lg-6 order-lg-2 learts-mb-30">
                    <div class="order-review">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="name">Produit</th>
                                    <th class="total">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Cart::instance('cart')->count() > 0)
                                    @foreach (Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="name">{{ $item->model->name }} <strong class="quantity">×{{ $item->qty }}</strong></td>
                                        @if ($item->model->price_promos != 0)
                                        <td class="price product-info">
                                        <span class="price justify-content-end"><span class="old">{{ FormatPrice($item->model->price )}} </span><span class="new">{{ FormatPrice($item->model->price - $item->model->price_promos)}}</span></span>
                                        </td>
                                        @else
                                            <td class="total"><span>{{ FormatPrice($item->price) }}</span></td>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="name">
                                            vous n' avez aucuun  produit dans votre panier
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                            @if (Session::has('checkout'))
                                <tr class="subtotal">
                                    <th>Sous Total</th>
                                    <td><span>{{ FormatPrice(Session::get('checkout')['subtotal'] + Session::get('checkout')['discount']) }}</span></td>
                                </tr>
                                <tr class="subtotal">
                                    <th>Coupon de remise</th>
                                    @if (Session::get('checkout')['discount'] > 0)
                                        <td><span>- {{ FormatPrice(Session::get('checkout')['discount']) }}</span></td>
                                    @else
                                        <td><span>pas de coupon </span></td>
                                    @endif
                                </tr>
                                <tr class="subtotal">
                                    <th>Frais de livraison</th>
                                    @if(IsFreeShipping())
                                    <td><span class="amount"><i class="fas fa-gift lila fa-2x px-2"></i> Offert</span></td>
                                    @else
                                    <td><span class="amount">{{ FormatPrice(FraisDePort()) }}</span></td>
                                    @endif
                                </tr>
                                <tr class="total">
                                    <th>Total</th>
                                        <td><strong><span>{{ FormatPrice(Session::get('checkout')['total']) }}</span></strong></td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 learts-mb-30">
                    <div class="container">
                    <div class="creditCardForm">
                        <div class="heading my-2">
                            <h1>Informations de paiement</h1>
                        </div>
                        <div class="payment">
                <div class="form-group mt-4 mb-2" id="credit_cards" >
                        <img src="{{ asset('images/visa.jpg') }}" id="visa">
                        <img src="{{ asset('images/mastercard.jpg') }}" id="mastercard">
                        <img src="{{ asset('images/amex.jpg') }}" id="amex">
                    </div>
                    <div class="card willFlip" id="willFlip">
                    <div class="front">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <img src="{{ asset('css/card/card_bank.png') }}" width="50" style="filter: contrast(0)" height="50" alt="">
                                <img src="{{ asset('css/card/visa.png') }}" width="50" height="50" alt="">
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-group">
                                    <label for="card-n"></label>
                                    <input type="text" class="form-control animate__animated animate__bounce animate__duration-2s" disabled readonly id="card-n">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between bd-highlight mb-3">
                                <div class="col-md-6 card-holder-content">
                                    <div class="form-group">
                                        <label for="cardHolderValue">Titulaire de la carte</label>
                                        <input type="text" placeholder="Votre Nom" disabled class="cardHolder form-control animate__animated animate__bounce animate__duration-2s" id="cardHolderValue">
                                    </div>
                                </div>
                                <div class="col-md-3 card-expires-content">
                                    <div class="input-date">
                                        <label for="expiredMonth" class="text-right d-block">Expire le:</label>
                                        <div class="row content-date-input justify-content-end animate__animated animate__duration-2s animate__bounce">
                                            <input type="text" disabled class="cardHolder col-4 form-control" id="expiredMonth">
                                            <h4 class="mt-1 p-2 slash-text"> / </h4>
                                            <input type="text" disabled class="cardHolder col-4 form-control" id="expiredYear">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="back">
                        <div class="card-bar"></div>
                        <div class="card-body">
                            <div class="col-md-12  back-middle">
                                <div class="form-group">
                                    <label for="cardCcv" class="text-right d-block">CVC</label>
                                    <input type="password" disabled class="form-control" id="cardCcv">
                                </div>
                                <img src="{{ asset('css/card/visa.png') }}" class="float-right" width="50" height="50" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body mt-5">
                    <div class="form-group">
                        <label for="cardInput">Numero de carte</label>
                        <input required class="input card-input_field form-control" id="cardInput" autocomplete="off" name="card-n">
                    </div>
                    <div class="form-group">
                        <label for="cardHolder">Nom du titulaire de la carte</label>
                        <input required class="card-input_field form-control" id="cardHolder" autocomplete="off" name="titulaire">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="monthInput">Date d'expirations:</label>
                                <select required name="" class="form-control card-input_field" id="monthInput" name="mois">
                                    <option class="disabled" readonly>Mois</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="yearInput"></label>
                                <select required name="" class="form-control card-input_field mt-2" id="yearInput" name="annees">
                                    <option class="disabled" readonly>Années</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cwInput">CVC</label>
                                <input required type="text" class="form-control card-input_field" id="cwInput" autocomplete="off" name="cvc">
                            </div>
                        </div>
                    </div>
                        <div class="form-check my-2">
                            <input type="checkbox" class="form-check-input" name="cgv" id="cgv">
                            <label class="form-check-label" for="cgv">Vous devez accépter les *CGV pour procéder au paiement</label>
                            <a href="#">*Voir les conditions générales de vente</a>
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
    </div>
         @include('includes.card')
    <!-- Checkout Section End -->
    <script>
        $(function () {
            form.reset();
                    var $form = $(".stripe-payment");
                    $('form.stripe-payment').bind('submit', function (e) {
                        var $form = $(".stripe-payment"),
                            inputVal = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'
                            ].join(', '),
                            $inputs = $form.find('.required').find(inputVal),
                            $errorStatus = $form.find('div.error'),
                            valid = true;
                        $errorStatus.addClass('hide');

                        $('.has-error').removeClass('has-error');
                        $inputs.each(function (i, el) {
                            var $input = $(el);
                            if ($input.val() === '') {
                                $input.parent().addClass('has-error');
                                $errorStatus.removeClass('hide');
                                e.preventDefault();
                            }
                        });

                        if (!$form.data('cc-on-file')) {
                            e.preventDefault();
                            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                            Stripe.createToken({
                                number: $('.card-num').val(),
                                cvc: $('.card-cvc').val(),
                                exp_month: $('.card-expiry-month').val(),
                                exp_year: $('.card-expiry-year').val()
                            }, stripeRes);
                        }
                 });

            function stripeRes(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
             }
        });
    </script>
</div>
@endsection
