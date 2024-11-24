<?php include('includes/header.php'); ?>
<main class="py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-8">Contact Us</h1>
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg mx-auto">
            <form action="submit-query.php" method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block text-gray-700 font-semibold">Your Name</label>
                    <input type="text" name="name" id="name" class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-green-500" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-semibold">Your Email</label>
                    <input type="email" name="email" id="email" class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-green-500" required>
                </div>
                <div>
                    <label for="message" class="block text-gray-700 font-semibold">Message</label>
                    <textarea name="message" id="message" rows="5" class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-green-500" required></textarea>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-500">Send Message</button>
            </form>
        </div>
    </div>
</main>
<?php include('includes/footer.php'); ?>
