<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <div>
            <a href="{{ route('rooms.create') }}" class="no-underline">
                <button type="button" class="bg-green-500 text-white py-3 px-6 rounded-lg text-lg hover:bg-green-600 transition duration-300">
                    Add Room
                </button>
            </a>
        </div>
        
        <div>
            <a href="{{ route('librarian.index') }}" class="no-underline">
                <button type="button" class="bg-green-500 text-white py-3 px-6 rounded-lg text-lg hover:bg-green-600 transition duration-300">
                    Back
                </button>
            </a>
        </div>

        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left">Room Name</th>
                        <th class="py-3 px-6 text-left">Room Capacity</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody id="roomTable">
                    @foreach($rooms as $room)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">
                            <a href="{{ route('rooms.show', ['room' => $room->id]) }}">
                                {{ $room->roomName }}
                            </a>
                        </td>
                        <td class="py-3 px-6">{{ $room->roomCapacity }}</td>
                        <td class="py-3 px-6">
                            <a href="{{ route('rooms.edit', $room->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                Edit
                            </a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this room?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
