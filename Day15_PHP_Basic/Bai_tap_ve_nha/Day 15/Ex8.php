<?php
function rectangular($length, $height) {
    $perimeter = 2 * ($length + $height);
    $area = $length * $height;
    echo "Chiều dài hình chữ nhật = $length m";
    echo "<br>";
    echo "Chiều rộng hình chữ nhật = $height m";
    echo "<br>";
    echo "Chu vi hình chữ nhật = $perimeter m";
    echo "<br>";
    echo "Diện tích hình chữ nhật = $area m2";
}
rectangular(10, 20);
?>