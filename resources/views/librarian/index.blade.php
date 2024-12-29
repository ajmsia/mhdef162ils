<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">      
<main class="container mx-auto px-6 py-12 text-center">
    <h2 class="text-4xl font-bold mb-8">Librarian Dashboard</h2>

    <div class="mb-12">
        <p class="text-lg mb-6">Choose an option below:</p>
        <div class="space-y-6">
            <!-- View Rooms Button (Top-Left) -->
            <a href="{{ route('rooms.index') }}">
                <button class="absolute top-6 left-6 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                    View Rooms
                </button>
            </a>

            <!-- Main Content Container -->
            <div class="flex flex-wrap justify-center gap-6 mt-24">

                <!-- Reservations Button -->
                <a href="{{ route('reservations.index') }}">
                    <button class="bg-green-500 text-white py-6 px-16 rounded-lg hover:bg-green-600 transition duration-300 text-xl">
                        Reservations
                    </button>
                </a>

                <!-- Request Button -->
                <a href="{{ route('librarian.request') }}">
                    <button class="bg-yellow-500 text-white py-6 px-16 rounded-lg hover:bg-yellow-600 transition duration-300 text-xl">
                        Request
                    </button>
                </a>

                <!-- Consultation Button -->
                <a href="{{ route('librarian.consultation') }}">
                    <button class="bg-purple-500 text-white py-6 px-16 rounded-lg hover:bg-purple-600 transition duration-300 text-xl">
                        Consultation
                    </button>
                </a>

                <!-- Report Button -->
                <a href="{{ route('librarian.report') }}">
                    <button class="bg-red-500 text-white py-6 px-16 rounded-lg hover:bg-red-600 transition duration-300 text-xl">
                        Report
                    </button>
                </a>

            </div>
        </div>
    </div>
</main>
</body>
</html>
