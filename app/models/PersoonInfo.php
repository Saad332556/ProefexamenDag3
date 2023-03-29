<?php
class PersoonInfo
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPersoonInfo()
    {
        $this->db->query("SELECT `Voornaam`, `Tussenvoegsel`, `Achternaam`, `IsVolwassen`, `Mobiel`, `Email`, 'DatumAangemaakt' FROM `Persoon` INNER JOIN `Contact` ON Persoon.id = Contact.PersoonId ORDER BY `Achternaam` asc;");

        return $this->db->resultSet();;
    }

    public function getSinglePersoonInfo($id)
    {
        $this->db->query("SELECT `Voornaam`, `Tussenvoegsel`, `Achternaam`, `IsVolwassen`, `Mobiel`, `Email`, 'DatumAangemaakt' FROM `Persoon` INNER JOIN `Contact` ON Persoon.id = Contact.PersoonId WHERE `Id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

}
