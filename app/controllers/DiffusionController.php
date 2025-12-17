<?php
require_once(__DIR__ . '/../model/DiffusionModel.php');
require_once(__DIR__ . '/../model/FilmModel.php'); 


class DiffusionController {
    private DiffusionModel $diffusionModel;
    private FilmModel $filmModel; 

    public function __construct(PDO $bdd) {
        // on passe la connexion PDO à chaque modèle
        $this->diffusionModel = new DiffusionModel($bdd);
        $this->filmModel = new FilmModel($bdd);
    }   

    /**
     * Crée une nouvelle diffusion pour un film
     */
    public function create(int $film_id): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // ajout en base
            $this->diffusionModel->addDiffusion(
                $film_id,
                $_POST['date_diffusion']
            );

            // redirection après ajout
            header('Location: /view/' . $film_id);
            exit;
        }

        // si on arrive en GET → afficher le formulaire
        $film = $this->filmModel->get($film_id);
        require __DIR__ . '/../view/AddDiffusion.php';
    }

    /**
     * Supprime une diffusion
     */
    public function delete(int $id): void {
        $diffusion = $this->diffusionModel->getDiffusion($id);

        if (!$diffusion) {
            http_response_code(404);
            exit("Diffusion introuvable");
        }

        $film_id = $diffusion->getFilmId();

        $this->diffusionModel->delDiffusion($id);

        // redirection vers la page du film
        header('Location: /view/' . $film_id);
        exit;
    }
}


