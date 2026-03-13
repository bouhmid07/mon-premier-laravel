<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; 
 
//controlleur
Route::get('/', [PageController::class, 'home']); 
 
Route::get('/about', [PageController::class, 'about']); 
 
Route::get('/contact', [PageController::class, 'contact']); 
 
Route::get('/services', [PageController::class, 'services']); 

Route::get('/blog', function () {

    $articles = [
        [
            'titre' => 'Article 1',
            'contenu' => 'Introduction à Laravel'
        ],
        [
            'titre' => 'Article 2',
            'contenu' => 'Comprendre les routes'
        ],
        [
            'titre' => 'Article 3',
            'contenu' => 'Créer des vues avec Blade'
        ]
    ];

    return view('blog', compact('articles'));
});

// Route 1 : Page d'accueil 
Route::get('/', function () { 
    return view('welcome'); 
}); 

// Route 2 : Page À propos 
//Route::get('/about', function () { 
   // return '<h1>À propos de nous</h1> 
           // <p>Nous sommes une équipe Laravel !</p>'; 
//}); 
 
 
// Route 3 : Contact 
//Route::get('/contact', function () { 
    //return '<h1>Contactez-nous</h1> 
  //          <p>Email : contact@laravel.com</p>'; 
//});
 
 
// Route 4 : Services 
//Route::get('/services', function () { 
   // return '<h1>Nos Services</h1> 
      //      <ul> 
          //      <li>Développement Web</li> 
               // <li>Applications Mobile</li> 
          //  </ul>';     
//});

// Route avec paramètre obligatoire 
Route::get('/utilisateur/{nom}', function ($nom) { 
    return "<h1>Profil de $nom</h1> 
            <p>Bienvenue sur votre page !</p>"; 
}); 

// Route avec deux paramètres 
Route::get('/article/{id}/{titre}', function ($id, $titre) { 
    return "<h1>Article #$id : $titre</h1>"; 
}); 

// Route avec paramètre optionnel 
Route::get('/bonjour/{nom?}', function ($nom = 'Visiteur') { 
return "<h1>Bonjour, $nom !</h1>"; 
}); 

// Route avec contrainte (seulement des chiffres) 
Route::get('/produit/{id}', function ($id) { 
return "<h1>Produit #$id</h1>"; 
})->where('id', '[0-9]+'); 

Route::get('/home', function () { 
    return view('home'); 
}); 
 
Route::get('/profil', function () { 
    return view('profil', [ 
        'nom'   => 'Alice', 
        'age'   => 25, 
        'ville' => 'Paris' 
        
    ]); 
}); 

//Route::get('/contact', function () {
 //   return view('contact');
//});



Route::get('/produits', function () { 
 
    $produits = [ 
        ['nom' => 'Ordinateur', 'prix' => 899], 
        ['nom' => 'Souris', 'prix' => 25], 
        ['nom' => 'Clavier', 'prix' => 65], 
        ['nom' => 'Écran', 'prix' => 299], 
    ]; 
 
    return view('produits', ['produits' => $produits]); 
}); 
 


Route::get('/calculer/{a}/{b}', function ($a, $b) {
    $somme = $a + $b;
    return "<h1>La somme de $a et $b est : $somme</h1>";
});

Route::get('/age/{age}', function ($age) {
    if ($age >= 18) {
        return "<h1>Vous êtes majeur</h1>";
    } else {
        return "<h1>Vous êtes mineur</h1>";
    }
});

Route::get('/equipe/{membre?}', function ($membre = null) {

    if ($membre) {
        return "<h1>Membre de l'équipe : $membre</h1>";
    } else {
        return "<h1>Toute l'équipe</h1>";
    }

});

