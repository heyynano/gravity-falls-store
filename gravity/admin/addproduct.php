<?php 
include("../include/connected.php");

@$proname = $_POST['proname'];
@$proprice = $_POST['proprice'];
@$prosection = $_POST['prosection'];
@$prodescription = $_POST['prodescription'];
@$prosize = $_POST['prosize'];
@$prounv = $_POST['prounv'];
@$proadd = $_POST['proadd'];

@$IMAGENAME = $_FILES['proimg']['name'];
@$imageTmp = $_FILES['proimg']['tmp_name'];

if (isset($proadd)) {
    if (empty($proname) || empty($proprice) || empty($prosection) || empty($prodescription) || empty($prosize) || empty($prounv)) {
        echo "<script>alert('⚠️ Please fill in the field!'); </script>";
    } else {
        $proimg = rand(0, 5000) . "_" . $IMAGENAME;
        move_uploaded_file($imageTmp, "../uploads/img/" . $proimg);

        $query = "INSERT INTO porduct(proname, proimg, proprice, prosection, prodescription, prosize, prounv) 
                  VALUES('$proname', '$proimg', '$proprice', '$prosection', '$prodescription', '$prosize', '$prounv')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>alert("✔️ The product has been added successfully.");</script>';
        } else {
            echo '<script>alert("❌ Oops! The product did not add to the website.");</script>';
        }
    }
}
?>



 

<!DOCTYPE html>


<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>إضافة منتج</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">


<?php

$id =$_GET["id"];
if(isset($id)){
    $query = "DELETE * FROM porduct WHERE id ='$id'";
    $delete =mysqli_query($conn,$query);
    if( isset($delet)){
        echo '<script> alert("the product has been deleted"); <script/>';
    }
    else{
        echo '<script> alert("somthing roung the product has been not deleted"); <script/>';
    }
}

?>


<div class="flex ">
    
    <!-- الشريط الجانبي -->
    <aside class="w-64 bg-neutral-300 p-6 space-y-6">
        <h2 class="text-2xl font-bold text-center text-neutral-700">
            <span class="italic text-4xl">Gravity Falls</span> <span>Store</span>
        </h2>
        <nav class="space-y-4">
            <a href="adminpanel.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Home</a>
            <a href="product.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">product</a>
            <a href="addproduct.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Add New product</a>
            <a href="#" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">About members</a>
            <a href="#" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Orders</a>
            <a href="logout.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">logout</a>
        </nav>
    </aside>


<div class="min-h-screen w-full">
    <div class="bg-neutral-50 p-8 rounded-2xl shadow-lg  max-wl">

         <h2 class="text-2xl font-bold text-center text-neutral-700 my-7">
            <span class="italic text-4xl">Gravity Falls</span> <span>Store</span>
        </h2>

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">🛒 إضافة منتج جديد</h2>
        <form method="POST" action="addproduct.php" enctype="multipart/form-data" class="space-y-4">
            <!-- اسم المنتج -->
            <div>
                <label for="name" class="block text-gray-700 mb-1">عنوان المنتج</label>
                <input type="text" name="proname" id="name" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="مثلاً: جاكيت جلد" />
            </div>
            
            <!-- الصورة -->
            <div>
                <label for="file" class="block text-gray-700 mb-1">صورة المنتج</label>
                <input type="file" name="proimg" id="picture" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="صورة المنتج" />
            </div>

            <!-- السعر -->
            <div>
                <label for="price" class="block text-gray-700 mb-1">السعر (جنيه)</label>
                <input type="text" id="price" name="proprice" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="مثلاً: 199.99" />
            </div>


            <!-- الوصف -->
            <div>
                <label for="descriptio" class="block text-gray-700 mb-1">تفصيل المنتج</label>
                <input type="text"  name="prodescription" id="description" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="مثلاً:المنتج حاكت عصري من جلد الصناعي رجالي" />

            </div>

            <!-- المقسات -->
            <div>
                <label for="size" class="block text-gray-700 mb-1">المقسات المتوفرة</label>
                <input type="text"  name="prosize" id="size" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="مثلاً: M L xl" />

            </div>


             <!-- توفر المنتج -->
            <div>
                <label for="unv" class="block text-gray-700 mb-1">توفر المنتج</label>
                <input type="text"  name="prounv" id="unv" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="" />
                
            </div>

            
            <!-- القسم -->
            <div>
                <label for=form_control class="block text-gray-700 mb-1">القسم</label>
                <select name="prosection" id="form_control" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <?php
                    $query="SELECT *FROM section";
                    $result=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<option name="section"> '.$row['Sectionname'].' </option>';
                    }
                    
                    ?>

                   
                    
                </select>
            </div>

            <!-- زر الإرسال -->
            <div class="text-center mt-6">
                <button type="submit" name="proadd" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">إضافة المنتج</button>
            </div>
        </form>
    </div>
</div>
</div>

</body>
</html>
