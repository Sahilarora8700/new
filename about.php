<?php include('includes/header.php'); ?>

<main class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12">
        <h1 class="text-5xl font-bold text-center text-green-600 mb-8 animate__animated animate__fadeIn">About Us</h1>

        <!-- About Section -->
        <div class="flex flex-wrap justify-center items-center md:flex-row mb-12 space-x-0 md:space-x-8">
            <!-- Left Section (Image) -->
            <div class="w-full md:w-1/2 p-6 transition-transform duration-300 transform hover:scale-105 animate__animated animate__fadeInLeft">
                <img src="assets/images/about.png" alt="About Us" class="rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300">
            </div>

            <!-- Right Section (Content) -->
            <div class="w-full md:w-1/2 p-6 space-y-6 animate__animated animate__fadeInRight">
                <p class="text-gray-800 text-lg md:text-xl leading-relaxed">
                    Open University Updates is your trusted source for academic resources. Our mission is to provide students and educators with the tools they need to succeed. From notes and video lectures to blogs and interactive discussions, we bring the best educational materials to one platform.
                </p>
                <p class="text-gray-800 text-lg md:text-xl leading-relaxed">
                    Join our growing community and access high-quality content tailored to your academic needs. Whether you're preparing for exams, looking for additional learning materials, or engaging in academic discussions, we are here to support you at every step.
                </p>

                <!-- Call-to-Action (CTA) Button -->
                <div class="flex justify-center md:justify-start mt-8">
                    <a href="contact.php" class="px-8 py-3 bg-green-600 text-white rounded-full text-lg font-semibold transition-all duration-300 hover:bg-green-700 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>

        <!-- Our Team Section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-semibold text-gray-700 mb-6">Meet Our Team</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php
            // Database connection
            include('includes/db.php');  // Include your database connection file

            // Query to fetch team members from the database
            $query = "SELECT * FROM team_members";
            $result = mysqli_query($conn, $query);

            // Check if there are any team members in the database
            if (mysqli_num_rows($result) > 0) {
                // Loop through each team member and display their data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="bg-white p-6 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                        <img src="' . $row['image_url'] . '" alt="Team Member" class="w-24 h-24 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">' . $row['name'] . '</h3>
                        <p class="text-gray-600">' . $row['position'] . '</p>
                        <p class="text-gray-500 mt-4">' . $row['bio'] . '</p>
                    </div>';
                }
            } else {
                echo '<p>No team members found.</p>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>

            </div>
        </div>

    </div>
</main>

<?php include('includes/footer.php'); ?>
