<?php
require_once(__DIR__ . "/../controllers/DiffusionController.php");
require_once(__DIR__ . "/../controllers/FilmController.php");

class Router {
    private PDO $bdd;

    public function __construct(PDO $bdd) {
        $this->bdd = $bdd; //  on garde la connexion pour la passer aux contrôleurs
    }

    public function getController(string $controllerName): DiffusionController|FilmController {
        switch (strtolower($controllerName)) {
            case 'film':
                return new FilmController($this->bdd); 
            case 'diffusion':
                return new DiffusionController($this->bdd); 
            default:
                return new FilmController($this->bdd);
        }
    }
}


