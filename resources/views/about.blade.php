@extends('layouts.app')

@section('title', 'À propos')

@section('styles')
<style>

.page-title{
    color:#FF2D20;
    font-size:36px;
    margin-bottom:15px;
}

.description{
    font-size:18px;
    line-height:1.7;
    color:#444;
}

.team-title{
    margin-top:40px;
    margin-bottom:20px;
}

.team-grid{
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
    gap:25px;
}

.team-card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    text-align:center;
    transition:transform 0.3s, box-shadow 0.3s;
}

.team-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
}

.team-card h3{
    margin-bottom:5px;
}

.team-card p{
    color:#666;
}

</style>
@endsection


@section('content')

<h1 class="page-title">{{ $titre }}</h1>

<p class="description">
{{ $description }}
</p>

<h2 class="team-title">Notre équipe</h2>

<div class="team-grid">

<div class="team-card">
<h3>Alice Martin</h3>
<p>CEO & Fondatrice</p>
</div>

<div class="team-card">
<h3>Bob Dupont</h3>
<p>Lead Developer</p>
</div>

<div class="team-card">
<h3>Claire Lefebvre</h3>
<p>Designer</p>
</div>

</div>

@endsection