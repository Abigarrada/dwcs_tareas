<?php
$a = "true"; // imprime el valor devuelto por is_bool($a)
echo (is_bool($a)); //0
$b = 0; // imprime el valor devuelto por is_bool($b)...; 
echo (is_bool($b)); //0
//e se entra dentro do if($b) {…}
$c = "false"; // imprime el valor devuelto por gettype($c);
echo (gettype($c)); //String
$d = ""; // el valor devuelto por empty($d); 
echo (empty($d)); //1
$e = 0.0; // el valor devuelto por empty($e); 
echo (empty($e)); //1
$f = 0; // el valor devuelto por empty($f); 
echo (empty($f)); //1
$g = false; // el valor devuelto por empty($g);
echo empty($g); //1
$h; // el valor devuelto por empty($h); 
echo empty($h); //1
$i = "0"; // el valor devuelto por empty($i); 
echo empty($i); //1
$j = "0.0"; // el valor devuelto por empty($j); 
echo empty($j); //0
$k = true; // el valor devuelto por isset($k); 
echo isset($k); //1
$l = false; // el valor devuelto por isset($l); 
echo isset($l); //1
$m = true; // el valor devuelto por is_numeric($m); 
echo is_numeric($m); //0
$n = ""; // el valor devuelto por is_numeric($n); 
echo is_numeric($n); //0