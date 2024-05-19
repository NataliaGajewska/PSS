<?php 
include _ROOT_PATH.'/templates/top.php';
?>

<h3>Powtarzam to super fajny kalkulator</h2>

<form class="pure-form pure-form-stacked" action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">
	<fieldset>
		<label for="cr_amt">Kwota</label>
		<input id="cr_amt" type="text" placeholder="super kwota" name="cr_amt" value="<?php out($form['cr_amt']); ?>">
                <label for="year">Liczba lat</label>
		<input id="year" type="text" placeholder="super liczba lat" name="year" value="<?php out($form['year']); ?>">
                <label for="rate">Oprocentowanie</label>
		<input id="rate" type="text" placeholder="super malutkie oprocentowanie" name="rate" value="<?php out($form['rate']); ?>">

		
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz ratę miesięczną</button>
</form>

<div class="messages">

<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php
if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
	<h4>Wynik</h4>
	<p class="res">
<?php print($result); ?>
	</p>
<?php } ?>

</div>

<?php 
include _ROOT_PATH.'/templates/bottom.php';
?>