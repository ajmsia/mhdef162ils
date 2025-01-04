<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests Table</title>
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

                <!-- Buttons Container (Add Reservation and View Rooms) -->
                <div class="flex space-x-4 absolute top-4 right-4">
                    <!-- Add Reservation Button -->
                    <a href="{{ route('reservations.create') }}">
                        <button class="bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-300 text-sm">
                            Add Reservation
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </nav>

    <!-- Back Button -->
    <div class="flex justify-start mt-8 px-6">
        <a href="{{ route('librarian.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <h2 class="text-4xl font-bold text-center mb-4">Requests</h2>
    <div class="container mx-auto px-6 py-12">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Requests Table -->
        <div class="bg-gray-200 p-8 rounded-md shadow-lg">
            <table class="min-w-full bg-white border-separate border-spacing-0">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">First Name</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Last Name</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">User Type</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Title</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Resource Type</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Tuklas Link</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Request Date</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Status</th>
                        <th class="py-3 px-6 text-left border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody id="reservationsTable">
                    @foreach($requests as $request)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 border-r border-gray-300">
                            <a href="{{ route('reservations.show', ['reservation' => $reservation->id]) }}" class="text-black hover:text-blue-500">
                                {{ $requests->userFirstName }}
                            </a>
                        </td>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $reservation->userLastName }}</td>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $reservation->userType }}</td>
                        <td class="py-3 px-6 border-r border-gray-300">
                            @foreach($rooms as $room)
                                @if($room->id == $reservation->roomID)
                                    {{ $room->roomName }}
                                @endif
                            @endforeach
                        </td>
                        <td class="py-3 px-6 border-r border-gray-300">{{ date('M d, Y', strtotime($reservation->reserveDate)) }}</td>
                        <td class="py-3 px-6 border-r border-gray-300">{{ date('h:i A', strtotime($reservation->reserveTime)) }}</td>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $reservation->status }}</td>
                        <td class="py-3 px-6">
                            <!-- Action Buttons Container with spacing -->
                            <div class="flex space-x-4">
                                <a href="{{ route('reservations.edit', ['reservation' => $reservation->id]) }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                    Edit
                                </a>

                                <form action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-blue-600">
                                        Approve
                                    </button>
                                </form>

                                <form action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-blue-600">
                                        Reject
                                    </button>
                                </form>

                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-white bg-gray-500 rounded-lg hover:bg-gray-600">
                                        Archive
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
