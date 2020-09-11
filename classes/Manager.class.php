<?php

class Manager{

    // attributes
    private $db;

    const TABLE_NAME = 'vehicles';

    // constructor
    public function __construct(PDO $db){
        $this->setDb($db);
    }

    // setters
    public function setDb(PDO $db){
        $this->db = $db;
    }

    // methods
    public function createTable(){

        // [[[[[[ my addition ]]]]]]
        $create = $this->db->prepare('CREATE TABLE IF NOT EXISTS vehicles (
            id int(11) NOT NULL AUTO_INCREMENT,
            model varchar(80) NOT NULL,
            builder varchar(80) NOT NULL,
            fuel varchar(80) NOT NULL,
            color varchar(80) NOT NULL,
            kilometer int(11) NOT NULL,
            immatriculation varchar(16) NOT NULL,
            technical_control varchar(32) NOT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY immatriculation (immatriculation))
            ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $create->execute();

    }

    /**
     * Vérifie la présense de la table des véhicules dans la base de données
     *
     * @return boolean retourne *false* en cas d'absence
     */
    public function existTable(){

        return $this->db->query('DESCRIBE '.Manager::TABLE_NAME);

    }

    /**
     * Permet d'afficher le contenu de la table des véhicules
     *  - vérifie la présence de la table avec *existTable()*
     *
     * @return void
     */
    public function readTable(){

        if($this->existTable()){

            // [[[[[[ my addition ]]]]]]
            $read = $this-> db->prepare('SELECT * FROM '.Manager::TABLE_NAME.' ORDER BY id ASC;');
            $read -> execute();
            $tableau = $read -> fetchAll(PDO::FETCH_ASSOC);

        }
        else
            echo '<p style="text-align: center;">La table "'.Manager::TABLE_NAME.'" n\'existe pas</p>';
    }

    public function truncateTable(){

        // [[[[[[ my addition ]]]]]]

        if($this->existTable()){        

            $trunc = $this->db->prepare('TRUNCATE '.Manager::TABLE_NAME);
            $trunc -> execute();

        }
        else
            echo '<p style="text-align: center;">La table "'.Manager::TABLE_NAME.'" n\'existe pas</p>';
    }

    public function dropTable(){

        // [[[[[[ my addition ]]]]]]

        if($this->existTable()){        

            $shunt = $this->db->prepare('DROP TABLE '.Manager::TABLE_NAME);
            $shunt -> execute();

        }
        else
            echo '<p style="text-align: center;">La table "'.Manager::TABLE_NAME.'" n\'existe pas</p>';
    }

    /**
     * Permet d'ajouter une entrée dans la table des véhicules
     *
     * @param  Vehicle $vehicle un objet véhicule
     * @return void
     */
    public function create(Vehicle $vehicle){

        // [[[[[[ my addition ]]]]]]

        $sql =$this->db->prepare('INSERT INTO '.Manager::TABLE_NAME.' (model, builder, fuel, color, kilometer, immatriculation, technical_control) VALUES (:param1, :param2, :param3, :param4, :param5, :param6, :param7)');
        $sql->bindvalue(':param1', $vehicle->getModel());
        $sql->bindvalue(':param2', $vehicle->getBuilder());
        $sql->bindvalue(':param3', $vehicle->getFuel());
        $sql->bindvalue(':param4', $vehicle->getColor());
        $sql->bindvalue(':param5', $vehicle->getKilometer());
        $sql->bindvalue(':param6', $vehicle->getImmatriculation());
        $sql->bindvalue(':param7', $vehicle->getTechnical_control());
        $sql->execute();

    }

    /**
     * Permet de sélectionner la première entrée dans la table des véhicules
     *
     * @return Vehicle retourne un objet véhicule
     */
    public function selectFirst(){

        $sql = $this->db->prepare('SELECT * FROM '.Manager::TABLE_NAME.' LIMIT 1');

        // [[[[[[ my addition ]]]]]]
        $sql->execute();

    }

    /**
     * Permet de modifier une entrée dans la table des véhicules
     *
     * @param  Vehicle $vehicle un objet véhicule
     * @return void
     */
    public function update(Vehicle $vehicle){

        // [[[[[[ à compléter ]]]]]]

    }

    public function delete(Vehicle $vehicle){

        // [[[[[[ à compléter ]]]]]]
        $shunt2 = $this->db->prepare('DELETE FROM '.Manager::TABLE_NAME; 'WHERE id = 1');
            $shunt2 -> execute();

    }

    /**
     * Retourne la liste des véhicules d'un constructeur
     *  - classés par ordre croissant des modèles
     * 
     * @param  string $builder nom du constructeur (*Renault* par défaut)
     * @return array retourne une liste contenant des objets véhicules
     */
    public function listOfVehiclesByBuilder(string $builder = 'Renault'){

        // [[[[[[ my addition ]]]]]]
        $sql_build = $this->db->prepare('SELECT * FROM '.Manager::TABLE_NAME.' WHERE builder = '.$builder);
        $sql_build->execute();
        return array($sql_build);

    }

    /**
     * Retourne la liste des véhicules dont le contrôle technique est invalide
     * 
     * @return array retourne une liste contenant des objets véhicules
     */
    public function listOfInvalidVehicles(){

        // [[[[[[ my addition ]]]]]]
        $sql_inval = $this->db->prepare('SELECT * FROM '.Manager::TABLE_NAME.' WHERE technical_control = "invalide"');
        $sql_inval->execute();
        return array($sql_inval);
    }

    /**
     * Retourne la liste des véhicules essence
     * 
     * @return array retourne une liste contenant des objets véhicules
     */
    public function listOfGasolineVehicles(){

        // [[[[[[ my addition ]]]]]]
        $sql_inval = $this->db->prepare('SELECT * FROM '.Manager::TABLE_NAME.' WHERE fuel = "essence"');
        $sql_inval->execute();
        return array($sql_inval);

    }

    /**
     * Retourne la liste des véhicules par km
     *  - classés par ordre croissant des km
     * 
     * @param  int $kilometer nombre de km (0 par défaut)
     * @return array retourne une liste contenant des objets véhicules
     */
    public function listOfVehiclesByMoreKm(int $kilometer = 0){

        // [[[[[[ à compléter ]]]]]]
        $sql_km = $this-> db->prepare('SELECT * FROM '.Manager::TABLE_NAME.' ORDER BY kilometer ASC;');
        $sql_km -> execute();
        $tableau = $sql_km -> fetchAll(PDO::FETCH_ASSOC);

    }

}
