@extends('layouts.app')

@section('title', 'Contact')

@section('styles')
<style>

.contact-title{
    color:#FF2D20;
    margin-bottom:25px;
}

.contact-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:25px;
}

.contact-card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    border-left:5px solid #FF2D20;
    transition:transform 0.3s, box-shadow 0.3s;
}

.contact-card:hover{
    transform:translateY(-5px);
    box-shadow:0 12px 30px rgba(0,0,0,0.15);
}

.contact-card h3{
    margin-bottom:10px;
}

</style>
@endsection


@section('content')

<h1 class="contact-title">Contactez-nous</h1>

<div class="contact-grid">

<div class="contact-card">
<h3>Email</h3>
<p>{{ $contacts['email'] }}</p>
</div>

<div class="contact-card">
<h3>Téléphone</h3>
<p>{{ $contacts['telephone'] }}</p>
</div>

<div class="contact-card">
<h3>Adresse</h3>
<p>{{ $contacts['adresse'] }}</p>
</div>

</div>

@endsection