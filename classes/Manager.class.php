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

        // [[[[[[ à compléter ]]]]]]

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

            // [[[[[[ à compléter ]]]]]]

        }
        else
            echo '<p style="text-align: center;">La table "'.Manager::TABLE_NAME.'" n\'existe pas</p>';
    }

    public function truncateTable(){

        // [[[[[[ à compléter ]]]]]]

    }

    public function dropTable(){

        // [[[[[[ à compléter ]]]]]]

    }

    /**
     * Permet d'ajouter une entrée dans la table des véhicules
     *
     * @param  Vehicle $vehicle un objet véhicule
     * @return void
     */
    public function create(Vehicle $vehicle){

        // [[[[[[ à compléter ]]]]]]

    }

    /**
     * Permet de sélectionner la première entrée dans la table des véhicules
     *
     * @return Vehicle retourne un objet véhicule
     */
    public function selectFirst(){

        $sql = $this->db->prepare('SELECT * FROM '.Manager::TABLE_NAME.' LIMIT 1');

        // [[[[[[ à compléter ]]]]]]

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

    }

    /**
     * Retourne la liste des véhicules d'un constructeur
     *  - classés par ordre croissant des modèles
     * 
     * @param  string $builder nom du constructeur (*Renault* par défaut)
     * @return array retourne une liste contenant des objets véhicules
     */
    public function listOfVehiclesByBuilder(string $builder = 'Renault'){

        // [[[[[[ à compléter ]]]]]]

    }

    /**
     * Retourne la liste des véhicules dont le contrôle technique est invalide
     * 
     * @return array retourne une liste contenant des objets véhicules
     */
    public function listOfInvalidVehicles(){

        // [[[[[[ à compléter ]]]]]]

    }

    /**
     * Retourne la liste des véhicules essence
     * 
     * @return array retourne une liste contenant des objets véhicules
     */
    public function listOfGasolineVehicles(){

        // [[[[[[ à compléter ]]]]]]

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

    }

}
