
<?php
class Diffusion {
    private int $id;
    private int $film_id;
    private DateTime $date_diffusion;

    public function __construct(int $film_id, DateTime $date_diffusion) {
        $this->film_id = $film_id;
        $this->date_diffusion = $date_diffusion;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getFilmId(): int {
        return $this->film_id;
    }

    public function getDateDiffusion(): DateTime {
        return $this->date_diffusion;
    }

    // Setters
    public function setFilmId(int $film_id): void {
        $this->film_id = $film_id;
    }

    public function setDateDiffusion(DateTime $date_diffusion): void {
        $this->date_diffusion = $date_diffusion;
    }
}
?>
