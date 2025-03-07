<!-- resources/views/pdf/goals.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objectifs d'épargne</title>
</head>
<body>
    <h1>Objectifs d'épargne</h1>

    @if(count($goals) > 0)
        <ul>
            @foreach($goals as $goal)
                <li>{{ $goal->name }} - {{ $goal->target_amount }}</li>
            @endforeach
        </ul>
    @else
        <p>Aucun objectif d'épargne trouvé.</p>
    @endif
</body>
</html>
