<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus & Light Studio - Gallery</title>
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
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 2000; }
        .modal img { max-width: 90%; max-height: 90%; margin: auto; }
        .gallery-img { transition: transform 0.3s ease; cursor: pointer; }
        .gallery-img:hover { transform: scale(1.1); }
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
        .download-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #F97316;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 6px;
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 10;
        }
        .relative:hover .download-btn {
            opacity: 1;
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
        <h1 class="text-4xl font-bold mb-4">Our Gallery</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div class="relative">
                <img src="assets/images/anayo.jpg" alt="Portrait" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/anayo.jpg', 'Stunning portrait capturing raw emotion.')">
                <a href="assets/images/anayo.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Stunning portrait capturing raw emotion.</p>
            </div>
            <div class="relative">
                <img src="assets/images/gf.jpg" alt="Portrait" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/gf.jpg', 'Stunning portrait capturing raw emotion.')">
                <a href="assets/images/gf.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Stunning portrait capturing raw emotion.</p>
            </div>
            <div class="relative">
                <img src="assets/images/yhn.jpg" alt="Portrait 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/yhn.jpg', 'Elegant portrait with soft lighting.')">
                <a href="assets/images/yhn.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Elegant portrait with soft lighting.</p>
            </div>
            <div class="relative">
                <img src="assets/images/isula.jpg" alt="Product Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/isula.jpg', 'High-quality product shot for e-commerce.')">
                <a href="assets/images/isula.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">High-quality product shot for e-commerce.</p>
            </div>
            <div class="relative">
                <img src="assets/images/wb.jpg" alt="Product Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/wb.jpg', 'High-quality product shot for e-commerce.')">
                <a href="assets/images/wb.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">High-quality product shot for e-commerce.</p>
            </div>
            <div class="relative">
                <img src="assets/images/hv.jpg" alt="Product Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/hv.jpg', 'Stylish product shot with creative lighting.')">
                <a href="assets/images/hv.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Stylish product shot with creative lighting.</p>
            </div>
            <div class="relative">
                <img src="assets/images/sa.jpg" alt="Event Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/sa.jpg', 'Capturing the joy of a wedding event.')">
                <a href="assets/images/sa.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Capturing the joy of a wedding event.</p>
            </div>
            <div class="relative">
                <img src="assets/images/event.jpg" alt="Event Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/event.jpg', 'Vibrant moments from a corporate event.')">
                <a href="assets/images/event.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Vibrant moments from a corporate event.</p>
            </div>
            <div class="relative">
                <img src="assets/images/azx.webp" alt="Event Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/azx.webp', 'Vibrant moments from a corporate event.')">
                <a href="assets/images/azx.webp" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Vibrant moments from a corporate event.</p>
            </div>
            <div class="relative">
                <img src="assets/images/was.webp" alt="Landscape Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/was.webp', 'Breathtaking landscape shot at sunset.')">
                <a href="assets/images/was.webp" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Breathtaking landscape shot at sunset.</p>
            </div>
            <div class="relative">
                <img src="assets/images/eg.jpg" alt="Landscape Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/eg.jpg', 'Breathtaking landscape shot at sunset.')">
                <a href="assets/images/eg.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Breathtaking landscape shot at sunset.</p>
            </div>
            <div class="relative">
                <img src="assets/images/paz.jpg" alt="Landscape Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/paz.jpg', 'Serene mountain landscape with clear skies.')">
                <a href="assets/images/paz.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Serene mountain landscape with clear skies.</p>
            </div>
            <div class="relative">
                <img src="assets/images/klo.jpg" alt="Family Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/klo.jpg', 'Heartwarming family portrait in the park.')">
                <a href="assets/images/klo.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Heartwarming family portrait in the park.</p>
            </div>
            <div class="relative">
                <img src="assets/images/asd.jpg" alt="Family Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/asd.jpg', 'Heartwarming family portrait in the park.')">
                <a href="assets/images/asd.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Heartwarming family portrait in the park.</p>
            </div>
            <div class="relative">
                <img src="assets/images/25.jpg" alt="Family Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/25.jpg', 'Joyful family moment captured beautifully.')">
                <a href="assets/images/25.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Joyful family moment captured beautifully.</p>
            </div>
            <div class="relative">
                <img src="assets/images/nzl.jpg" alt="Candid Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/nzl.jpg', 'Candid shot of a child playing.')">
                <a href="assets/images/nzl.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Candid shot of a child playing.</p>
            </div>
            <div class="relative">
                <img src="assets/images/mc.jpg" alt="Candid Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/mc.jpg', 'Spontaneous moment captured beautifully.')">
                <a href="assets/images/mc.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Spontaneous moment captured beautifully.</p>
            </div>
            <div class="relative">
                <img src="assets/images/dtr.jpg" alt="Candid Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/dtr.jpg', 'Spontaneous moment captured beautifully.')">
                <a href="assets/images/dtr.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Spontaneous moment captured beautifully.</p>
            </div>
            <div class="relative">
                <img src="assets/images/vcx.jpg" alt="Travel Photography" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/vcx.jpg', 'Exploring the vibrant streets of a new city.')">
                <a href="assets/images/vcx.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Exploring the vibrant streets of a new city.</p>
            </div>
            <div class="relative">
                <img src="assets/images/hgv.jpg" alt="Travel Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/hgv.jpg', 'Stunning architecture captured during travels.')">
                <a href="assets/images/hgv.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Stunning architecture captured during travels.</p>
            </div>
            <div class="relative">
                <img src="assets/images/b.jpg" alt="Travel Photography 2" class="gallery-img w-full h-48 object-cover rounded cursor-pointer" onclick="openModal('assets/images/b.jpg', 'Stunning architecture captured during travels.')">
                <a href="assets/images/b.jpg" download class="download-btn"><i class="fas fa-download"></i></a>
                <p class="text-sm mt-2">Stunning architecture captured during travels.</p>
            </div>
        </div>
        <div class="main-end-line"></div>
    </main>
    <div id="modal" class="modal flex items-center justify-center" onclick="closeModal()">
        <img id="modal-image" src="" alt="Enlarged Image">
        <p id="modal-caption" class="text-white mt-2"></p>
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
        function openModal(src, caption) {
            const modal = document.getElementById('modal');
            document.getElementById('modal-image').src = src;
            document.getElementById('modal-caption').textContent = caption;
            modal.style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>
</body>
</html>