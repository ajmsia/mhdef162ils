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
                window.location.href = "{{ route('user.index') }}"; // Redirect to Patron dashboard
            } else if (role === 'librarian') {
                window.location.href = "{{ route('librarian.index') }}"; // Redirect to Librarian dashboard
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Main Content -->
    @if (Auth::check())
        @php $role = Auth::user()->role; @endphp

        @if ($role === 'patron')
            <!-- Patron Dashboard -->
            <main class="container mx-auto px-6 py-12 text-center">
                <h2 class="text-4xl font-bold mb-8">Patron Dashboard</h2>
                <div class="space-y-6">
                    <button class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Reservation</button>
                    <button class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Request</button>
                    <button class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Consultation</button>
                </div>
            </main>
        @elseif ($role === 'librarian')
            <!-- Librarian Dashboard -->
            <main class="container mx-auto px-6 py-12 text-center">
                <h2 class="text-4xl font-bold mb-8">Librarian Dashboard</h2>
                <div class="space-y-6">
                    <button class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Area Reservation</button>
                    <button class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Request</button>
                    <button class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Consultation</button>
                    <button class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Report</button>
                </div>
            </main>
        @else
            <!-- Default Home Page -->
            <main class="container mx-auto px-6 py-12 text-center">
                <h2 class="text-4xl font-bold mb-8">HOME PAGE</h2>
                <div class="space-y-6">
                    <button onclick="redirectToDashboard('patron')" class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Patron</button>
                    <button onclick="redirectToDashboard('librarian')" class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Librarian</button>
                </div>
                <section class="bg-gray-200 py-8 rounded-md shadow-lg max-w-xl mx-auto mt-8">
                    <h3 class="text-xl font-semibold mb-6">CONTACT US</h3>
                    <p class="text-gray-600 text-lg">SLIS New Building, Quirino Avenue cor. Africa Street, UP Campus Diliman, QC, Quezon City, Philippines</p>
                    <p class="mt-6 text-gray-600 text-lg">Email: <a href="mailto:library.slis.updiliman@up.edu.ph" class="text-blue-500 hover:underline">library.slis.updiliman@up.edu.ph</a></p>
                </section>
            </main>
        @endif
    @else
        <!-- Home Page for Guests -->
        <main class="container mx-auto px-6 py-12 text-center">
            <h2 class="text-4xl font-bold mb-8">HOME PAGE</h2>
            <div class="space-y-6">
                <button onclick="redirectToDashboard('patron')" class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Patron</button>
                <button onclick="redirectToDashboard('librarian')" class="bg-black text-white py-4 px-10 rounded-md w-64 hover:bg-gray-800 transition-all duration-300 text-lg">Librarian</button>
            </div>
            <section class="bg-gray-200 py-8 rounded-md shadow-lg max-w-xl mx-auto mt-8">
                <h3 class="text-xl font-semibold mb-6">CONTACT US</h3>
                <p class="text-gray-600 text-lg">SLIS New Building, Quirino Avenue cor. Africa Street, UP Campus Diliman, QC, Quezon City, Philippines</p>
                <p class="mt-6 text-gray-600 text-lg">Email: <a href="mailto:library.slis.updiliman@up.edu.ph" class="text-blue-500 hover:underline">library.slis.updiliman@up.edu.ph</a></p>
            </section>
        </main>
    @endif
</body>
</html>
