<?php

class ModelClients
{
    private $connection;
    private $requete;

    public function __construct()
    {
        define('SERVER', "xxx");
        define('USER', "xxx");
        define('PASSWORD', "xxx");
        define('BASE', "xxx");

        try {
            $this->connection = new PDO("mysql:host=".SERVER.";dbname=".BASE, USER, PASSWORD);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $this->connection->exec("SET CHARACTER SET utf8");
    }
    public function getList()
    {
        $this->requete="SELECT * FROM clients";
        $list = null;
        try {
            $resultat = $this->connection->query($this->requete);
            if ($resultat) {
                $list = $resultat->fetchAll(PDO::FETCH_NUM);
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $list;
    }
    public function add($parmForm)
    {
        $sql = 'INSERT INTO clients VALUES (null, :parm1, :parm2, :parm3, :parm4, :parm5, :parm6)';
        $this->requete = $this->connection->prepare($sql);
        $this->requete->bindParam(':parm1', $parmForm['parm1']);
        $this->requete->bindParam(':parm2', $parmForm['parm2']);
        $this->requete->bindParam(':parm3', $parmForm['parm3']);
        $this->requete->bindParam(':parm4', $parmForm['parm4']);
        $this->requete->bindParam(':parm5', $parmForm['parm5']);
        $this->requete->bindParam(':parm6', $parmForm['parm6']);
        $this->executeTryCatch();
    }
    public function update($parmForm)
    {
        $sql = 'UPDATE clients SET nom=:parm1, prenom=:parm2, adresse=:parm3, codePostal=:parm4, ville=:parm5, champCommentaire=:parm6 WHERE id=:parm0';
        $this->requete = $this->connection->prepare($sql);
        $this->requete->bindParam(':parm0', $parmForm['parm0']);
        $this->requete->bindParam(':parm1', $parmForm['parm1']);
        $this->requete->bindParam(':parm2', $parmForm['parm2']);
        $this->requete->bindParam(':parm3', $parmForm['parm3']);
        $this->requete->bindParam(':parm4', $parmForm['parm4']);
        $this->requete->bindParam(':parm5', $parmForm['parm5']);
        $this->requete->bindParam(':parm6', $parmForm['parm6']);
        $this->executeTryCatch();
    }
    public function delete($parmForm)
    {
        $sql = 'DELETE FROM clients WHERE id=:parm0';
        $this->requete = $this->connection->prepare($sql);
        $this->requete->bindParam(':parm0', $parmForm['parm0']);
        $this->executeTryCatch();
    }

    public function transfer($parmForm)
    {
        $sql = 'INSERT INTO prospect VALUES (null, :parm1, :parm2, :parm3, :parm4, :parm5, :parm6)';
        $this->requete = $this->connection->prepare($sql);
        $this->requete->bindParam(':parm1', $parmForm['parm1']);
        $this->requete->bindParam(':parm2', $parmForm['parm2']);
        $this->requete->bindParam(':parm3', $parmForm['parm3']);
        $this->requete->bindParam(':parm4', $parmForm['parm4']);
        $this->requete->bindParam(':parm5', $parmForm['parm5']);
        $this->requete->bindParam(':parm6', $parmForm['parm6']);
        

        // $sql = 'DELETE FROM prospect WHERE id=:parm0';
        // $this->requete = $this->connection->prepare($sql);
        // $this->requete->bindParam(':parm0', $parmForm['parm0']);
        $this->executeTryCatch();
    }
    
    private function executeTryCatch()
    {
        try {
            $this->requete->execute();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $this->requete->closeCursor();
    }
}