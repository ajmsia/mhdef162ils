<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">      
    <div class="flex space-x-4 mt-6">
        <!-- Rooms Button -->
        <a href="{{ route('userroom.index') }}">
            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                View Rooms
            </button>
        </a>

        <!-- Reservations Button -->
        <a href="#">
            <button class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300">
                Make a Reservation
            </button>
        </a>
    </div>
</body>
</html>