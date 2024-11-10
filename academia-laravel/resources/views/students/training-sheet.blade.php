<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ficha de Treino - {{ $student->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .texto{
            display: flex;
            flex-direction: row;
            padding: 3rem;
        }
        .tabela {
            width: 100%;
            border-collapse: collapse;
            background-color: #343a40;
            margin-top: 20px;
        }
        .tabela, th, td {
            border: 1px solid #CCFF33;
        }
        th, td {
            padding: 10px;
            text-align: center;
            color: white;
        }
        th { background-color: #CCFF33; color: #212529; }
        tr:nth-child(even) { background-color: #212529; }
    </style>
</head>
<body>
    
    <h1 style="text-align: center;">Academia Invictus</h1>
    <h2 style="text-align: center;">Ficha de Treino</h2>
    <h3 style="text-align: center;">Aluno: {{ $student->name }}</h3>
    
    @if ($dados && count($dados) > 0)
    <table class="tabela">
        <thead>
            <tr>
                <th>Exercício</th>
                <th>Repetições</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $exercicio)
            <tr>
                <td>{{ $exercicio['nome'] }}</td>
                <td>{{ $exercicio['quantidade_de_repeticoes'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2 style="text-align: center; color: red;">Nenhum Exercício Cadastrado</h2>
    @endif
</body>
</html>
