<!DOCTYPE html> 
<html lang="fr"> 
   <head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Mon Premier Laravel</title> 
 
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            padding: 50px; 
            background: linear-gradient(135deg, #764ba2 100%); 
            color: white; 
        } 
 
        h1 { 
            font-size: 48px; 
            margin-bottom: 20px; 
        } 
 
        p { 
            font-size: 20px; 
        } 
 
        .container { 
            max-width: 800px; 
            margin: 0 auto; 
            background: rgba(255, 255, 255, 0.1); 
            padding: 40px; 
            border-radius: 10px; 
        } 
    </style> 
</head> 
 
<body> 
    <div class="container"> 
        <h1>� Bienvenue sur Mon Premier Laravel !</h1> 
 
        <p>Vous avez réussi à installer et configurer Laravel.</p> 
 
        <p>Version Laravel : {{ app()->version() }}</p> 
 
        <p>Date actuelle : {{ date('d/m/Y H:i:s') }}</p> 
    </div> 
</body> 
</html> 