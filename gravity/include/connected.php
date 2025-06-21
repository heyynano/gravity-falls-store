<?php 
$host ="localhost";
$username ="root";
$password ="";
$dbname="gravity falls";


$conn = mysqli_connect($host,$username,$password,$dbname);

if ($conn) {
    echo '<p class="text-green-600 text-sm mb-4 text-center">تم الاتصال بقاعدة البيانات بنجاح</p>';
} else {
    echo '<p class="text-red-600 text-sm mb-4 text-center">فشل الاتصال بقاعدة البيانات</p>';
}



