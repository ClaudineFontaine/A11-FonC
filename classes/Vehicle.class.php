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

        // [[[[[[ my addition, cf read-table.png ]]]]]]
        $this->setId(0);
        // $this->setModel('modèle');
        // $this->setBuilder('constructeur');
        // $this->setColor('couleur');
        // $this->setImmatriculation('immatriculation');
        // NB: The last 4 lines were neutralised because they impeded code execution

    }

    // Getters

        public function getId()
        {return $this->id;}

        // [[[[[[ my addition ]]]]]]
        public function getModel()
        {return $this->model;}

        public function getBuilder()
        {return $this->builder;}

        public function getFuel()
        {return $this->fuel;}

        public function getColor()
        {return $this->color;}

        public function getKilometer()
        {return $this->kilometer;}

        public function getImmatriculation()
        {return $this->immatriculation;}

        public function getTechnical_control()
        {return $this->technical_control;}

    // Setters
        // [[[[[[ my addition ]]]]]]

        public function setId(int $Id)
        {$this->id = $Id;}

        public function setModel(string $Model)
        {$this->model = $Model;}

        public function setBuilder(string $Builder)
        {$this->builder = $Builder;}

        public function setFuel(string $Fuel)
        {$this->fuel = $Fuel;}

        public function setColor(string $Color)
        {$this->color = $Color;}

        public function setKilometer(int $Kilometer)
        {$this->kilometer = $Kilometer;}

        public function setImmatriculation(string $Immatriculation)
        {$this->immatriculation = $Immatriculation;}

        public function setTechnical_control(string $Technical_control)
        {$this->technical_control = $Technical_control;}

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

        // [[[[[[ my addition ]]]]]]

        if (isset($tab["id"]) && !empty($tab["id"]))
            {$this->setId($tab["id"]);}

        if (isset($tab["model"]) && !empty($tab["model"]))
            {$this->setModel($tab["model"]);}

        if (isset($tab["builder"]) && !empty($tab["builder"]))
            {$this->setBuilder($tab["builder"]);}

        if (isset($tab["fuel"]) && !empty($tab["fuel"]))
            {$this->setFuel($tab["fuel"]);}

        if (isset($tab["color"]) && !empty($tab["color"]))
            {$this->setColor($tab["color"]);}

        if (isset($tab["kilometer"]) && !empty($tab["kilometer"]))
            {$this->setKilometer($tab["kilometer"]);}

        if (isset($tab["immatriculation"]) && !empty($tab["immatriculation"]))
            {$this->setImmatriculation($tab["immatriculation"]);}

        if (isset($tab["technical_control"]) && !empty($tab["technical_control"]))
            {$this->setTechnical_control($tab["technical_control"]);}

    }

}
