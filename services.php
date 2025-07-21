<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus & Light Studio - Services</title>
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
        .service-img { transition: transform 0.3s ease; cursor: pointer; }
        .service-img:hover { transform: scale(1.1); }
        .main-end-line {
            width: 100px;
            height: 4px;
            background-color: #F97316;
            margin: 2rem auto 0;
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
        <button onclick="toggleMenu()" class="text-white"><i class="fas fa-home text-2xl"></i></button>\
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
    <main class="p-8">
        <h1 class="text-4xl font-bold mb-4">Our Services</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-4 border rounded">
                <img src="assets/images/tt.jpg" alt="Portraits" class="service-img w-full h-48 object-cover rounded mb-4">
                <h2 class="text-2xl font-bold">Portraits</h2>
                <p><strong>Duration:</strong> 1 hour</p>
                <p><strong>Includes:</strong> 10 edited photos, studio lighting, multiple backgrounds</p>
                <p><strong>Price:</strong> ₵100</p>
                <button onclick="showDetails('Portraits')" class="btn-primary p-2 rounded mt-2">More Details</button>
                <a href="booking.php?service=Portraits&price=100" class="btn-primary p-2 rounded mt-2 ml-2">Book Now</a>
                <div id="details-Portraits" class="hidden mt-2">
                    <p>Our portrait sessions are tailored to capture your personality with professional lighting and creative compositions.</p>
                </div>
            </div>
            <div class="p-4 border rounded">
                <img src="assets/images/uty.avif" alt="Birthday Photography" class="service-img w-full h-48 object-cover rounded mb-4">
                <h2 class="text-2xl font-bold">Birthday Photography</h2>
                <p><strong>Duration:</strong> 2 hours</p>
                <p><strong>Includes:</strong> 30 edited photos, candid moments, event highlights, cake shots</p>
                <p><strong>Price:</strong> ₵250</p>
                <button onclick="showDetails('Birthday Photography')" class="btn-primary p-2 rounded mt-2">More Details</button>
                <a href="booking.php?service=Birthday%20Photography&price=250" class="btn-primary p-2 rounded mt-2 ml-2">Book Now</a>
                <div id="details-Birthday Photography" class="hidden mt-2">
                    <p>Our birthday photography packages are designed to capture the joy and excitement of your special day.</p>
                </div>
            </div>
            <div class="p-4 border rounded">
                <img src="assets/images/mc.jpg" alt="Sports" class="service-img w-full h-48 object-cover rounded mb-4">
                <h2 class="text-2xl font-bold">Sports</h2>
                <p><strong>Duration:</strong> 2 hours</p>
                <p><strong>Includes:</strong> 40 action shots, edited highlight reel, team photos</p>
                <p><strong>Price:</strong> ₵300</p>
                <button onclick="showDetails('Sports')" class="btn-primary p-2 rounded mt-2">More Details</button>
                <a href="booking.php?service=Sports&price=300" class="btn-primary p-2 rounded mt-2 ml-2">Book Now</a>
                <div id="details-Sports" class="hidden mt-2">
                    <p>Our sports photography captures the intensity and excitement of athletic events.</p>
                </div>
            </div>
            <div class="p-4 border rounded">
                <img src="assets/images/tgf.jpg" alt="Sports" class="service-img w-full h-48 object-cover rounded mb-4">
                <h2 class="text-2xl font-bold">Product Photography</h2>
                <p><strong>Duration:</strong> 2 hours</p>
                <p><strong>Includes:</strong> 20 edited photos, custom setups, high-resolution images</p>
                <p><strong>Price:</strong> ₵450</p>
                <button onclick="showDetails('Product Photography')" class="btn-primary p-2 rounded mt-2">More Details</button>
                <a href="booking.php?service=Product%20Photography&price=200" class="btn-primary p-2 rounded mt-2 ml-2">Book Now</a>
                <div id="details-Product Photography" class="hidden mt-2">
                    <p>Perfect for e-commerce, our product photography highlights your items with clarity and appeal.</p>
                </div>
            </div>
            <div class="p-4 border rounded">
                <img src="assets/images/hyr.jpg" alt="Sports" class="service-img w-full h-48 object-cover rounded mb-4">
                <h2 class="text-2xl font-bold">Weddings Photography</h2>
                <p><strong>Duration:</strong> full day (8 hrs)</p>
                <p><strong>Includes:</strong> 150+ edited photos, pre-wedding shoot, reception coverage, couple portraits</p>
                <p><strong>Price:</strong> ₵1200</p>
                <button onclick="showDetails('Weddings Photography')" class="btn-primary p-2 rounded mt-2">More Details</button>
                <a href="booking.php?service=Weddings%20Photography&price=1200" class="btn-primary p-2 rounded mt-2 ml-2">Book Now</a>
                <div id="details-Weddings Photography" class="hidden mt-2">
                    <p>Our wedding photography service captures the beauty and emotion of your special day.</p>
                </div>
            </div>
            <div class="p-4 border rounded">
                <img src="assets/images/ghc.jpg" alt="Sports" class="service-img w-full h-48 object-cover rounded mb-4">
                <h2 class="text-2xl font-bold">Commercial Photography</h2>
                <p><strong>Duration:</strong> 3 hours</p>
                <p><strong>Includes:</strong> 	50 high-resolution product images, custom setups, lighting & retouching</p>
                <p><strong>Price:</strong> ₵800</p>
                <button onclick="showDetails('Commercial Photography')" class="btn-primary p-2 rounded mt-2">More Details</button>
                <a href="booking.php?service=Commercial%20Photography&price=800" class="btn-primary p-2 rounded mt-2 ml-2">Book Now</a>
                <div id="details-Commercial Photography" class="hidden mt-2">
                    <p>Perfect for e-commerce, our commercial photography highlights your items with clarity and appeal.</p>
                </div>
            </div>
            <div class="p-4 border rounded">
                <img src="assets/images/hnv.jpg" alt="Sports" class="service-img w-full h-48 object-cover rounded mb-4">
                <h2 class="text-2xl font-bold">Events Photography</h2>
                <p><strong>Duration:</strong> 3 hours min.</p>
                <p><strong>Includes:</strong> 	60+ edited photos, crowd moments, speaker/stage coverage</p>
                <p><strong>Price:</strong> ₵500</p>
                <button onclick="showDetails('Events Photography')" class="btn-primary p-2 rounded mt-2">More Details</button>
                <a href="booking.php?service=Events%20Photography&price=500" class="btn-primary p-2 rounded mt-2 ml-2">Book Now</a>
                <div id="details-Events Photography" class="hidden mt-2">
                    <p>Perfect for capturing the essence of your event, our events photography service ensures no moment is missed.</p>
                </div>
            </div>
            <div class="p-4 border rounded">
                <img src="assets/images/nbh.jpg" alt="Sports" class="service-img w-full h-48 object-cover rounded mb-4">
                <h2 class="text-2xl font-bold">Family Photography</h2>
                <p><strong>Duration:</strong> 1.5 hours</p>
                <p><strong>Includes:</strong> 	20 edited photos, group & individual shots, studio or outdoor session</p>
                <p><strong>Price:</strong> ₵350</p>
                <button onclick="showDetails('Family Photography')" class="btn-primary p-2 rounded mt-2">More Details</button>
                <a href="booking.php?service=Family%20Photography&price=350" class="btn-primary p-2 rounded mt-2 ml-2">Book Now</a>
                <div id="details-Family Photography" class="hidden mt-2">
                    <p>Perfect for capturing the love and connection within your family, our family photography service creates lasting memories.</p>
                </div>
            </div>
            <!-- Add more services similarly -->
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
        function showDetails(service) {
            document.getElementById(`details-${service}`).classList.toggle('hidden');
        }
    </script>
</body>
</html>