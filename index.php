<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Focus & Light Studio - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: rgba(30, 64, 175, 1, 0.5); color: #FFFFFF;  background-image: url('assets/images/gcx.webp'); }
        .login-container, .register-container { background-color: #FFFFFF; color: #1E40AF; }
        .btn-primary { background-color: #F97316; color: #FFFFFF; }
        .btn-primary:hover { background-color: #EA580C; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div id="login-container" class="login-container p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login to Focus & Light Studio</h2>
        <form action="auth.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="btn-primary w-full p-2 rounded">Login</button>
        </form>
        <button onclick="showRegister()" class="mt-4 text-sm underline">New Registration</button>
    </div>
    <div id="register-container" class="register-container p-8 rounded-lg shadow-lg w-full max-w-md hidden">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form action="register.php" method="POST">
            <div class="mb-4">
                <label for="reg-name" class="block text-sm font-medium">Name</label>
                <input type="text" id="reg-name" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="reg-email" class="block text-sm font-medium">Email</label>
                <input type="email" id="reg-email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="reg-password" class="block text-sm font-medium">Password</label>
                <input type="password" id="reg-password" name="password" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="btn-primary w-full p-2 rounded">Register</button>
        </form>
        <button onclick="showLogin()" class="mt-4 text-sm underline">Back to Login</button>
    </div>
    <script>
        function showRegister() {
            document.getElementById('login-container').classList.add('hidden');
            document.getElementById('register-container').classList.remove('hidden');
        }
        function showLogin() {
            document.getElementById('register-container').classList.add('hidden');
            document.getElementById('login-container').classList.remove('hidden');
        }
    </script>
</body>
</html>