<?php include('includes/header.php'); ?>

<main>
    <!-- Hero Section -->
    <section class="relative text-gray-700 body-font bg-cover bg-center h-screen" style="background-image: url('assets/images/hero.jpg');">
        <div class="absolute inset-0 bg-black opacity-40"></div> <!-- Overlay for better text visibility -->
        <div class="container mx-auto flex px-5 py-24 h-full items-center justify-center relative z-10">
            <div class="text-center text-white">
                <h1 class="text-5xl font-extrabold leading-tight mb-4 animate__animated animate__fadeIn animate__delay-1s">Welcome to Open University Updates</h1>
                <p class="text-lg mb-6 animate__animated animate__fadeIn animate__delay-2s">Your one-stop solution for university updates, notes, lectures, and more.</p>
                <a href="about.php" class="inline-block bg-green-600 text-white py-3 px-8 rounded-lg text-xl transition-transform transform hover:scale-105 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Blogs Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-8">Latest Blogs</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <?php
                include('includes/db.php');
                $query = "SELECT * FROM blogs ORDER BY published_at DESC LIMIT 3";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $blogImage = !empty($row['image']) ? $row['image'] : 'assets/images/blog-placeholder.jpg'; // Dynamic image fallback
                    echo "
                    <div class='max-w-xs w-full lg:max-w-sm lg:flex shadow-lg bg-white rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl'>
                        <img class='w-full h-48 object-cover' src='$blogImage' alt='Blog Image'>
                        <div class='p-6'>
                            <h3 class='text-2xl font-semibold text-green-600 mb-4'>" . $row['title'] . "</h3>
                            <p class='text-gray-600 mb-4'>" . substr($row['content'], 0, 150) . "...</p>
                            <a href='blogs.php' class='text-green-600 font-semibold hover:underline'>
                                Read More
                            </a>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Explore Resources Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-8">Explore Resources</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <a href="notes.php" class="bg-white shadow-lg rounded-lg p-8 text-center transition-all transform hover:scale-105 hover:shadow-xl">
                    <i class="fas fa-book text-green-600 text-5xl mb-6"></i>
                    <p class="text-2xl font-semibold text-gray-800">Notes</p>
                    <p class="text-gray-600 mt-4">Access a wide range of study materials and notes.</p>
                </a>
                <a href="videos.php" class="bg-white shadow-lg rounded-lg p-8 text-center transition-all transform hover:scale-105 hover:shadow-xl">
                    <i class="fas fa-video text-green-600 text-5xl mb-6"></i>
                    <p class="text-2xl font-semibold text-gray-800">Videos</p>
                    <p class="text-gray-600 mt-4">Watch insightful lectures and tutorials on various subjects.</p>
                </a>
                <a href="blogs.php" class="bg-white shadow-lg rounded-lg p-8 text-center transition-all transform hover:scale-105 hover:shadow-xl">
                    <i class="fas fa-pen text-green-600 text-5xl mb-6"></i>
                    <p class="text-2xl font-semibold text-gray-800">Blogs</p>
                    <p class="text-gray-600 mt-4">Stay updated with the latest educational trends and tips.</p>
                </a>
            </div>
        </div>
    </section>

</main>

<?php include('includes/footer.php'); ?>

