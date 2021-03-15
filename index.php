<?php

class Food {

    public $nome;
    public $genere;
    public $quantita;

    function __construct($nome, $genere, $quantita){

        $this -> nome = $nome;
        $this -> genere = $genere;
        $this -> quantita = $quantita;

    }


}

class Fridge {

    public $where;
    private $drawerTop = [];
    private $drawerMiddle = [];
    private $drawerBottom = [];
    


    function __construct($where){
        $this -> where = $where;
    }

    function addDrawerTop(Food $food){
        $this -> drawerTop[] = $food;
    }

    function addDrawerMiddle(Food $food){
        $this -> drawerMiddle [] = $food;
    }

    function addDrawerBottom(Food $food){
        $this -> drawerBottom [] = $food;
    }

    function getDrawerTop(){
        return $this -> drawerTop;
    }

    function getDrawerMiddle(){
        return $this -> drawerMiddle;
    }

    function getDrawerBottom(){
        return $this -> drawerBottom;
    }
}


$carote = new Food('carote', 'verdura', 10 );
$zucchine = new Food('zucchine', 'verdure', 3);
$carne = new Food ('bistecca', 'carne', 1);
$formaggio = new Food ('parmiggiano', 'formaggio', 1);
$uova = new Food ('uova', 'uova', 6);

$kitchenFridge = new Fridge('cucina');
$kitchenFridge -> addDrawerTop($uova);
$kitchenFridge -> addDrawerTop($formaggio);
$kitchenFridge -> addDrawerMiddle($carne);
$kitchenFridge -> addDrawerBottom($carote);
$kitchenFridge -> addDrawerBottom($zucchine);

print_r($kitchenFridge -> getDrawerTop() );
echo '<br>';
print_r($kitchenFridge -> getDrawerMiddle() );
echo '<br>';
print_r($kitchenFridge -> getDrawerBottom() );
echo '<br>';


foreach ($kitchenFridge -> getDrawerTop() as $key => $value) {
    echo $key . ' , ' . $value;
}
