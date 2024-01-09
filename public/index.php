<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Livre;

class Bibliotheque
{
    private $livres;

    public function __construct()
    {
        $this->livres = [];
    }

    public function ajouterLivre(Livre $livre)
    {
        $this->livres[] = $livre;
    }

    public function rechercher($motCle)
    {
        return array_filter($this->livres, function ($livre) use ($motCle) {
            return strpos(strtolower($livre->getTitre()), strtolower($motCle)) !== false;
        });
    }
}

// Création d'une instance de la classe Bibliotheque.
$bibliotheque = new Bibliotheque();

$bibliotheque->ajouterLivre(new Livre("Harry Potter", "J.K. Rowling", "1997"));
$bibliotheque->ajouterLivre(new Livre("Le Seigneur des Anneaux", "J.R.R. Tolkien", "1954"));
$bibliotheque->ajouterLivre(new Livre("1984", "George Orwell", "1949"));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];

    $nouveauLivre = new Livre($titre, $auteur, $anneePublication);

    $bibliotheque->ajouterLivre($nouveauLivre);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
</head>

<body>

    <h1>Bibliothèque</h1>

    <!-- Formulaire d'ajout de livre -->
    <form method="post" action="">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required>

        <label for="auteur">Auteur :</label>
        <input type="text" id="auteur" name="auteur" required>

        <label for="titre">Année de publication :</label>
        <input type="text" id="titre" name="titre" required>

        <button type="submit">Ajouter Livre</button>
    </form>

    <!-- Liste des livres -->
    <h2>Liste des livres</h2>
    <ul>
        <?php foreach ($bibliotheque->rechercher('') as $livre) : ?>
            <li><?= $livre->getTitre() ?> par <?= $livre->getAuteur() ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>