<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLIS ILS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Function to redirect to the appropriate dashboard
        function redirectToDashboard(role) {
            if (role === 'patron') {
                window.location.href = "{{ route('user.index') }}";  // Redirect to Patron dashboard
            } else if (role === 'librarian') {
                window.location.href = "{{ route('librarian.index') }}";  // Redirect to Librarian dashboard
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav x-data="{ open: false }" class="bg-black border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <h1 class="text-white text-2xl font-bold">SLIS ILS</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 text-center">
        <h2 class="text-4xl font-bold mb-8">HOME PAGE</h2>

        <div class="mb-12">
            <p class="text-lg mb-6">Get Started</p>
            <div class="space-y-6">
                <!-- Patron and Librarian Buttons -->
                <button onclick="redirectToDashboard('patron')" class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Patron</button>
                <button onclick="redirectToDashboard('librarian')" class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Librarian</button>
            </div>
        </div>

        <section class="bg-gray-200 py-8 rounded-md shadow-lg max-w-xl mx-auto">
            <h3 class="text-xl font-semibold mb-6">CONTACT US</h3>
            <p class="text-gray-600 text-lg">Location:</p>
            <p class="text-gray-600 text-lg">SLIS New Building, Quirino Avenue cor. Africa Street,</p>
            <p class="text-gray-600 text-lg">UP Campus Diliman, QC, Quezon City, Philippines</p>

            <p class="mt-6 text-gray-600 text-lg">Email: <a href="mailto:library.slis.updiliman@up.edu.ph" class="text-blue-500 hover:underline">library.slis.updiliman@up.edu.ph</a></p>
        </section>
    </main>

</body>
</html>

