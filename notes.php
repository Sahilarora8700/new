<?php include('includes/header.php'); ?>
<?php include('includes/db.php'); ?>

<main class="py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8">PDF Notes</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            // Query to fetch only PDF content
            $query = "SELECT * FROM content WHERE type='pdf'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p class='text-red-600 text-center'>Error fetching PDFs: " . mysqli_error($conn) . "</p>";
            } elseif (mysqli_num_rows($result) > 0) {
                // Loop through and display PDFs
                while ($row = mysqli_fetch_assoc($result)) {
                    $file_path = htmlspecialchars($row['file_path']);
                    $title = htmlspecialchars($row['title']);
                    $created_at = htmlspecialchars($row['created_at']);

                    // Check if the file exists
                    if (file_exists($file_path)) {
                        echo "
                        <div class='bg-white rounded-lg shadow-lg p-6 flex flex-col'>
                            <div class='flex items-center justify-center h-48 bg-gray-100'>
                                <embed src='$file_path' type='application/pdf' class='w-full h-full' />
                            </div>
                            <h2 class='text-xl font-semibold text-gray-800 mt-4'>$title</h2>
                            <p class='text-sm text-gray-500 mt-2'>Uploaded on: $created_at</p>
                            <a href='$file_path' download class='mt-4 block text-blue-600 hover:underline'>
                                Download PDF
                            </a>
                        </div>";
                    } else {
                        echo "
                        <div class='bg-white rounded-lg shadow-lg p-6 flex flex-col'>
                            <h2 class='text-xl font-semibold text-gray-800 mt-4'>$title</h2>
                            <p class='text-red-600 text-center'>File not found: $file_path</p>
                        </div>";
                    }
                }
            } else {
                echo "<p class='text-gray-600 text-center'>No PDF notes available at the moment.</p>";
            }
            ?>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>
