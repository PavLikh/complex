<?php

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

	function trigonometricForm($real, $imaginary)
	{	
		$a = sqrt($real * $real + $imaginary * $imaginary);
		if ($real) {
			$psi = atan($imaginary/$real);
		} else {
			$psi = ($imaginary > 0 ? pi()/2 : -pi()/2);
		}
		$cos = round(cos($psi));
		$sin = round(sin($psi));
		$psi = round(rad2deg($psi));
		if ($psi <= 0) {
			return round($a, 5) . '(' . 'cos' . '(' . "$psi" . ')' . ' + ' . 'i ' . 'sin' . '(' . "$psi" . ')' . ')';
		}
		return round($a, 5) . '(' . 'cos' . "$psi" . ' + ' . 'i ' . 'sin' . "$psi" . ')';

	}

	function show($real, $imaginary)
	{
		$result = [
			$this->algebraicForm($real, $imaginary),
			$this->trigonometricForm($real, $imaginary)
		];
		return $result;		
	}

	function addition()
	{
		$real = $this->real1 + $this->real2;
		$imaginary = $this->imaginary1 + $this->imaginary2;
		return $this->show($real, $imaginary);
	}
	
	function diff()
	{
		$real = $this->real1 - $this->real2;
		$imaginary = $this->imaginary1 - $this->imaginary2;
		return $this->show($real, $imaginary);
	}

	function multiplication()
	{
		$real = $this->real1 * $this->real2 - $this->imaginary1 * $this->imaginary2;
		$imaginary = $this->imaginary1 * $this->real2 + $this->real1 * $this->imaginary2;
		return $this->show($real, $imaginary);
	}

	function division()
	{
		$a = $this->real1;
		$b = $this->imaginary1;
		$c = $this->real2;
		$d = $this->imaginary2;
		if ($c * $c + $d * $d) {
			$real = ($a * $c + $b * $d) / ($c * $c + $d * $d);
			$imaginary = ($b * $c - $a * $d)/($c * $c + $d * $d);
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