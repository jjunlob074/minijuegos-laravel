@extends('layouts.app')

@section('content')

<h2 style="text-align: center; margin-top: 120px; font-size:36px;">TOP10 Players Simon Dice</h2>

    <table>
        <thead>
            <tr>
                <th>Player</th>
                <th>Niveles Superados</th>
            </tr>
        </thead>
       
        <tbody>
            @foreach($topUsers as $user)
                <tr>
                    <td>{{ $user->user->name }}</td>
                    <td>{{ $user->points }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3 style = "text-align: center; margin-top:50px;">RECUERDA: ¡SÓLO LOS USUARIOS LOGUEADOS APARECEN EN ESTA TABLA! : )</h3>
@endsection
