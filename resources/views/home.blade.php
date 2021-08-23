<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messagerie</title>
</head>
<body>
    <h1>Messagerie</h1>

    <h2>Liste des messages</h2>

    @if(!count($messages))
    <p>Aucun message pour le moment</p>
    @else
    <table>
        <thead>
            <tr>
                <th>Date ||</th> 
                <th>Auteur ||</th>
                <th>Texte</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $msge)
                <tr>
                    <td>{{ $msge->created_at->toDateTimeString()}}</td>
                    <td> {{$msge->author_name}} </td>
                    <td> {{$msge->content}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    <h2>Poster un nouveau message</h2>

    <form  method="post">
        {{csrf_field()}}
        <label for="name">Nom de l auteur: </label>
        <input type="text" name="author_name" id="name" required>
        <br>
        <label for="content">Le message: </label>
        <textarea name="content" id="name" ></textarea>
        <br>
        
        <input type="submit" value="Envoyer le message">

    </form>
</body>
</html>