<?php

include("../include/connected.php");

?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product panel</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>


<?php

@$id =$_GET["id"];
if(isset($id)){
    @$query = "DELETE  FROM porduct WHERE id='$id'";
    @$delete =mysqli_query($conn,$query);
    if( isset($delet)){
        echo '<script> alert("the product has been deleted"); <script/>';
    }
    else{
        echo '<script> alert("somthing roung the product has been not deleted"); <script/>';
    }
}

?>


<div class="flex min-h-screen bg-neutral-50">
    <!-- الشريط الجانبي -->
    <aside class="w-64 bg-neutral-300 p-6 space-y-6">
        <h2 class="text-2xl font-bold text-center text-neutral-700">
            <span class="italic text-4xl">Gravity Falls</span> <span>Store</span>
        </h2>
        <nav class="space-y-4">
            <a href="adminpanel.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Home</a>
            <a href="#" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">product</a>
            <a href="addproduct.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Add New product</a>
            <a href="#" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">About members</a>
            <a href="#" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Orders</a>
            <a href="logout.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">logout</a>
        </nav>
    </aside>

    <!-- المحتوى الرئيسي -->
   

        <!-- جدول عرض الأقسام -->
        <div class="bg-white p-6 rounded-2xl shadow-md overflow-x-auto">
            <h2 class="text-xl font-semibold mb-4">Section</h2>
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-center">
                        <th class="p-3">#</th>
                        <th class="p-3">product image </th>
                        <th class="p-3">product name</th>
                        <th class="p-3">product price</th>
                        <th class="p-3">product size</th>
                        <th class="p-3">product avilable</th>
                        <th class="p-3">section</th>
                        <th class="p-3">product description</th>
                        <th class="p-3">delet product</th>
                        <th class="p-3">edit product</th>
                    </tr>

                        <?php
                        
                        $query="SELECT * FROM porduct";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                        ?>

                    <tr>
                        <td class="p-3"><?php echo $row['id'];?> #</td>
                        <td class="p-3"> <img class="w-60" src="../uploads/img//<?php echo $row['proimg'];?>">  </td>
                        <td class="p-3"><?php echo $row['proname'];?></td>
                        <td class="p-3"><?php echo $row['proprice'];?> </td>
                        <td class="p-3"><?php echo $row['prosize'];?></td>
                        <td class="p-3"><?php echo $row['prounv'];?> </td>
                        <td class="p-3"><?php echo $row['prosection'];?> </td>
                        <td class="p-3"><?php echo $row['prodescription'];?></td>
                        <td class="p-3"><a href="product.php?id=<?php echo $row["id"];?>"> <button tybe="submit" class= "delet     bg-red-500 text-white px-3 py-2 rounded-xl  hover:bg-red-600 " > delet </button></a></td>
                        <td class="p-3"><a href=""> <button tybe="submit" class= "delet     bg-green-500 text-white px-3 py-2 rounded-xl  hover:bg-green-600 " > edit </button>  </td>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-center">
              
                    
                </tbody>

                <?php
                }
                ?>
            </table>
        </div>
    </main>
</div>
 
</body>
</html>