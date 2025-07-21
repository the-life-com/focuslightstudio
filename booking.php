<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus & Light Studio - Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <style>
        body { background-color: #ffffffff; color: #1E40AF; }
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
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 2000; }
        .modal-content { background: white; padding: 20px; max-width: 90%; max-height: 90%; overflow-y: auto; }
        .main-end-line {
            width: 100px;
            height: 4px;
            background-color: #F97316;
            margin: 2rem auto 0;
        }
        .logo { width: 150px; height: auto; margin: 0 auto 1rem; display: block; }
        .gallery-img { transition: transform 0.3s ease; cursor: pointer; }
        .gallery-img:hover { transform: scale(1.1); }
        .service-box {
            position: fixed;
            top: 20%;
            right: 20px;
            width: 200px;
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #F97316;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1500;
            cursor: move;
        } 
        .emoji {
            font-size: 24px;
            text-align: center;
            margin-bottom: 0.5rem;
        }
        .emoji.happy {
            animation: shake 0.5s ease-in-out;
        }
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
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
    <main class="p-8">
        <img src="assets/images/focusA.png" alt="Focus & Light Studio Logo" class="logo">
        <h1 class="text-4xl font-bold mb-4">Book Your Session</h1>
        <div class="mb-4">
            <p><strong>Service:</strong> <span id="service"><?php echo isset($_GET['service']) ? $_GET['service'] : 'Select a service'; ?></span></p>
            <p><strong>Price:</strong> ₵<span id="price"><?php echo isset($_GET['price']) ? $_GET['price'] : '0'; ?></span></p>
        </div>
        <form id="booking-form" class="max-w-md mx-auto">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium">Phone</label>
                <input type="tel" id="phone" name="phone" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium">Date</label>
                <input type="date" id="date" name="date" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="time" class="block text-sm font-medium">Time</label>
                <input type="time" id="time" name="time" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium">Location</label>
                <input type="text" id="location" name="location" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="payment" class="block text-sm font-medium">Payment Method</label>
                <select id="payment" name="payment" class="w-full p-2 border rounded" required>
                    <option value="mtn-momo">MTN MoMo</option>
                    <option value="card">Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" required>
                    <span class="ml-2">I agree to the <a href="#" onclick="showTerms()">Terms and Conditions</a></span>
                </label>
            </div>
            <button type="button" onclick="processPayment()" class="btn-primary w-full p-2 rounded">Confirm Booking</button>
        </form>
        <div class="main-end-line"></div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6">
            <img src="assets/images/ph.jpg" alt="Sample Photo 1" class="gallery-img w-full h-48 object-cover rounded">
            <img src="assets/images/camera.jpg" alt="Sample Photo 2" class="gallery-img w-full h-48 object-cover rounded">
            <img src="assets/images/gto.jpg" alt="Sample Photo 3" class="gallery-img w-full h-48 object-cover rounded">
        </div>
        <div class="main-end-line"></div>
    </main>
    <!--div id="service-box" class="service-box" draggable="true">
        <div class="emoji">📸</div>
        <p><strong>Service:</strong> <span id="service-box-service"><?php echo isset($_GET['service']) ? $_GET['service'] : 'Select a service'; ?></span></p>
        <p><strong>Price:</strong> ₵<span id="service-box-price"><?php echo isset($_GET['price']) ? $_GET['price'] : '0'; ?></span></p>
    </div-->
    <div id="terms-modal" class="modal flex items-center justify-center">
        <div class="modal-content">
            <h2 class="text-2xl font-bold mb-4">Terms and Conditions</h2>
            <p>By booking with Focus & Light Studio, you agree to our terms, including a 2% transaction fee, non-refunded cancellations within 24 hours, and adherence to our studio policies.</p>
            <button onclick="closeTerms()" class="btn-primary p-2 rounded mt-4">Close</button>
        </div>
    </div>
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
        function showTerms() {
            document.getElementById('terms-modal').style.display = 'flex';
        }
        function closeTerms() {
            document.getElementById('terms-modal').style.display = 'none';
        }
        function processPayment() {
            const price = parseFloat(document.getElementById('price').textContent) * 100; // Convert to cents
            const tax = price * 0.02;
            const total = price + tax;
            const email = document.getElementById('email').value;

            const handler = PaystackPop.setup({
                key: 'pk_test_d6fbbaa96b50ad72fec5742b9d0a7e5f8dfd440f', // Replace with your Paystack public key
                email: email,
                amount: total,
                currency: 'GHS',
                callback: function(response) {
                    alert('Payment successful! Reference: ' + response.reference);
                    document.getElementById('booking-form').submit();
                    // Animate emoji on successful payment
                    const emoji = document.querySelector('.emoji');
                    emoji.textContent = '😊';
                    emoji.classList.add('happy');
                    setTimeout(() => emoji.classList.remove('happy'), 500);
                },
                onClose: function() {
                    alert('Payment cancelled.');
                }
            });
            handler.openIframe();
        }
        // Draggable service box
        const serviceBox = document.getElementById('service-box');
        let isDragging = false;
        let currentX;
        let currentY;
        let initialX;
        let initialY;

        serviceBox.addEventListener('dragstart', (e) => {
            initialX = e.clientX - currentX;
            initialY = e.clientY - currentY;
            isDragging = true;
        });

        document.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        document.addEventListener('dragend', (e) => {
            if (isDragging) {
                currentX = e.clientX - initialX;
                currentY = e.clientY - initialY;
                serviceBox.style.left = currentX + 'px';
                serviceBox.style.top = currentY + 'px';
                isDragging = false;
            }
        });

        // Initialize position
        currentX = 20;
        currentY = 20;
        serviceBox.style.left = currentX + 'px';
        serviceBox.style.top = currentY + 'px';
    </script>
</body>
</html>