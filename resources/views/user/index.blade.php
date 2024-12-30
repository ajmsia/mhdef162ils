<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patron Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">      
    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 text-center">
        <h2 class="text-4xl font-bold mb-8">Patron Dashboard</h2>
        @if(session('success')) <!-- For the message if you successfully applied for reservation -->
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="mb-12">
            <p class="text-lg mb-6">Choose an option below:</p>
            <div class="flex space-x-6 justify-center">

             <!-- Rooms Button -->
             <a href="{{ route('userroom.index') }}">
                    <button class="absolute top-6 left-6 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                        View Rooms
                    </button>
                </a>
                <!-- Reservations Button -->
                <a href="{{ route('user.reservation') }}">
                    <button class="bg-blue-500 text-white py-6 px-12 rounded-lg hover:bg-blue-600 transition duration-300 text-lg">
                        Reservations
                    </button>
                </a>

                <!-- Requests Button -->
                <a href="{{ route('user.request') }}">
                    <button class="bg-green-500 text-white py-6 px-12 rounded-lg hover:bg-green-600 transition duration-300 text-lg">
                        Requests
                    </button>
                </a>

                <!-- Consultations Button -->
                <a href="{{ route('user.consultation') }}">
                    <button class="bg-purple-500 text-white py-6 px-12 rounded-lg hover:bg-purple-600 transition duration-300 text-lg">
                        Consultations
                    </button>
                </a>
            </div>
        </div>
    </main>
</body>
</html>
