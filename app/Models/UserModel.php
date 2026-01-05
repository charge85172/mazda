<?php
// models/UserModel.php

/**
 * Het UserModel is verantwoordelijk voor alle communicatie met de 'users' tabel in de database.
 * Denk aan het ophalen, aanmaken, of bijwerken van gebruikers.
 */
class UserModel
{

    /**
     * @var mysqli De databaseverbinding.
     */
    private $db;

    /**
     * De constructor maakt een nieuwe databaseverbinding.
     */
    public function __construct()
    {
        // Hier maken we een verbinding met de database.
        // Opmerking: de connectiegegevens staan nu nog hier,
        // maar later verplaatsen we die naar een centraal configuratiebestand.
        $this->db = new mysqli('127.0.0.1', 'root', '', 'mazda');

        // Stop het script als de verbinding mislukt.
        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    /**
     * Zoekt een gebruiker in de database op basis van zijn e-mailadres.
     *
     * @param string $email Het e-mailadres van de gebruiker.
     * @return array|null De gebruikersgegevens als array, of null als de gebruiker niet is gevonden.
     */
    public function findUserByEmail($email)
    {
        // Gebruik een prepared statement om SQL-injectie te voorkomen.
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // fetch_assoc() haalt de gevonden rij op als een associatieve array.
        return $result->fetch_assoc();
    }

    /**
     * Maakt een nieuwe gebruiker aan in de database.
     *
     * @param string $username De gekozen gebruikersnaam.
     * @param string $email Het e-mailadres van de gebruiker.
     * @param string $passwordHash De gehashte versie van het wachtwoord.
     * @return bool True als het aanmaken is gelukt, false als het is mislukt.
     */
    public function createUser($username, $email, $passwordHash)
    {
        // We stellen de standaardrol in op 'gebruiker'.
        $role = 'gebruiker';

        // Gebruik een prepared statement voor de INSERT query.
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $passwordHash, $role);

        // execute() geeft true terug als de query succesvol was.
        return $stmt->execute();
    }
}

?>
