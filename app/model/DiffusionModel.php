<?php
class DiffusionModel {
    private $bdd;
    private PDOStatement $getDiffusions;
    private PDOStatement $addDiffusion;
    private PDOStatement $delDiffusion;
    private PDOStatement $getDiffusion;

    public function __construct(PDO $bdd) {
        $this->bdd = $bdd;

     $this->getDiffusions = $this->bdd->prepare("SELECT * FROM `DIFFUSION` 
            WHERE `film_id` = :film_id;");

        $this->addDiffusion = $this->bdd->prepare("INSERT INTO `DIFFUSION` 
            (film_id, date_diffusion) VALUES(:film_id, :date_diffusion);");

        $this->delDiffusion = $this->bdd->prepare("DELETE FROM `DIFFUSION` 
            WHERE `id` = :id;");

        $this->getDiffusion = $this->bdd->prepare("SELECT * FROM `DIFFUSION` 
            WHERE `id` = :id;");
    }

    public function getDiffusions(int $film_id): array {
        $this->getDiffusions->bindValue("film_id", $film_id, PDO::PARAM_INT);
        $this->getDiffusions->execute();
        $rawDiffusions = $this->getDiffusions->fetchAll();

        $diffusionsEntity = [];
        foreach ($rawDiffusions as $rawDiffusion) {
            $diffusionsEntity[] = new DiffusionEntity(
                $rawDiffusion["film_id"],
                new DateTime($rawDiffusion["date_diffusion"]),
                $rawDiffusion["id"]
            );
        }

        return $diffusionsEntity;
    }

    public function addDiffusion(int $film_id, string $date_diffusion): void {
        $this->addDiffusion->bindValue("film_id", $film_id, PDO::PARAM_INT);
        $this->addDiffusion->bindValue("date_diffusion", $date_diffusion);
        $this->addDiffusion->execute();
    }

    public function delDiffusion(int $id): void {
        $this->delDiffusion->bindValue("id", $id, PDO::PARAM_INT);
        $this->delDiffusion->execute();
    }

    public function getDiffusion($id): DiffusionEntity | NULL {
        $this->getDiffusion->bindValue("id", $id, PDO::PARAM_INT);
        $this->getDiffusion->execute();
        $rawDiffusion = $this->getDiffusion->fetch();

        if (!$rawDiffusion) {
            return NULL;
        }

        return new DiffusionEntity(
            $rawDiffusion["film_id"],
            new DateTime($rawDiffusion["date_diffusion"]),
            $rawDiffusion["id"]
        );
    }
}

class DiffusionEntity {
    private $film_id;
    private $date_diffusion;
    private $id;

    function __construct(int $film_id, DateTime $date_diffusion, int $id = NULL) {
        $this->setFilmId($film_id);
        $this->setDateDiffusion($date_diffusion);
        $this->id = $id;
    }

    public function setFilmId(int $film_id) {
        $this->film_id = $film_id;
    }

    public function setDateDiffusion(DateTime $date_diffusion) {
        $this->date_diffusion = $date_diffusion;
    }

    public function getFilmId(): int {
        return $this->film_id;
    }

    public function getDateDiffusion(): DateTime {
        return $this->date_diffusion;
    }

    public function getId(): int {
        return $this->id;
    }
}