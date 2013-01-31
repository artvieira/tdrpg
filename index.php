<form id="form" method="post" action="?throwDice=true">
<label for="d4">D4</label>
<input type="radio" id="d4" name="dice" value="4">
<br />
<label for="d6">D6</label>
<input type="radio" id="d6" name="dice" value="6">
<br />
<label for="d8">D8</label>
<input type="radio" id="d8" name="dice" value="8">
<br />
<label for="d10">D10</label>
<input type="radio" id="d10" name="dice" value="10">
<br />
<label for="d12">D12</label>
<input type="radio" id="d12" name="dice" value="12">
<br />
<label for="d16">D16</label>
<input type="radio" id="d16" name="dice" value="16">
<br />
<label for="d20">D20</label>
<input type="radio" id="d20" name="dice" value="20">
<br />
<label for="d30">D30</label>
<input type="radio" id="d30" name="dice" value="30">
<br />
<label for="d100">D100</label>
<input type="radio" id="d100" name="dice" value="100">
<br />
<label for="qtd">Qtd.</label>
<input id="qtd" name="qtd" type="text" value="1">
<br />
<input type="submit" value="Throw Dice">
</form>

<?php
function _main() {
	session_start();
	
	$_SESSION['nameSession'] = randonNameSession();
	
	session_name(randonNameSession());
	echo session_name();
	
	if (isset($_GET['throwDice'])) {
		
		if (!isset($_POST['qtd'])) {
			echo "Quantidade está vazio!";
			return false;
		}
		
		if (!isset($_POST['dice'])) {
			echo "Escolha um tipo de dado!";
			return false;
		}
		
		for ($i=0;$i<$_POST['qtd'];$i++) {
			echo 'dado n'.($i+1).'<br />';
			echo mt_rand(0, $_POST['dice']).'<br />';
		}
	} 
}

function createSession() {
	
}

function randonNameSession() {
    $caracters = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $str = array();
    $length = strlen($caracters) - 1;
	
    for ($i = 0; $i < 12; $i++) {
        $n = mt_rand(0, $length);
        $str[] = $caracters[$n];
    }
	
    return implode($str);
}


_main();
?>