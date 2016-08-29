<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 8/20/2016
 * Time: 11:59 PM
 */



require 'app/SecurityBundleInput.php';

use MohammadReza\SecurityBundle\SBInput;

$input = new SBInput();

echo $input->getNumberInt('1sdfsd0');
var_dump($input);
echo "<br>";


echo $input->getString("<h1>". " '''' \Hel/ "." ' "."lo .' WorldÆØÅ!" ."</h1>");

echo "<br>";


echo $input->getSpecialChars("<A HREF=\"http://%77%77%77%2E%67%6F%6F%67%6C%65%2E%63%6F%6D\">XSS</A>");

echo "<br>";


echo $input->getEmail("ali@'/\gmail.com");


echo "<br>";



echo $input->getPersianCharacters("سلام _=+/.\\'ali ");

echo "<br>";


echo $input->getDecimal("سلا <>م''_=+ ali  100.30 || 10.20");