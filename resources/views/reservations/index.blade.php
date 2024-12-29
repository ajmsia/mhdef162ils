<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        @if(session('success')) <!-- For the message if you successfully applied for reservation -->
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('reservations.create') }}" class="no-underline">
                <button type="button" class="bg-green-500 text-white py-3 px-6 rounded-lg text-lg hover:bg-green-600 transition duration-300">
                    Add Reservation
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
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left">First Name</th>
                        <th class="py-3 px-6 text-left">Last Name</th>
                        <th class="py-3 px-6 text-left">User Type</th>
                        <th class="py-3 px-6 text-left">Room Name</th>
                        <th class="py-3 px-6 text-left">Reserve Date</th>
                        <th class="py-3 px-6 text-left">Reserve Time</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody id="reservationsTable">
                    @foreach($reservations as $reservation)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">
                            <a href="{{ route('reservations.show', ['reservation' => $reservation->id]) }}">
                                {{ $reservation->userFirstName }}
                            </a>
                        </td>

                        <td class="py-3 px-6">{{ $reservation->userLastName }}</td>
                        <td class="py-3 px-6">{{ $reservation->userType }}</td>
                        <td class="py-3 px-6">
                            @foreach($rooms as $room)
                                @if($room->id == $reservation->roomID)
                                    {{ $room->roomName }}
                                @endif
                            @endforeach
                        </td>
                        <td class="py-3 px-6">{{ date('M d, Y', strtotime($reservation->reserveDate)) }}</td>
                        <td class="py-3 px-6">{{ date('h:i A', strtotime($reservation->reserveTime)) }}</td>
                        <td class="py-3 px-6">{{ $reservation->status }}</td>
                        <td class="py-3 px-6">
                            <form action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" 
                                        class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-blue-600">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" 
                                        class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-blue-600">
                                    Reject
                                </button>
                            </form>

                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 text-white bg-gray-500 rounded-lg hover:bg-gray-600">
                                    Archive
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
