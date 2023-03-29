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
        $this->db->query("SELECT `Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Aantalpunten` FROM `Spel` INNER JOIN `Persoon` ON Persoon.id = Spel.PersoonId INNER JOIN `Uitslag` ON Uitslag.id = Uitslag.SpelId;");

        return $this->db->resultSet();;
    }

    public function getSinglePersoonInfo($id)
    {
        $this->db->query("SELECT `Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Aantalpunten` FROM `Persoon` INNER JOIN `Spel` ON Persoon.id = Spel.PersoonId INNER JOIN `Uitslag` ON Spel.id = Uitslag.SpelId WHERE `Id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

}
