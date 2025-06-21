
<!DOCTYPE html>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<!-- Navbar -->
    <div class="container">

        <nav id="navbar"
            class="fixed top-0 left-0 right-0 z-70 bg-transparent transition-all duration-300 ease-in-out p-4">
            <div class="mx-auto flex justify-between items-center w-full">
                <!-- Left Menu -->
                <ul class="hidden lg:flex space-x-3">
                    <li class="text-stone-500 text-1xl hover:text-stone-950 font-bold cursor-pointer"><a href="#">Home  </a></li>
                    <?php $query="SELECT  * FROM section";
                        @$result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            ?>  
                     <li class="text-stone-500 text-1xl hover:text-stone-950 font-bold cursor-pointer"><a href="#"> <?php echo $row['Sectionname'];?>
                    </a></li>

                    <?php
                }   
                ?>
                </ul>

                <!-- Store Name -->
                <h2 class="text-2xl lg:text-2xl font-bold">
                    <span class="lg:italic text-6xl">Gravity Falls</span> <span>Store</span>
                </h2>

                <!-- Right Menu -->
                <ul class="hidden lg:flex space-x-7">
                    <a href="#">
                        <li>Log in</li>
                    </a>
                    <a href="#">
                        <li>Search</li>
                    </a>
                    <a href="#">
                        <li>Cart</li>
                    </a>
                </ul>
            </div>
        </nav>
    </div>

