<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms Available for Reservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">

    <!-- Navbar -->
    <nav x-data="{ open: false }" class="bg-black border-b border-gray-700 relative">
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
        <a href="{{ route('reservations.usercreate') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
        <h2 class="text-4xl font-bold text-center mb-8">Available Rooms for Reservation</h2>

        <div class="bg-gray-200 p-8 rounded-md shadow-lg">
            <table class="min-w-full bg-white border-separate border-spacing-0">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Room Name</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Room Capacity</th>
                        <th class="py-3 px-6 text-left border-b border-gray-300">Room Image</th>
                    </tr>
                </thead>
                <tbody id="roomTable">
                    @foreach($rooms as $room)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 border-r border-gray-300">
                            <a href="{{ route('rooms.show', ['room' => $room->id]) }}" class="text-black hover:text-blue-500">
                                {{ $room->roomName }}
                            </a>
                        </td>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $room->roomCapacity }}</td>
                        <td class="py-3 px-6">
                            @if($room->image)
                                <div class="mb-4">
                                    <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" class="w-full max-w-sm rounded-lg shadow-md">
                                </div>
                            @else
                                <p class="text-gray-500">No image available for this room.</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
