<?php 
$host ="localhost";
$username ="root";
$password ="";
$dbname="gravity falls";


$conn = mysqli_connect($host , $username , $password , $dbname );

if (isset($conn)){
    echo "connecting to datebase";
}
else{
    echo "not connecting";
}

$DELETE = "DELETE FROM section WHERE id=1";
mysqli_query($conn,$DELETE);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>
    <!-- navbar------------------------------------------------------ -->

<?php 

include('file/header.php')

?>

<!-- end of navbar--------------------------------------------------------------- -->

 <section id="hero" class="relative w-full h-screen overflow-hidden">
    
    <!-- الصورة -->
    <img src="image/hero.jpg" alt="Hero" class="absolute inset-0 w-full h-full object-cover z-0" />

    <!-- المحتوى -->
    <div class="relative z-10 flex flex-col justify-end h-full p-10 text-white ">
        <div class="text-6xl font-bold mb-6">
            <h1>Start with the basics</h1>
        </div>
        <div>
            <a href="#" class="bg-white text-black px-6 py-3 font-bold text-xl rounded-md mr-4 hover:bg-gray-200 transition">Woman Shop</a>
            <a href="#" class="bg-white text-black px-6 py-3 font-bold text-xl rounded-md hover:bg-gray-200 transition">Men Shop</a>
        </div>
    </div>
</section>


    <div class="max-w-6xl mx-auto py-10  my-40 " id="Category">
        <h2 class="text-2xl font-semibold ">Shop by Category</h2>
        <div class="flex gap-8 justify-end  my-9">
            <a href="#" class="text-stone-500 text-lg border-b-3 border-white hover:text-black hover:border-black">Men</a>
            <a href="#" class="text-stone-500 text-lg border-b-3 border-white hover:text-black hover:border-black">Women</a>

        </div>
        <div class="flex flex-col md:flex-row gap-6 my-9">
            <!-- Tops -->
            <div class="relative flex-1 group overflow-hidden rounded-lg">
                <img src="image/top.jpg" alt="Tops"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/5 flex items-center justify-center hover:bg-black/30">
                    <span class="bg-white text-black py-2 px-4 rounded-md text-lg font-medium">Tops</span>
                </div>
            </div>

            <!-- Bottoms -->
            <div class="relative flex-1 group overflow-hidden rounded-lg">
                <img src="image/bottom.jpg" alt="Bottoms"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/5 flex items-center justify-center hover:bg-black/30">
                    <span class="bg-white text-black py-2 px-4 rounded-md text-lg font-medium">Bottoms</span>
                </div>
            </div>

            <!-- Accessories -->
            <div class="relative flex-1 group overflow-hidden rounded-lg ">
                <img src="image/women accessorie.jpg" alt="Accessories"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                <div class="absolute inset-0 bg-black/5 flex items-center justify-center hover:bg-black/30">
                    <span class="bg-white text-black py-2 px-4 rounded-md text-lg font-mediumhover">Accessories</span>
                </div>
            </div>
        </div>
    </div>

    <!-- last arrivals section --------------------------------------------------------------------------- -->

    <div class="max-w-6xl mx-auto py-10">
        <h2 class="text-3xl font-semibold mb-6">
            Latest Arrivals</h2>
    </div>

    <div class="container mx-auto">
        <!-- Main Content -->

        <!-- Main Carousel------------------------------------------------------------------------------------------------- -->
        <main class="container mx-auto px-4 py-8 mb-8">
            <!-- Product Carousel -->
            <div class="relative">
                <!-- Carousel Navigation Buttons -->
                <button id="prevBtn"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -ml-4 z-10 bg-white rounded-full shadow-md p-2 hover:bg-gray-100 focus:outline-none">
                    <i class="fas fa-chevron-left text-gray-600"></i>
                </button>

                <button id="nextBtn"
                    class="absolute right-0 top-1/2 -translate-y-1/2 -mr-4 z-10 bg-white rounded-full shadow-md p-2 hover:bg-gray-100 focus:outline-none">
                    <i class="fas fa-chevron-right text-gray-600"></i>
                </button>

                <!-- Carousel Container -->
                <div class="overflow-hidden flex">
                    <div id="productCarousel" class="flex transition-transform duration-300 ease-in-out space-x-6">
                        <!-- Product 1 -->
                        <div class="group min-w-[250px] sm:min-w-[280px] flex-shrink-0">
                            <a href="/product/womens-oversized-sweatshirt" class="block">
                                <div class="relative bg-gray-100 aspect-square overflow-hidden">
                                    <div class="absolute top-2 left-2 bg-white px-2 py-1 text-xs font-medium z-10">
                                        40% OFF
                                    </div>
                                    <img onmouseover="this.src = `image/p1h.jpg`"
                                        onmouseout="this.src = `image/billie.png` " src="image/p1.jpg"
                                        alt="Women's Oversized Sweatshirt" class="w-70 h-full object-cover ">
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-medium">Women's Oversized Sweatshirt</h3>
                                    <div class="mt-1 flex items-center">
                                        <span class="text-sm text-gray-500 line-through mr-2">$85.00</span>
                                        <span class="text-sm font-medium text-red-600">$51.00</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Product 2 -->
                        <div class="group min-w-[250px] sm:min-w-[280px] flex-shrink-0">
                            <a href="#" class="block">
                                <div class="relative bg-gray-100 aspect-square overflow-hidden">
                                    <img onmouseover="this.src = `image/p2h.jpg`"
                                        onmouseout="this.src = `image/p2.jpg` " src="image/p2.jpg"
                                        alt="Drawstring Linen Pants" class="w-70 h-full object-cover ">
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-medium">Drawstring Linen Pants</h3>
                                    <div class="mt-1">
                                        <span class="text-sm font-medium">$45.00</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Product 3 -->
                        <div class="group min-w-[250px] sm:min-w-[280px] flex-shrink-0">
                            <a href="./product/bucket-hat.html" class="block">
                                <div class="relative bg-gray-100 aspect-square overflow-hidden">
                                    <div class="absolute top-2 left-2 bg-white px-2 py-1 text-xs font-medium z-10">
                                        70% OFF
                                    </div>
                                    <img onmouseover="this.src = `image/p3h.jpg`"
                                        onmouseout="this.src = `image/p3.jpg` " src="image/p3.jpg" alt="Bucket Hat"
                                        class="w-70 h-full object-cover ">
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-medium">Bucket Hat</h3>
                                    <div class="mt-1 flex items-center">
                                        <span class="text-sm text-gray-500 line-through mr-2">$30.00</span>
                                        <span class="text-sm font-medium text-red-600">$9.00</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Product 4 -->
                        <div class="group min-w-[250px] sm:min-w-[280px] flex-shrink-0">
                            <a href="/product/unisex-oversized-t-shirt" class="block">
                                <div class="relative bg-gray-100 aspect-square overflow-hidden">
                                    <div class="absolute top-2 left-2 bg-white px-2 py-1 text-xs font-medium z-10">
                                        30% OFF
                                    </div>
                                    <img onmouseover="this.src = `image/p4h.jpg`"
                                        onmouseout="this.src = `image/p4.jpg` " src="image/p4.jpg"
                                        alt="Unisex Oversized T-Shirt" class="w-70 h-full object-cover ">
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-medium">Unisex Oversized T-Shirt</h3>
                                    <div class="mt-1 flex items-center">
                                        <span class="text-sm text-gray-500 line-through mr-2">$40.00</span>
                                        <span class="text-sm font-medium text-red-600">$28.00</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Additional Products (duplicated for demo) -->
                        <div class="group min-w-[250px] sm:min-w-[280px] flex-shrink-0">
                            <a href="/product/summer-dress" class="block">
                                <div class="relative bg-gray-100 aspect-square overflow-hidden">
                                    <div class="absolute top-2 left-2 bg-white px-2 py-1 text-xs font-medium z-10">
                                        25% OFF
                                    </div>
                                    <img onmouseover="this.src = `image/p5.png`" onmouseout="this.src = `image/p5.jpg` "
                                        src="image/p5.png" alt="Summer Dress" class="w-70 h-full object-cover ">
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-medium">Men's Cotton Shorts </h3>
                                    <div class="mt-1 flex items-center">
                                        <span class="text-sm text-gray-500 line-through mr-2">$60.00</span>
                                        <span class="text-sm font-medium text-red-600">$45.00</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="group min-w-[250px] sm:min-w-[280px] flex-shrink-0">
                            <a href="/product/denim-jacket" class="block">
                                <div class="relative bg-gray-100 aspect-square overflow-hidden">
                                    <img onmouseover="this.src = `image/p6h.webp`"
                                        onmouseout="this.src = `image/p6.jpg`" src="image/p6.jpg" alt="Denim Jacket"
                                        class="w-70 h-full object-cover ">
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-medium">Ribbed Socks </h3>
                                    <div class="mt-1">
                                        <span class="text-sm font-medium">$75.00</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="group min-w-[250px] sm:min-w-[280px] flex-shrink-0">
                            <a href="/product/denim-jacket" class="block">
                                <div class="relative bg-gray-100 aspect-square overflow-hidden">
                                    <img onmouseover="this.src = `image/p7h.png`" onmouseout="this.src = `image/p7.jpg`"
                                        src="image/p7.jpg" alt="Denim Jacket" class="w-70 h-full object-cover ">
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-medium">Women's Crewneck Sweater </h3>
                                    <div class="mt-1">
                                        <span class="text-sm font-medium">$75.00</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="group min-w-[250px] sm:min-w-[280px] flex-shrink-0">
                            <a href="/product/denim-jacket" class="block">
                                <div class="relative bg-gray-100 aspect-square overflow-hidden">
                                    <img onmouseover="this.src = `image/p8h.jpg`" onmouseout="this.src = `image/p8.jpg`"
                                        src="image/p8.jpg" alt="Denim Jacket" class="w-70 h-full object-cover ">
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-sm font-medium">Men's Crewneck Sweater </h3>
                                    <div class="mt-1">
                                        <span class="text-sm font-medium">$75.00</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    </a>
                </div>

            </div>

            <!-- Carousel Indicators -->
            <div class="flex justify-center mt-6 space-x-2" id="carouselIndicators">
                <!-- Indicators will be added dynamically -->
            </div>
    </div>
    </main>
    </div>

    <section class="relative w-full min-h-[80vh] flex items-center justify-center bg-gray-200">
        <!-- Background Video ---------------------------------------------------------------------------------------------->
        <video class="absolute z-50 w-full h-full object-cover opacity-100" autoplay loop muted>
            <source src="../video/KOLLAR CLOTHING (Cinematic Fashion Film 16mm).mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gray-200 "></div>

        <!-- Content -->
        <div class="relative z-60 text-center text-black">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-50">30%-70% On Selected Styles</h1>
            <button class="mt-6 px-6 py-3 bg-white text-black font-semibold rounded-md shadow-lg 
            hover:bg-gray-100 transition-all duration-300">
                Shop Sale
            </button>
        </div>
    </section>
    <!-- Subscribe section ------------------------------------------------------------------------------------------------------ -->
    <section class="mt-32">
        <div class="container mx-auto ">
            <h3 class="text-4xl">Subscribe and save 10%</h3>
            <p class="mb-5 text-xl  ">on your first order</p>
            <div class="flex flex-col items-start gap-3 ">
                <input type="email" placeholder="Enter Your Email"
                    class="w-full sm:w-2/5 h-10 mt-4 border-2 border-gray-300 rounded px-3 focus:outline-none focus:border-blue-500"
                    aria-label="Enter Your Email" required>


                <button class="mt-6 px-9 py-3 bg-black text-white font-semibold rounded-md shadow-lg 
hover:bg-gray-100 hover:text-black transition-all duration-300 border-2">Subscribe</button>

            </div>
        </div>
    </section>



    <!-- start of footer  --------------------------------------------------------------------------------------------------->

    <?php
    
    include("file/footer.php")

    ?>

    <!-- end of footer  --------------------------------------------------------------------------------------------------->



     <script src="carousel.js"></script>
    <script src="main.js"></script>



</body>
