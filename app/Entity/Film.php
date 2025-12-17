<?php
class Film {
    private int $id;
    private string $titre;
    private string $genre;
    private string $auteur;
    private DateTime $date_sortie;

    public function __construct(int $id, string $titre, string $genre, string $auteur, DateTime $date_sortie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->genre = $genre;
        $this->auteur = $auteur;
        $this->date_sortie = $date_sortie;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getGenre(): string {
        return $this->genre;
    }

    public function getAuteur(): string {
        return $this->auteur;
    }

    public function getDateSortie(): DateTime {
        return $this->date_sortie;
    }

    
    // Setters
    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function setGenre(string $genre): void {
        $this->genre = $genre;
    }

    public function setAuteur(string $auteur): void {
        $this->auteur = $auteur;
    }

    public function setDateSortie(DateTime $date_sortie): void {
        $this->date_sortie = $date_sortie;
    }
}
?>

