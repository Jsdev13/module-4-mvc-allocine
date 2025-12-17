<?php

class FilmModel {
    private PDO $bdd;
    
    private PDOStatement $addFilm;
    private PDOStatement $deleteFilm;
    private PDOStatement $getAllFilms;
    private PDOStatement $getFilmById;

    public function __construct(PDO $bdd) {
        $this->bdd = $bdd;

        $this->addFilm = $this->bdd->prepare("
            INSERT INTO `FILM` (titre, genre, auteur, date_sortie) 
            VALUES (:titre, :genre, :auteur, :date_sortie);
        ");

        $this->deleteFilm = $this->bdd->prepare("
            DELETE FROM `FILM` WHERE `id` = :id;
        ");

        $this->getAllFilms = $this->bdd->prepare("
            SELECT * FROM `FILM` LIMIT :limit;
        ");

        $this->getFilmById = $this->bdd->prepare("
            SELECT * FROM `FILM` WHERE id = :id;
        ");
    }

    public function addFilm(string $titre, string $genre, string $auteur, string $date_sortie): void {
        $this->addFilm->bindValue("titre", $titre);
        $this->addFilm->bindValue("genre", $genre);
        $this->addFilm->bindValue("auteur", $auteur);
        $this->addFilm->bindValue("date_sortie", $date_sortie);
        $this->addFilm->execute();
    }
    
    public function deleteFilm(int $id): void {
        $this->deleteFilm->bindValue("id", $id, PDO::PARAM_INT);
        $this->deleteFilm->execute();
    }

    public function getAllFilms(int $limit = 100): array {
        $this->getAllFilms->bindValue("limit", $limit, PDO::PARAM_INT);
        $this->getAllFilms->execute();
        return $this->getAllFilms->fetchAll(PDO::FETCH_ASSOC);
    }
   
    public function getFilmById(int $id): ?array {
        $this->getFilmById->bindValue("id", $id, PDO::PARAM_INT);
        $this->getFilmById->execute();
        $film = $this->getFilmById->fetch(PDO::FETCH_ASSOC);
        return $film ?: null;
    }
}

