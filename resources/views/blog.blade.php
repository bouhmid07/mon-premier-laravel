<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
    text-align:center;
}

.article{
    background:white;
    width:400px;
    margin:20px auto;
    padding:15px;
    border-radius:8px;
    box-shadow:0px 0px 8px gray;
}
</style>

</head>

<body>

<h1>Notre Blog</h1>

@foreach ($articles as $article)

<div class="article">

<h2>{{ $article['titre'] }}</h2>

<p>{{ $article['contenu'] }}</p>

</div>

@endforeach

</body>
</html>