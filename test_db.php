<?php

require 'models/database.php';

echo "Connexion en cours...\n";

$pdo = getPDO();

echo "Connexion OK ✅\n";

$request = $pdo->query("SELECT username FROM users LIMIT 1");
$user = $request->fetch(PDO::FETCH_ASSOC);

echo "Utilisateur trouvé : " . $user['username'] . "\n";
