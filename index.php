<?php

$newName = $_GET['nome'];
$newGenere = $_GET['genere'];
$newQuantita =$_GET['quantita'];

var_dump($newName);
echo '<br>';
var_dump($newGenere);
echo '<br>';
var_dump($newQuantita);

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
$formaggio = new Food ('parmigiano', 'formaggio', 1);
$uova = new Food ('uova', 'uova', 6);

$kitchenFridge = new Fridge('cucina');
$kitchenFridge -> addDrawerTop($uova);
$kitchenFridge -> addDrawerTop($formaggio);
$kitchenFridge -> addDrawerMiddle($carne);
$kitchenFridge -> addDrawerBottom($carote);
$kitchenFridge -> addDrawerBottom($zucchine);





if ($newName != NULL && $newGenere != NULL && $newQuantita != NULL) {    
    
    $newFood = new Food($newName, $newGenere, $newQuantita);
    
    if ($newGenere === 'verdura') {
        
        $kitchenFridge -> addDrawerBottom($newFood);
    }

    if ($newGenere === "carne") {
        
        $kitchenFridge -> addDrawerMiddle($newFood);
    }

    if ($newGenere === "formaggio") {
        
        $kitchenFridge -> addDrawerTop($newFood);
    }

$cassettoTop = $kitchenFridge -> getDrawerTop();
$cassettoMiddle = $kitchenFridge -> getDrawerMiddle();
$cassettoBottom = $kitchenFridge -> getDrawerBottom();

}

print_r($kitchenFridge->getDrawerTop());
echo '<br>';
print_r($kitchenFridge->getDrawerMiddle());
echo '<br>';
print_r($kitchenFridge->getDrawerBottom());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>FRIGORIFERO AD OGGETTI</h1>
    <div class="container">
        <div class="cassetto-uno">
            <h3>Cassetto Alto</h2>
            <ul>
                <?php foreach ($cassettoTop as $key => $element){?>
                    <li><?php  echo  'n°' . ' ' . $element -> quantita . ' - ' . $element -> nome  ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="cassetto-due">
            <h3>Cassetto intermedio</h3>
            <ul>
                <?php foreach ($cassettoMiddle as $key => $element){?>
                    <li><?php  echo  'n°' . ' ' . $element -> quantita . ' - ' . $element -> nome  ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="cassetto-tre">
        <h3>Cassetto basso</h3>
            <ul>
                <?php foreach ($cassettoBottom as $key => $element){?>
                    <li><?php  echo  'n°' . ' ' . $element -> quantita . ' - ' . $element -> nome  ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class ="input">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
                        Che cibo vuoi: <input type="text" name="nome" >
                        Di che tipo è: <select name="genere" id="">
                            <option value="verdura">Verdura</option>
                            <option value="carne">Carne</option>
                            <option value="formaggio">Formaggio</option>
                        </select>
                        Quanto ne vuoi?<input type="number" name="quantita">
                        <input type="submit" name="submit" value="submit">
                    </form>
        </div>
    </div>
</body>
</html>