<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patron Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans"> <!-- Changed bg-gray-100 to bg-white -->

    <!-- Black Top Menu Bar -->
    <nav class="bg-black border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="http://mhdef162ils.test">
                            <h1 class="text-white text-2xl font-bold">SLIS ILS</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Back Button -->
    <div class="flex justify-start mt-8 px-6">
        <a href="http://mhdef162ils.test">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 text-center mt-0">
        <h2 class="text-4xl font-bold mb-8">Patron Dashboard</h2>

        @if(session('success')) <!-- For the message if you successfully applied for reservation -->
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="mb-12">
            <p class="text-lg mb-6">Choose a service below:</p>
            <div class="flex space-x-6 justify-center">


            <!-- Main Content Container -->
            <div class="flex flex-wrap justify-center gap-6">

                <div class="flex flex-col">
                <!-- Reservations Button -->
                <a href="{{ route('reservations.usercreate') }}">
                    <button class="bg-black text-white py-6 px-12 rounded-lg hover:bg-gray-800 transition duration-300 text-lg">
                        Reservations
                    </button>
                </a>
                </div>

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
        </div>
    </div>
</main>

</body>
</html>
