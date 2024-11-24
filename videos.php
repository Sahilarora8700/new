<?php include('includes/header.php'); ?>
<main class="py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8">Video Lectures</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            include('includes/db.php');
            $query = "SELECT * FROM content WHERE type='video'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <div class='bg-white rounded-lg shadow-lg p-6'>
                    <h2 class='text-xl font-semibold text-gray-800'>" . $row['title'] . "</h2>
                    <iframe class='mt-4 w-full h-40 rounded-lg' src='" . $row['file_path'] . "' frameborder='0' allowfullscreen></iframe>
                </div>";
            }
            ?>
        </div>
    </div>
</main>
<?php include('includes/footer.php'); ?>
