<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patron Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<!-- Header -->
<div class="bg-black h-16 w-full absolute top-0 left-0">

<nav x-data="{ open: false }" class="bg-black border-b">
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
</div>

</div>

<body class="bg-gray-100 p-6">      

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 mb-4 text-center">
        <h2 class="text-4xl font-bold mb-8 mt-10">Patron Dashboard</h2>

        <div class="mb-12">
            <p class="text-lg mb-10">Choose an option below:</p>
            <div class="flex space-x-6 justify-center">

            <!-- Main Content Container -->
            <div class="flex flex-wrap justify-center gap-6 mt-23">

                <div class="flex flex-col">
                <!-- Reservations Button -->
                <a href="{{ route('user.reservation') }}">
                    <button class="mt-5 bg-blue-500 text-white py-6 px-12 rounded-lg hover:bg-blue-600 transition duration-300 text-lg">
                        Reservations
                    </button>
                </a>

             <!-- Rooms Button -->
             <a href="{{ route('userroom.index') }}">
                    <button class="mt-2 top-6 left-6 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                        View Rooms
                    </button>
                </a>
                </div>

                <!-- Requests Button -->
                <a href="{{ route('user.request') }}">
                    <button class="mt-5 bg-green-500 text-white py-6 px-12 rounded-lg hover:bg-green-600 transition duration-300 text-lg">
                        Requests
                    </button>
                </a>

                <!-- Consultations Button -->
                <a href="{{ route('user.consultation') }}">
                    <button class="mt-5 bg-purple-500 text-white py-6 px-12 rounded-lg hover:bg-purple-600 transition duration-300 text-lg">
                        Consultations
                    </button>
                </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
