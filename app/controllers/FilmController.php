<?php

class FilmController {
    private FilmModel $filmModel;

    public function __construct(PDO $bdd) {
        $this->filmModel = new FilmModel($bdd); //  On passe la connexion PDO
        // $this->diffusionModel = new DiffusionModel($bdd);
    }

    public function list(): void {
        $films = $this->filmModel->getAllFilms(); //  méthode 
        require __DIR__ . '/../view/filmlist.php';
    }
    public function addFilm(): void {
    $this->create();
}

    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->filmModel->addFilm(
                $_POST['titre'],       //  correspondance avec FilmModel::addFilm
                $_POST['genre'],
                $_POST['auteur'],
                $_POST['date_sortie']
            );
            header('Location: /view/filmlist.php');
            exit;
        }
        require __DIR__ . '/../view/Addfilm.php';
    }

    public function detail(int $id): void {
        $film = $this->filmModel->getFilmById($id);
        require __DIR__ . '/../view/detail.php';
    }

    public function delete(int $id): void {
        $this->filmModel->deleteFilm($id);
        header('Location: /');
        exit;
    }

    // public function search(): void {
    //     $nom = $_GET['nom'] ?? '';
    //     $genre = $_GET['genre'] ?? '';
    //     $auteur = $_GET['auteur'] ?? '';
    //     $date_sortie = $_GET['date_sortie'] ?? '';

    //     //  à faire seulement si tu as implémenté FilmModel::search()
    //     $films = $this->filmModel->search($nom, $genre, $auteur, $date_sortie);
    //     require __DIR__ . '/../view/filmlist.php';
    // }
}
