<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-3xl bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Room Details</h1>
        <div class="flex flex-col items-center">
            <!-- Allows us to display image of the room-->
            @if(is_object($rooms) && $rooms->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $rooms->image) }}" alt="Room Image" class="w-full max-w-sm rounded-lg shadow-md">
                </div>
            @else
                <p class="text-gray-500">No image available for this room.</p>
            @endif
            <div class="w-full">
                <p class="text-lg text-gray-700"><strong>Room Name:</strong> {{ $rooms->roomName }}</p>
                <p class="text-lg text-gray-700"><strong>Room Capacity:</strong> {{ $rooms->roomCapacity }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('rooms.index') }}">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                        Back to Room List
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
