<?php

namespace App\Models;

class Livre {
    private $titre;
    private $auteur;
    private $anneePublication;

    public function __construct($titre, $auteur, $anneePublication) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->anneePublication = $anneePublication;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function getAnneePublication()
    {
        return $this->anneePublication;
    }

    public function displayInfos() {
        echo "Titre : " . $this->titre . "\n Auteur : " . $this->auteur . "\n Année de publication : " . $this->anneePublication . "\n";
    }
}