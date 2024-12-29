<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms Available for Reservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">       
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left">Room Name</th>
                        <th class="py-3 px-6 text-left">Room Capacity</th>
                        <th class="py-3 px-6 text-left">Room Image</th>
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
                            @if($room->image) <!-- displays image of the room -->
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
            <div class="mt-6">
                <a href="{{ route('user.index') }}">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>