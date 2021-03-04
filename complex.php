<?php
/*
Класс для работы с комплексными числами принимает действительную и мнимую часть двух чисел.
Содержит методы:
сложения
вычетания
умножения
деления
представления в алгебраической форме
представления в геометрической форме
Результат округляется до 5го знака
*/
class ComplexNumber
{
	public $real1;
	public $imaginary1;
	public $real2;
	public $imaginary2;

	function __construct($real1, $imaginary1, $real2, $imaginary2)
	{
		$this->real1 = $real1;
		$this->imaginary1 = $imaginary1;
		$this->real2 = $real2;
		$this->imaginary2 = $imaginary2;
	}

	//Представление комплексного числа в алгебраической форме
	function algebraicForm($real, $imaginary)
	{	if ($real) {
			if ($imaginary > 0) {
				return round($real, 5) . '+' . (round($imaginary, 5) == 1 ? '' : round($imaginary, 5)) . "i";
			} else if ($imaginary < 0) {
				return round($real, 5) . (round($imaginary, 5) == -1 ? '-' : round($imaginary, 5)) . "i";
			} else {
				return round($real, 5);
			}
		} else {
			if ($imaginary) {
				switch ($imaginary) {
					case 1: return 'i';
					case -1: return '-i';
					default: return round($imaginary, 5) . 'i';
				}
			} else {
				return $imaginary;
			}
			
		}
	}

	//Представление комплексного числа в тригонометрической форме
	function trigonometricForm($real, $imaginary)
	{	
		$a = sqrt($real * $real + $imaginary * $imaginary);
		if ($real) {
			$psi = atan($imaginary/$real);
		} else {
			$psi = ($imaginary > 0 ? pi()/2 : -pi()/2);
		}
		$psi = round(rad2deg($psi));
		if ($psi <= 0) {
			return round($a, 5) . '(' . 'cos' . '(' . "$psi" . ')' . ' + ' . 'i ' . 'sin' . '(' . "$psi" . ')' . ')';
		}
		return round($a, 5) . '(' . 'cos' . "$psi" . ' + ' . 'i ' . 'sin' . "$psi" . ')';

	}

	//Вывод числа
	function show($real, $imaginary)
	{
		$result = [
			$this->algebraicForm($real, $imaginary),
			$this->trigonometricForm($real, $imaginary)
		];
		return $result;		
	}

	//Сложение
	function addition()
	{
		$real = $this->real1 + $this->real2;
		$imaginary = $this->imaginary1 + $this->imaginary2;
		return $this->show($real, $imaginary);
	}
	
	//Вычетание
	function diff()
	{
		$real = $this->real1 - $this->real2;
		$imaginary = $this->imaginary1 - $this->imaginary2;
		return $this->show($real, $imaginary);
	}

	//Умножение
	function multiplication()
	{
		$real = $this->real1 * $this->real2 - $this->imaginary1 * $this->imaginary2;
		$imaginary = $this->imaginary1 * $this->real2 + $this->real1 * $this->imaginary2;
		return $this->show($real, $imaginary);
	}

	//Деление
	function division()
	{
		$a = $this->real1;
		$b = $this->imaginary1;
		$c = $this->real2;
		$d = $this->imaginary2;
		if ($c * $c + $d * $d) {
			$real = ($a * $c + $b * $d) / ($c * $c + $d * $d);
			$imaginary = ($b * $c - $a * $d) / ($c * $c + $d * $d);
			$result = $this->show($real, $imaginary);
		} else {
			$result = ['Деление на ноль', 'Деление на ноль'];
		}
		return $result;
	}
}


$z = new ComplexNumber($real1, $imaginary1, $real2, $imaginary2);

$add = $z->addition();
$diff = $z->diff();
$multi = $z->multiplication();
$div = $z->division();

$showZ1 = $z->show($real1, $imaginary1);
$showZ2 = $z->show($real2, $imaginary2);