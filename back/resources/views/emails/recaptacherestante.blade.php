<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<h1 class="fs-4 mt-5">Voici le récapitulatif des tâches qu'il reste encore à effectuer:</h1>
@if (count($donneeTache)>0)
    
    <table class="table">
        <thead>
        <tr>
            <th scope="col">titre</th>
            <th scope="col">description</th>
            <th scope="col">status</th>
            <th scope="col">date et heure</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($donneeTache as $tache )
                
            <tr>
                <th scope="row">{{$tache['titre']}}</th>
                <td>{{$tache['description']}}</td>
                <td>{{$tache['status']}}</td>
                <td>{{$tache['created_at']}}</td>
            </tr>
            @endforeach
        

        </tbody>
    </table>
        
@else
<p>Il n'y pas de tâches à effectuer actuellement.</p>
    
@endif

<p>Cordialement,</p>

<p class="font-bold">Equide de gestion Entreprise</p>
</body>
</html>
