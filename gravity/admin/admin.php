<?php include("../include/connected.php");
SESSION_START();


?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل دخول المشرف</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

  <!-- تظهر الرسالة هنا من connected.php -->
   <?php 
@$ADemail = $_POST["email"];
@$ADpassword = $_POST["password"];
@$ADadd = $_POST["add"];

if (isset($ADadd)) {
    if (empty($ADemail) || empty($ADpassword)) {
        echo "<script>alert('please enter your email and password');</script>";
    }
    else {
      $query="SELECT *FROM admin WHERE EMAIL='$ADemail' AND PASSWORD = '$ADpassword' ";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result) == 1){
        $_SESSION['EMAIL']=$ADemail;
        echo "<script>alert('hello admin you will go dashbord admin in 2 sec..');</script>  ";
        header("REFRESH:2; URL=adminpanel.php");
      } else {
      echo "<script>alert('sorry you are not the admin you will go the home page in 2 sec..');</script>  ";
        header("REFRESH:2; URL=../index.php");
      }
  
  }
}
?>

  <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login Admin</h2>

    <!-- form sends to same page -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="space-y-5">
      <div>
        <label for="email" class="block text-lg font-medium text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your Email"
          class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="password" class="block text-lg font-medium text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password"
          class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit" name="add"
        class="w-full bg-black text-white p-3 rounded-lg hover:bg-stone-600 border-2 transition duration-300">
        Sign in
      </button>
    </form>
  </div>

</body>
</html>

