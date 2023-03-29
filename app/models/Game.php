<?php
class Game
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getGames()
    {
        $this->db->query("SELECT Spel.Id, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Aantalpunten` FROM `Spel` INNER JOIN `Persoon` ON Persoon.id = Spel.PersoonId INNER JOIN `Uitslag` ON Uitslag.SpelId = Spel.Id;");

        return $this->db->resultSet();;
    }

    public function getSingleGame($id)
    {
        $this->db->query("SELECT Spel.Id, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Aantalpunten` FROM `Spel` INNER JOIN `Persoon` ON Persoon.id = Spel.PersoonId INNER JOIN `Uitslag` ON Uitslag.SpelId = Spel.Id WHERE Spel.Id = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateGameScore($post)
  {
    $this->db->query("UPDATE `Spel` SET `Aantalpunten` = :aantalpunten WHERE `Id` = :id;");
    $this->db->bind(':aantalpunten', $post['Aantalpunten'], PDO::PARAM_INT);

    return $this->db->execute();
  }

}
