<?php
$res = false;
if (!empty($_POST)) {
	if (is_numeric($_POST['a1']) && is_numeric($_POST['b1']) && is_numeric($_POST['a1']) && is_numeric($_POST['b2'])) {
		$real1 = $_POST['a1'];
		$imaginary1 = $_POST['b1'];
		$real2 = $_POST['a2'];
		$imaginary2 = $_POST['b2'];
		include $_SERVER['DOCUMENT_ROOT'] . '/complex.php';
		$res = true;
	} else {
		$error = 'Нужно заполните все поля, значения должны быть числами';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Complex numbers</title>
	    <style  type="text/css">
	    	.result {
	    		border-collapse: collapse;
	    	}
        	.result th, .result td {
            border: 1px solid grey;
        	}
    	</style>
</head>
<body>
	<div>Введите действительную и мнимую часть для двух чисел вида a+ib:</div>
	<?php if ($error) { ?>
		<samp style="color: red"><?=$error ?></samp>
	<?php } ?>
	<form action="" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="">
                    <label for="real1">a1:</label>
                    <input id="real1" size="20" name="a1" value="<?= ($_POST['a1'] ?? ''); ?>">
                </td>
            </tr>
            <tr>
                <td class="">
                    <label for="imaginary1">b1:</label>
                    <input id="imaginary1" size="20" name="b1" value="<?= ($_POST['b1'] ?? ''); ?>">
                </td>
            </tr>
            <tr>
                <td class="">
                    <label for="real2">a2:</label>
                    <input id="real2" size="20" name="a2" value="<?= ($_POST['a2'] ?? ''); ?>">
                </td>
            </tr>
            <tr>
                <td class="">
                    <label for="imaginary2">b2:</label>
                    <input id="imaginary2" size="20" name="b2" value="<?= ($_POST['b2'] ?? ''); ?>">
                </td>
            </tr>
                      
            <tr>
                <td><input type="submit" value="Вычислить"></td>
            </tr>
        </table>
    </form>
    <?php if ($res) { ?>
    	<table class="result">
            <thead>
                <tr>
                    <th>Вы ввели:</th>
                    <th>Алгебраическая форма</th>
                    <th>Тригонометрическая форма</th>
                </tr>               
            </thead>
            <tbody>
                <tr>
                    <td>1ое число:</td>
                    <td><samp><?= $showZ1['0']; ?></samp></td>
                    <td><samp><?= $showZ1['1']; ?></samp></td>
                </tr>
                <tr>
                    <td>2ое число:</td>
                    <td><samp><?= $showZ2['0']; ?></samp></td>
                    <td><samp><?= $showZ2['1']; ?></samp></td>
                </tr>
            </tbody>
    		<thead>
    			<tr>
    				<th class=>Результат:</th>
                    <th>Алгебраическая форма</th>
                    <th>Тригонометрическая форма</th>
                </tr>    			
    		</thead>
    		<tbody>
    			<tr>
    				<td>Сложение:</td>
    				<td><samp><?= $add['0']; ?></samp></td>
    				<td><samp><?= $add['1']; ?></samp></td>
    			</tr>
    			<tr>
    				<td>Вычетание:</td>
    				<td><samp><?= $diff['0']; ?></samp></td>
    				<td><samp><?= $diff['1']; ?></samp></td>
    			</tr>
    			<tr>
    				<td>Умножение:</td>
    				<td><samp><?= $multi['0']; ?></samp></td>
    				<td><samp><?= $multi['1']; ?></samp></td>
    			</tr>
    			<tr>
    				<td>Деление:</td>
    				<td><samp><?= $div['0']; ?></samp></td>
    				<td><samp><?= $div['1']; ?></samp></td>
    			</tr>
    		</tbody>
    	</table>
	<?php } ?>
</body>
</html>