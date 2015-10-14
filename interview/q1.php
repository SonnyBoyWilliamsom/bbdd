<?php
//Using a programming language of your choice, show how you would calculate the longest run of consecutive identical characters in a string. 
//
//For example if the input string is "abc" the return value should be "1" as there are only sequences of 1 character long, "aab" should return 2 as there are two consecutive a's, "abbccd" should also return 2 since the longest run is two b's or two c's.
//
//You are free to use Google, to debug and test your program in an alternative execution environment if you wish and use any normal tools at your disposal that you'd use in a real life programming exercise.
//
//
//What tests would you write to check the function above works correctly, as in 
//
//"abc" => 1
//"aab" => 2
//"abbccd" => 2
//
//etc.?


$str = "qwertyuiooofjjj";
$counter = 1;
$biggest = 1;
$last = strlen($str) - 1;

for ($i = 0; $i < $last; $i++) {

    if ($str[$i] == $str[$i + 1]) {
        $counter++;
        if ($counter > $biggest) {
            $biggest = $counter;
        }
    } else {
        $counter = 1;
    }
}

//for($i=0;$i<strlen($str)-1;$i++){
//    if($str[$i+1] == $str[$i]){
//        $biggest = $counter ++;
//    }else{
//        $counter =1;
//    }
//    
//}

echo "The string $str has $biggest consecutive letters.";

for ($i = 1; $i <= 15; $i++) {

    if ($i % 15 == 0) {
        echo " FizzBuzz ";
    } elseif ($i % 5 == 0) {
        echo " Fizz ";
    } elseif ($i % 3 == 0) {
        echo " Buzz ";
    } else {
        echo $i;
    }
}

$marks1 = array(360, 310, 310, 330, 313, 375, 456, 111, 256);
$marks2 = array(350, 340, 356, 330, 321);
$marks3 = array(630, 340, 570, 635, 434, 255, 3298);

for ($i = 0; $i < 3; $i++) {
    if (min($marks1) < min($marks2)) {
        if (min($marks1) < min($marks3)) {
            $min = min($marks1);
        } else {
            $min = min($marks3);
        }
    } elseif (min($marks2) < min($marks3)) {
        $min = min($marks1);
    }

    if (max($marks1) > max($marks2)) {
        if (max($marks1) > max($marks3)) {
            $max = max($marks1);
        } else {
            $max = max($marks3);
        }
    } elseif (max($marks2) > max($marks3)) {
        $max = max($marks1);
    }
//    if (min($marks1) < min($marks2)) {
//        $min = min($marks1);
//    }elseif(min($marks3) < min($marks2)) {
//        $min = min($marks3);
//    }else{
//        $min = min($marks2);
//    }
//    
//    if (max($marks1) > max($marks2)) {
//        $max = max($marks1);
//    }elseif(max($marks3) < max($marks2)) {
//        $max = max($marks3);
//    }else{
//        $max = max($marks2);
//    }
}
echo "<br> minimo " . $min;
echo "<br> máximo " . $max;

$marks1 = array(360, 310, 310, 330, 313, 375, 456, 111, 256);
$marks2 = array(350, 340, 356, 330, 321);
$marks3 = array(630, 340, 570, 635, 434, 255, 3298);

$max_marks = max(max($marks1), max($marks2), max($marks3));
$min_marks = min(min($marks1), min($marks2), min($marks3));
echo "<br>Maximum marks : " . $max_marks . '<br>';
echo "Minimum marks : " . $min_marks . '<br>';

echo round(-1.54, 1);
?>
<h4>For loops</h4>

<?php
for ($i = 1; $i < 11; $i++) {
    $strNum .= $i . '-';
}
echo rtrim($strNum, '-') . '<br>';

$b = 1;
for ($i = 0; $i < 20; $i++) {

    if ($i < 10) {
        $a .= '*';
        echo $a . '<br>';
    } else {
        echo substr($a, 0, 10 - $b++) . '<br>';
        ;
    }
}
echo substr($a, 0, 10);
for ($i = 1; $i < 11; $i++) {
    $strNum .= $i . '-';
}
echo rtrim($strNum, '-') . '<br>';
?>

<h4>Chessssss</h4>


<?php
$black = "<div style='display:inline-block; width:30px; height:30px; border: #000 solid 1px; background:#000; color: #fff;'></div>";
$white = "<div style='display:inline-block; width:30px; height:30px; border: #000 solid 1px;'></div>";

for ($i = 1; $i < 82; $i++) {
    
        if ($i % 2 == 0) {
            echo $black;
        } else {
            echo $white;
        }
        if ($i % 9 == 0) {
            echo '<br>';
        }
       
}echo '<br>';

for ($i = 0; $i < 10; $i++) {
    
         for ($n = 1; $n < 11; $n++) {
            $num = $n + $n*$i;
            echo "<div style='display:inline-block; width:30px; height:30px; border: #000 solid 1px;'>$num</div>";
        }
        echo '<br>';
}
?>
