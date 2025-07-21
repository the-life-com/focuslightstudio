<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus & Light Studio - Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #FFFFFF; color: #1E40AF; }
        .header { background-color: #1E40AF; position: relative; }
        .header::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background-color: #F97316;
            margin: 0 auto;
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
        }
        .sidebar { transform: translateX(-100%); transition: transform 0.3s; z-index: 1000; }
        .sidebar.open { transform: translateX(0); }
        .btn-primary { background-color: #F97316; color: #FFFFFF; }
        .btn-primary:hover { background-color: #EA580C; }
        .footer { background-color: #1E40AF; color: #FFFFFF; }
        .logo-img { 
            width: 100px; /* Smaller size for professional look */
            height: auto;
            border-radius: 4px; /* Subtle rounded corners like Amazon */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Professional shadow */
            transition: transform 0.2s ease; /* Smooth hover effect */
        }
        .logo-img:hover {
            transform: scale(1.05); /* Slight scale on hover for interactivity */
        }
        .company-description {
            background-image: url('assets/images/bvb.jpg');
            background-color: rgba(30, 64, 175, 0.5); /* Semi-transparent blue overlay */
            background-blend-mode: overlay;
            background-size: cover;
            background-position: center;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        .main-end-line {
            width: 100px;
            height: 4px;
            background-color: #F97316;
            margin: 2rem auto 0;
        }
        .contact-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
            flex-wrap: wrap;
        }
        .company-details {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 1.5rem;
            border-radius: 8px;
            flex: 1;
            min-width: 250px;
            max-width: 350px;
        }
        .contact-form {
            flex: 1;
            min-width: 250px;
            max-width: 400px;
        }
        .header-title {
            color: #FFFFFF;
            font-weight: bold;
            font-size: 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="header flex justify-between items-center p-4">
        <button onclick="toggleMenu()" class="text-white"><i class="fas fa-home text-2xl"></i></button>
        <span class="header-title">Focus & Light Studio</span>
        <button onclick="logout()" class="text-white"><i class="fas fa-sign-out-alt text-2xl"></i></button>
    </header>
    <nav class="sidebar fixed top-0 left-0 h-full bg-white w-64 shadow-lg" id="sidebar">
        <button onclick="toggleMenu()" class="absolute top-4 right-4 text-blue-800"><i class="fas fa-times"></i></button>
        <ul class="mt-12">
            <li><a href="home.php" class="flex items-center p-4 text-blue-800"><i class="fas fa-home mr-2"></i> Home</a></li>
            <li><a href="services.php" class="flex items-center p-4 text-blue-800"><i class="fas fa-camera mr-2"></i> Services</a></li>
            <li><a href="gallery.php" class="flex items-center p-4 text-blue-800"><i class="fas fa-images mr-2"></i> Gallery</a></li>
            <li><a href="about.php" class="flex items-center p-4 text-blue-800"><i class="fas fa-info-circle mr-2"></i> About</a></li>
            <li><a href="contact.php" class="flex items-center p-4 text-blue-800"><i class="fas fa-envelope mr-2"></i> Contact</a></li>
            <li><a href="booking.php" class="flex items-center p-4 text-blue-800"><i class="fas fa-calendar-check mr-2"></i> Booking</a></li>
        </ul>
    </nav>
    <main class="p-8 text-center">
        <img src="assets/images/focusA.png" alt="Focus & Light Logo" class="logo-img mx-auto mb-4">
        <div class="company-description max-w-2xl mx-auto">
            <p class="text-white italic mb-4">"Capturing moments that matter, with creativity that inspires and precision that lasts."</p>
            <p class="text-white">Focus & Light Studio is a professional photography studio in Accra, specializing in capturing unique moments with creativity and impeccable technique. We offer personalized sessions for portraits, product photography, events, and more, using high-end equipment and professional lighting. Our artistic approach and attention to detail ensure memorable images for both personal and corporate clients.</p>
        </div>
        <h1 class="text-4xl font-bold mb-4">Contact Us</h1>
        <div class="contact-container">
            <div class="company-details">
                <h2 class="text-2xl font-bold mb-4">Our Details</h2>
                <p><i class="fas fa-map-marker-alt mr-2"></i>123 Photography Lane, Accra, Ghana</p>
                <p><i class="fas fa-phone mr-2"></i>+233 123 456 789</p>
                <p><i class="fas fa-envelope mr-2"></i>info@focuslight.com</p>
            </div>
            <form class="contact-form">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium">Message</label>
                    <textarea id="message" name="message" class="w-full p-2 border rounded" required></textarea>
                </div>
                <button type="submit" class="btn-primary w-full p-2 rounded">Send</button>
            </form>
        </div>
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Our Location</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.997139427592!2d-0.200615685231!3d5.556295695975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMzMnMjIuNiJOIDDCsDEyJzAwLjIiVw!5e0!3m2!1sen!2sgh!4v1634567890123" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="main-end-line"></div>
    </main>
    <footer class="footer p-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <h3 class="text-lg font-bold">Business Hours</h3>
            <p>Mon-Fri: 9 AM - 6 PM</p>
            <p>Sat: 10 AM - 4 PM</p>
            <p>Sun: Closed</p>
        </div>
        <div>
            <h3 class="text-lg font-bold">Follow Us</h3>
            <div class="flex space-x-4">
                <a href="#"><i class="fab fa-facebook text-2xl"></i></a>
                <a href="#"><i class="fab fa-instagram text-2xl"></i></a>
                <a href="#"><i class="fab fa-tiktok text-2xl"></i></a>
                <a href="#"><i class="fab fa-twitter text-2xl"></i></a>
            </div>
        </div>
        <div>
            <h3 class="text-lg font-bold">Location</h3>
            <p>123 Photography Lane, Accra, Ghana</p>
        </div>
    </footer>
    <script>
        function toggleMenu() {
            document.getElementById('sidebar').classList.toggle('open');
        }
        function logout() {
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>