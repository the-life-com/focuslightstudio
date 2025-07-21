<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus & Light Studio - About</title>
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
        .logo-img { width: 100px; height: auto; } /* Smaller, professional logo size like Amazon */
        .team-img { transition: transform 0.3s ease; cursor: pointer; }
        .team-img:hover { transform: scale(1.1); } /* Smooth scaling on hover/click */
        .main-end-line {
            width: 100px;
            height: 4px;
            background-color: #F97316;
            margin: 2rem auto 0;
        }
        .about-section {
            background-image: url('assets/images/luz.jpg');
            background-size: cover;
            background-position: center;
            background-color: rgba(30, 64, 175, 0.5); /* Semi-transparent blue overlay */
            background-blend-mode: overlay;
            padding: 2rem;
            border-radius: 8px;
            color: #FFFFFF; /* White text for contrast */
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
        <h1 class="text-4xl font-bold mb-4">Our Philosophy</h1>
        <p class="mb-6 italic">"Capturing moments that matter, with creativity that inspires and precision that lasts."</p>
        <div class="about-section max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">About Focus & Light Studio</h2>
            <p>Focus & Light Studio is a premier photography studio based in Accra, Ghana. We specialize in creating stunning visuals for portraits, products, events, and more. Our team of skilled photographers and creatives is dedicated to delivering exceptional quality and personalized service. With state-of-the-art equipment and a passion for storytelling, we transform moments into timeless memories.</p>
        </div>
        <h2 class="text-2xl font-bold mb-4 mt-8">Meet Our Team</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="team-member">
                <img src="assets/images/tl.jpg" alt="Jesús Ignacio" class="team-img w-48 h-48 object-cover rounded-full mx-auto">
                <h3 class="text-xl font-bold mt-4">Jesús Ignacio</h3>
                <p class="text-sm italic">Administrator</p>
                <p class="mt-2">Jesús oversees operations at Focus & Light Studio, ensuring seamless client experiences and business efficiency. His leadership drives our commitment to excellence.</p>
                <p class="mt-2"><strong>Email:</strong> <a href="mailto:222128853r@mail.com">222128853r@mail.com</a></p>
                <p><strong>Phone:</strong> +233 (0) 535083826</p>
            </div>
            <div class="team-member">
                <img src="assets/images/yi.jpg" alt="Sarah Mensah" class="team-img w-48 h-48 object-cover rounded-full mx-auto">
                <h3 class="text-xl font-bold mt-4">Sarah Mensah</h3>
                <p class="text-sm italic">Secretary</p>
                <p class="mt-2">Sarah manages scheduling and client communications, providing friendly and professional support to ensure every session runs smoothly.</p>
                <p class="mt-2"><strong>Email:</strong> <a href="mailto:sarah@focuslight.com">sarah@focuslight.com</a></p>
                <p><strong>Phone:</strong> +233 (0) 545123456</p>
            </div>
            <div class="team-member">
                <img src="assets/images/yt.jpg" alt="Kwame Asare" class="team-img w-48 h-48 object-cover rounded-full mx-auto">
                <h3 class="text-xl font-bold mt-4">Kwame Asare</h3>
                <p class="text-sm italic">Cameraman</p>
                <p class="mt-2">Kwame captures stunning visuals with a keen eye for detail, specializing in dynamic event photography and creative portrait sessions.</p>
                <p class="mt-2"><strong>Email:</strong> <a href="mailto:kwame@focuslight.com">kwame@focuslight.com</a></p>
                <p><strong>Phone:</strong> +233 (0) 557890123</p>
            </div>
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