@extends('layouts.app')

@section('title', 'Services')

@section('styles')
<style>

.services-title{
    color:#FF2D20;
    margin-bottom:25px;
}

.services-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.service{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    border-top:4px solid #FF2D20;
    transition:transform 0.3s, box-shadow 0.3s;
}

.service:hover{
    transform:translateY(-5px);
    box-shadow:0 12px 30px rgba(0,0,0,0.15);
}

.service h3{
    margin-bottom:10px;
}

.price{
    color:#444;
    font-weight:bold;
}

</style>
@endsection


@section('content')

<h1 class="services-title">Nos Services</h1>

<div class="services-grid">

@foreach ($services as $service)

<div class="service">
<h3>{{ $service['nom'] }}</h3>
<p class="price">Prix : {{ $service['prix'] }}</p>
</div>

@endforeach

</div>

@endsection