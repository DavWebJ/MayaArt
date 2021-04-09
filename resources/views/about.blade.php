@extends('layouts.app')
@section('title')
    qui suis je ?
@endsection
@section('meta')

@endsection
@section('about')
<div class="content-about">

    <div class=" relative w-full about-first-image" style="background: url({{asset('img/girly.jpg')}});">
        <h1 class="about-h1">QUI SUIS-JE ?</h1>
        <div class="absolute promotion-home-text"><p class="font-bold ">Livraison offerte à partir de 50 € d’achat </p></div>
    </div>

    <div class=" yellow-container row ">
        <div class="col-lg-6 col-sm-6 pr-10">
            <h2 class="about-title about-title-yellow uppercase ">Passé, égarée ?</h2>
            <p class="about-yellow-text">Je m'appelle Floriane, pas encore trentenaire mais on s'en approche ! Jusqu'à très peu de temps, j'ai toujours eu du mal à me définir. J'ai toujours essayé de rentrer dans les cases qu'on me proposait et qui semblaient être faites pour moi. Je faisais de mon mieux, mais rien à faire, je ne m'y sentais pas bien. J'ai changé de voie, plusieurs fois déjà. J'étais perdue.</p>
        </div>
        <div class="col-lg-6 col-sm-6 relative">
            <img class="tissu-1" src="{{asset('img/machine.jpg')}}" alt="">
        </div>
    </div>

    <h2 class="about-title about-title-yellow-mobile uppercase ">Passé, égarée ?</h2>
    <p class="about-yellow-text-mobile">Je m'appelle Floriane, pas encore trentenaire mais on s'en approche ! Jusqu'à très peu de temps, j'ai toujours eu du mal à me définir. J'ai toujours essayé de rentrer dans les cases qu'on me proposait et qui semblaient être faites pour moi. Je faisais de mon mieux, mais rien à faire, je ne m'y sentais pas bien. J'ai changé de voie, plusieurs fois déjà. J'étais perdue.</p>

    <div class=" orange-container row ">
        <div class="col-lg-6 col-sm-6 relative ">
            <img class="tissu-2" src="{{asset('img/image1.jpg')}}" alt="">
            <h2 class="about-title about-title-green uppercase">L'entrepreneuse</h2>
        </div>

        <div class="col-lg-6 col-sm-6 pl-10 relative">
            <h2 class="about-title about-title-orange uppercase mb-3">La reconnexion</h2>
            <p class="about-orange-text">Aujourd'hui le brouillard qui m'entourait disparaît peu à peu. L'année 2020 aura été riche et intense pour moi. Beaucoup de doutes, de remises en question. Elle m'aura appris à connaître l'essentiel, ce sur quoi je ne pouvais pas faire d'impasse pour me sentir bien. Je sais ce que je veux. J'ai besoin d'indépendance, de flexibilité et surtout j'ai besoin d'apporter ma pierre à l'édifice comme on dit ! Prendre soin de la Terre et de tous les êtres vivants qui l'habitent me semble être une priorité.
            </p>
        </div>
    </div>

    <div class=" green-container row mb-4">

        <div class="col-lg-8 pl-10 relative ">
            <h2 class="about-title about-title-green-mobile uppercase">L'entrepreneuse</h2>
            <p class="about-green-text">C'est donc avec ces idées en tête que L'atelier d'Efka voit le jour. J'essaye d'être la plus cohérente possible dans ma démarche, c'est d'ailleurs pour cette raison que j'ai choisi d'utiliser des tissus surcyclés. Je les achète près de chez moi dans des ressourceries (principalement Emmaüs) L'hébergeur du site pour lequel j'ai opté s'engage fortement en faveur de l'environnement, car la pollution numérique existe aussi, bien qu'elle ne soit pas palpable. Mon prochain objectif concerne les emballages.
            <br><br>
            Sinon vous vous demandez peut-être pourquoi Efka ? Ce sont mes initiales ! F.K.
            </p>
        </div>
    </div>


</div>
@endsection