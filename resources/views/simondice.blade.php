<!-- resources/views/simon.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container mt-4 simoncito">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Juego de Simón Dice</h5>
        </div>
        <div class="card-body simonGame">
            <div id="circulo"></div>
            <div id="game-container">
                <div class="button" onclick="mostrarCirculo(event)" id="red"></div>
                <div class="button" onclick="mostrarCirculo(event)" id="green"></div>
                <div class="button" onclick="mostrarCirculo(event)" id="blue"></div>
                <div class="button" onclick="mostrarCirculo(event)" id="yellow"></div>
                <button id="start-button" class="btn btn-primary">PLAY</button>
                <div id="counter"></div>
                <audio src="https://s3.amazonaws.com/freecodecamp/simonSound1.mp3" id='audio' preload='auto'></audio>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/simondice.js') }}"></script>
@endsection