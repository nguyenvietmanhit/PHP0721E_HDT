<?php
function showName($name) {
    return $name;
}
function showAge($age) {
    return $age;
}
function showGender($gender) {
    return $gender;
}
$name = showName('Mạnh');
$age = showAge('24');
$gender = showGender('Nam');
echo "Họ tên: $name, Tuổi: $age, Giới tính: $gender";

function show ($name, $age, $gender) {
  return "Họ tên: $name, Tuổi: $age, Giới tính: $gender";
}
echo show("Mạnh", 24, 'Nam');
?>
