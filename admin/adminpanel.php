<?php
session_start();
include("../include/connected.php");

if (!isset($_SESSION['EMAIL'])) {
    header("Location: ../index.php");
    exit();
}

// معالجة إضافة قسم جديد
if (isset($_POST['sectionadd'])) {
    $Sectionname = trim($_POST['Sectionname']);

    if (empty($Sectionname)) {
        echo "<script>alert('⚠️ Please fill in the field!');</script>";
    } elseif (strlen($Sectionname) > 50) {
        echo "<script>alert('⚠️ Section name is too long!');</script>";
    } else {
        $Sectionname = mysqli_real_escape_string($conn, $Sectionname);
        $query = "INSERT INTO section (Sectionname) VALUES ('$Sectionname')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('✅ Section added successfully'); window.location.href='adminpanel.php';</script>";
        } else {
            echo "<script>alert('❌ Error while adding section');</script>";
        }
    }
}

// حذف قسم
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $query = "DELETE FROM section WHERE id = $id";
    $delet = mysqli_query($conn, $query);

    if ($delet) {
        echo "<script>alert('✅ Section deleted successfully'); window.location.href='adminpanel.php';</script>";
    } else {
        echo "<script>alert('❌ Something went wrong, please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>لوحة التحكم - إدارة الأقسام</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body class="bg-white font-sans">

<div class="flex min-h-screen bg-neutral-50">
    <!-- الشريط الجانبي -->
    <aside class="w-64 bg-neutral-300 p-6 space-y-6">
        <h2 class="text-2xl font-bold text-center text-neutral-700">
            <span class="italic text-4xl">Gravity Falls</span> <span>Store</span>
        </h2>
        <nav class="space-y-4">
            <a href="../index.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Home</a>
            <a href="product.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">product</a>
            <a href="addproduct.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Add New product</a>
            <a href="#" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">About members</a>
            <a href="#" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">Orders</a>
            <a href="logout.php" class="block text-black py-3 px-4 hover:bg-neutral-400 hover:text-white">logout</a>
        </nav>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="flex-1 p-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">لوحة التحكم</h1>

        <!-- نموذج إضافة قسم -->
        <form action="adminpanel.php" method="POST" class="mb-8 bg-white p-6 rounded-2xl shadow-md max-w-xl">
            <h2 class="text-xl font-semibold mb-4"> Add New Section</h2>
            <div class="mb-4">
                <label class="block mb-2 text-gray-700">Section Name</label>
                <input type="text" name="Sectionname" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="مثلاً: Jackets, Dresses..." />
            </div>
            <button type="submit" name="sectionadd" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">إضافة القسم</button>
        </form>

        <!-- جدول عرض الأقسام -->
        <div class="bg-white p-6 rounded-2xl shadow-md overflow-x-auto">
            <h2 class="text-xl font-semibold mb-4">Section</h2>
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-center">
                        <th class="p-3">#</th>
                        <th class="p-3">Section Name </th>
                        <th class="p-3">Delete Section</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-center">
                    <?php
                    $query = "SELECT * FROM section";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='border-b'>";
                        echo "<td class='p-3'>{$row['id']}</td>";
                        echo "<td class='p-3'>{$row['Sectionname']}</td>";
                        echo "<td class='p-3'><a href='adminpanel.php?id={$row['id']}' class='bg-orange-500 text-white px-3 py-1 rounded hover:bg-red-600'>حذف</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>
