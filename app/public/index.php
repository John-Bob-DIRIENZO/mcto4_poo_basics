<pre>
<?php

use App\Classe\Magicien;
use App\Classe\Perso;

$dsn = 'mysql:host=db;dbname=' . $_ENV['MYSQL_DATABASE'];
$username = 'root';
$password = $_ENV['MYSQL_ROOT_PASSWORD'];

$pdo = new PDO($dsn, $username, $password);

$pdo->query('SELECT * FROM `jeux_video`');

$pdo->exec('UPDATE `jeux_video` SET `possesseur` = "Francis" WHERE `id` = 1');

$requete = 'SELECT * FROM `jeux_video` WHERE id = :id AND prix <= :prix';

$pdoStmt = $pdo->prepare($requete);

$pdoStmt->bindValue(':id', 1, PDO::PARAM_INT);
$pdoStmt->bindValue(':prix', 150, PDO::PARAM_INT);

$pdoStmt->execute();


while ($retour = $pdoStmt->fetch(PDO::FETCH_ASSOC)) {
    var_dump($retour);
}

//spl_autoload_register(function ($className) {
//    require $className . '.php';
//});

require './../vendor/autoload.php';

$francis = new Magicien(Perso::FORCE_MOYENNE, 14);
$maurice = new Magicien(Perso::FORCE_GRANDE);

$maurice->frapper($francis);
echo $francis->getDegats();

//echo Perso::getInstances();
echo '<hr>';
var_dump($_ENV["DATATEST"], $_ENV['MYSQL_ROOT_PASSWORD'], $_ENV['MYSQL_DATABASE']);

























