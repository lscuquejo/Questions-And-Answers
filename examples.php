<?php

//question 1:How do you add an element 'four' to this array
// array
$my_array = array('tree', 'two', 'one');
$my_array[] = 'four';
echo "<br>";
echo "Common Array";
echo "<br>";
echo "<br>";
echo $my_array[3];
echo "<br>";
var_dump($my_array);
echo "<br>";



//question 2:How do you add an element 'four' to this Ass array
// associative_array = array with named keys.
$ass_array = array('one' =>'one', 'two'=>'two', 'three' =>'three');
$ass_array['four'] = 'four';
echo "<br>";
echo "Associative Array";
echo "<br>";
echo "<br>";
echo $ass_array['four'];
echo "<br>";
var_dump($my_array);


echo "<br><br><h1>question 3:How do you count the number of elements in an array?</h1>";
echo "size of and count of";
echo "<br>";
echo sizeof($my_array);
echo "<br>";
echo count($ass_array);


echo "<br><br><h1>question 4:Check if a key exists. </h1>";
echo "Check if a key exists return true or false.";
echo "<br>";
echo "key 0 exists return = " . isset($my_array[0]);
echo "<br>";
echo "key 123123 exists return = " . isset($my_array[123123]);

//question 5: how to break a string into an array ?
echo "<br>";
echo "<br>";
$string = 'Welcome to the new World';

$explodedString = explode(" ", $string);

print_r ($explodedString);

echo "<h1>question 5: how to form a string from an array ? </h1>";

echo "<br>";
echo "<br>";

$implodedString = implode(" ", $explodedString);

print_r ($implodedString);