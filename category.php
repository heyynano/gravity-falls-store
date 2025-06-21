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
<html lang="ar" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>product</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans h-200">

   <div class="container">

        <nav id="navbar"
            class="fixed top-0 left-0 right-0 z-70 bg-white transition-all duration-300 ease-in-out p-4">
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


  <main class="flex px-8 py-6 flex-col md:flex-row">
    <aside class="w-full md:w-1/6 pr-6 mb-6 md:mb-0  me-12 py-12">
      <h2 class="font-semibold text-lg mb-4 py-6"> Browse by</h2>
      <ul class="space-y-2 mb-12">
        <li><a href="#" class="text-red-600 font-semibold">All products</a></li>
      </ul>
      <div class="mt-6">
        <label class="block text-sm font-medium mb-1">price</label>
        <input type="range" id="priceFilter" min="0" max="150" value="150" class="w-full my-6 appearance-none h-2 bg-stone-500 rounded-full accent-black">
        <p class="text-sm mt-1"><span id="maxPrice">150</span></p>
      </div>
    </aside>

    <section class="w-full md:w-3/4">
      <h2 class="text-2xl font-semibold mb-4">All Products</h2>
      <div id="productContainer" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"></div>
    </section>
  </main>

  <script>
    const products = [
      {
        title: "سويت شيرت نسائي",
        price: 84,
        oldPrice: 120,
        image: "https://via.placeholder.com/300x350",
        colors: ["blue-700", "orange-500"],
        discount: 30
      },
      {
        title: "بنطلون جينز رجالي",
        price: 100,
        image: "https://via.placeholder.com/300x350",
        colors: [],
        discount: 0
      },
      {
        title: "سويت شيرت رجالي",
        price: 85,
        image: "https://via.placeholder.com/300x350",
        colors: ["pink-400"],
        discount: 0
      }
    ];

    const container = document.getElementById("productContainer");
    const priceFilter = document.getElementById("priceFilter");
    const maxPriceSpan = document.getElementById("maxPrice");

    function renderProducts(filteredProducts) {
      container.innerHTML = "";
      filteredProducts.forEach(product => {
        const colorDots = product.colors.map(color =>
          `<span class="w-4 h-4 bg-${color} rounded-full border"></span>`
        ).join("");

        container.innerHTML += `
          <div class="border p-2 hover:shadow-lg transition group">
            <div class="relative">
              <img src="${product.image}" alt="${product.title}" class="w-full" />
              ${product.discount > 0 ? `<span class="absolute top-2 right-2 bg-black text-white text-xs px-2 py-0.5">خصم ${product.discount}%</span>` : ""}
            </div>
            <h3 class="mt-2 text-sm">${product.title}</h3>
            ${product.oldPrice ? `<p class="text-sm line-through text-gray-500">$${product.oldPrice.toFixed(2)}</p>` : ""}
            <p class="text-red-600 font-semibold">$${product.price.toFixed(2)}</p>
            <div class="flex space-x-2 mt-1 justify-end rtl:space-x-reverse">
              ${colorDots}
            </div>
          </div>
        `;
      });
    }

    renderProducts(products);

    priceFilter.addEventListener("input", () => {
      const maxPrice = parseFloat(priceFilter.value);
      maxPriceSpan.textContent = maxPrice;
      const filtered = products.filter(p => p.price <= maxPrice);
      renderProducts(filtered);
    });
  </script>
  

</body>
</html>
