<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patron Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Black Top Menu Bar -->
    <nav class="bg-black border-b border-gray-700">
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
    <main class="container mx-auto px-6 py-12 text-center mt-0">
        <h2 class="text-4xl font-bold mb-8">Patron Dashboard</h2>

        <div class="mb-12">
            <p class="text-lg mb-6">Choose an option below:</p>
            <div class="flex space-x-6 justify-center">

                <!-- Reservations Button -->
                <a href="{{ route('user.reservation') }}">
                    <button class="bg-black text-white py-6 px-12 rounded-lg hover:bg-gray-800 transition duration-300 text-lg">
                        Reservations
                    </button>
                </a>

                <!-- Requests Button -->
                <a href="{{ route('user.request') }}">
                    <button class="bg-black text-white py-6 px-12 rounded-lg hover:bg-gray-800 transition duration-300 text-lg">
                        Requests
                    </button>
                </a>

                <!-- Consultations Button -->
                <a href="{{ route('user.consultation') }}">
                    <button class="bg-black text-white py-6 px-12 rounded-lg hover:bg-gray-800 transition duration-300 text-lg">
                        Consultations
                    </button>
                </a>
            </div>
        </div>
    </main>

    <!-- View Rooms Button -->
    <a href="{{ route('userroom.index') }}">
        <button class="fixed bottom-4 left-4 bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-300 text-sm">
            View Rooms
        </button>
    </a>

</body>
</html>
