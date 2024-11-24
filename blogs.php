<?php include('includes/header.php'); ?>

<main class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12">
        <h1 class="text-5xl font-bold text-center text-green-600 mb-12 animate__animated animate__fadeIn">Blogs</h1>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            include('includes/db.php');
            $query = "SELECT * FROM blogs ORDER BY published_at DESC";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $excerpt = substr($row['content'], 0, 150) . '...'; // Create an excerpt for the preview
                $imageUrl = !empty($row['image']) ? $row['image'] : 'assets/images/default-blog.jpg'; // Fallback if no image

                echo "
                <div class='bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300'>
                    <img src='$imageUrl' alt='Blog Image' class='w-full h-48 object-cover'>
                    <div class='p-6'>
                        <h2 class='text-2xl font-semibold text-gray-800 hover:text-green-600 transition duration-300'>" . $row['title'] . "</h2>
                        <p class='text-gray-600 mt-4'>" . $excerpt . "</p>
                        <a href='blog-detail.php?id=" . $row['id'] . "' class='mt-4 inline-block text-green-600 hover:underline transition-all duration-300'>Read More</a>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>
