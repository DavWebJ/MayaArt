<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mail</title>
</head>
<body>
    <div>
    <h1>bonjour je m'appelle {{$contact->prenom}} {{$contact->name}}</h1> <br>
    <p style="color:black; font-size: 2em;">mon message: {{ $contact->message }}</p>
    <p style="color:black; font-size: 2em;">vous pouvez me joindre à cette adresse email: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p>
   @if ($contact->newsletter > 0)
        <p>je souhaite recevoir la newsletter</p>
        @else
         <p>je ne souhaite pas recevoir la newsletter</p>
   @endif
   

</div>
</body>
</html>
