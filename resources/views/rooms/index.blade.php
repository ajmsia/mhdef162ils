<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">

    <!-- Navbar -->
    <nav class="bg-black border-b border-gray-700 relative">
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

                <!-- Buttons Container (Add Room) -->
                <div class="flex space-x-4 absolute top-4 right-4">
                    <!-- Add Room Button -->
                    <a href="{{ route('rooms.create') }}">
                        <button class="bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-300 text-sm">
                            Add Room
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Back Button -->
    <div class="flex justify-start mt-8 px-6">
        <a href="{{ route('reservations.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Table Heading -->
    <h2 class="text-4xl font-bold text-center mb-3 mt-2">Rooms</h2>

    <!-- Rooms Table -->
    <div class="container mx-auto px-6 py-12">
        <div class="overflow-x-auto bg-gray-200 p-8 rounded-md shadow-lg">
            <table class="min-w-full bg-white border-separate border-spacing-0">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Room Name</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Room Capacity</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Actions</th>
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
                            <!-- Action Buttons Container with spacing -->
                            <div class="flex space-x-4">
                                <a href="{{ route('rooms.edit', $room->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                    Edit
                                </a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this room?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
