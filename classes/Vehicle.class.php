<?php

class Vehicle{

    // Attributes
    private $id;
    private $model;
    private $builder;
    private $fuel;
    private $color;
    private $kilometer;
    private $immatriculation;
    private $technical_control;

    const FUEL_DIESEL = 'diesel';
    const FUEL_ESSENCE = 'essence';
    const FUEL_HYBRIDE = 'hybride';
    const FUEL_ELECTRIQUE = 'electrique';

    const VALID = 'valide';
    const INVALID = 'invalide';

    // Constructor
    public function __construct(){


        $this->setFuel(Vehicle::FUEL_ESSENCE);

        $this->setKilometer(0);
        $this->setTechnical_control(Vehicle::INVALID);
        // [[[[[[ compléter ci-dessus les autres attributs, voir le fichier read-table.png ]]]]]]
    }

    // Getters
        // [[[[[[ à compléter ]]]]]]

    // Setters
        // [[[[[[ à compléter ]]]]]]

    // Methods
    public function describe(){
        echo '
            <ul style="text-align: center;">
                <li>Modèle du véhicule: '.$this->getModel().'</li>
                <li>Immatriculation: '.$this->getImmatriculation().'</li>
                <li>Constructeur: '.$this->getBuilder().'</li>
                <li>Carburant: '.$this->getFuel().'</li>
                <li>Couleur: '.$this->getColor().'</li>
                <li>CT: '.$this->getTechnical_control().'</li>
                <li style="color: blue;">km: '.$this->getKilometer().'</li>
            </ul>
        ';
    }
    
    /**
     * Permet de compléter toutes les données de l'objet véhicule à partir d'un tableau associatif
     *
     * @param  mixed $tab un tableau associatif dont **les clés correspondent aux attributs de l'objet**
     * @return void
     */
    public function hydrate($tab){

        // [[[[[[ à compléter ]]]]]]

    }

}
