<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objectifs d'épargne</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
            border-radius: 5px;
        }
        h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        .goals-list {
            list-style-type: none;
            padding: 0;
        }
        .goal-item {
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f5f7fa;
            border-left: 4px solid #3498db;
            border-radius: 3px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .goal-name {
            font-weight: 600;
            color: #2c3e50;
        }
        .goal-amount {
            font-weight: 600;
            color: #3498db;
            background-color: #eaf2f8;
            padding: 5px 10px;
            border-radius: 20px;
        }
        .no-goals {
            text-align: center;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 5px;
            color: #6c757d;
            font-style: italic;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
            padding-top: 20px;
            border-top: 1px solid #ecf0f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Objectifs d'épargne</h1>
        </div>
        
        @if(count($goals) > 0)
            <ul class="goals-list">
                @foreach($goals as $goal)
                    <li class="goal-item">
                        <span class="goal-name">{{ $goal->name }}</span>
                        <span class="goal-amount">{{ number_format($goal->target_amount, 2, ',', ' ') }} €</span>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="no-goals">
                <p>Aucun objectif d'épargne trouvé.</p>
            </div>
        @endif
        
        <div class="footer">
            <p>Document généré le {{ date('d/m/Y') }}</p>
        </div>
    </div>
</body>
</html>