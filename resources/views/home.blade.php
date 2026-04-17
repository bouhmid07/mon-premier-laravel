@extends('layouts.app')

@section('title', 'Accueil')

@section('styles')
<style>

.hero-title{
    color:#FF2D20;
    font-size:38px;
    margin-bottom:10px;
}

.hero-text{
    font-size:18px;
    color:#555;
}

.features{
    margin-top:40px;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

.features h2{
    margin-bottom:20px;
}

.features-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:20px;
}

.feature-card{
    background:#f9f9f9;
    padding:20px;
    border-radius:10px;
    text-align:center;
    border-top:4px solid #FF2D20;
    transition:transform 0.3s, box-shadow 0.3s;
}

.feature-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
}

</style>
@endsection


@section('content')

<h1 class="hero-title">Bienvenue sur Mon Site</h1>

<p class="hero-text">
Découvrez nos services et contactez-nous !
</p>

<div class="features">

<h2>Pourquoi nous choisir ?</h2>

<div class="features-grid">

<div class="feature-card">
Laravel Expertise
</div>

<div class="feature-card">
Support 24/7
</div>

<div class="feature-card">
Prix compétitifs
</div>

</div>

</div>

@endsection