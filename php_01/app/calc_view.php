<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_cr_amt">Podaj kwotę kredytu: </label>
	<input id="id_cr_amt" type="text" name="cr_amt" value="<?php isset($cr_amt)?print($cr_amt):''; ?>" /><br />
	<label for="id_years">Podaj liczbę lat: </label>
	<input id="id_years" type="text" name="years" value="<?php isset($years)?print($years):''; ?>" /><br />
	<label for="id_int_rate">Podaj oprocentowanie: </label>
	<input id="id_int_rate" type="text" name="int_rate" value="<?php isset($int_rate)?print($int_rate):''; ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.$result; ?>
</div>
<?php } ?>

</body>
</html>