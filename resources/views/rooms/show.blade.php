<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Top Navigation -->
    <nav class="bg-black border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
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
        <a href="{{ route('rooms.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Main Content -->
    <div class="flex justify-center items-center py-6">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl w-full">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Room Details</h1>
            <div class="flex flex-col items-center">
                <!-- Room Image -->
                @if(is_object($rooms) && $rooms->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $rooms->image) }}" alt="Room Image" class="w-full max-w-sm rounded-lg shadow-md">
                    </div>
                @else
                    <p class="text-gray-500">No image available for this room.</p>
                @endif

                <!-- Room Details -->
                <div class="w-full">
                    <p class="text-lg text-gray-700"><strong>Room Name:</strong> {{ $rooms->roomName }}</p>
                    <p class="text-lg text-gray-700"><strong>Room Capacity:</strong> {{ $rooms->roomCapacity }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
