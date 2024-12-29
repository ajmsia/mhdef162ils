<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-screen p-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="border-b border-gray-200 bg-slate-800 px-8 py-6">
                    <h1 class="text-3xl font-serif text-white text-center">Reservation Details</h1>
                </div>

                <div class="p-6">
                    <table class="w-full text-sm">
                        <tbody>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50 w-1/3">First Name</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->userFirstName }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">Last Name</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->userLastName }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">Middle Name</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->userMiddleName ?? 'N/A' }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">Email Address</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->upmail }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">College</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->college }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">User Type</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->userType }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">Room</th>
                                <td class="px-6 py-4 text-slate-600">
                                    @foreach($rooms as $room)
                                        @if($room->id == $reservation->roomID)
                                            {{ $room->roomName }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">Reservation Time</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->reserveTime }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">Reservation Date</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->reserveDate }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">Purpose</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->purpose }}</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <th class="px-6 py-4 text-left text-slate-700 font-semibold bg-slate-50">Purpose</th>
                                <td class="px-6 py-4 text-slate-600">{{ $reservation->status }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-8 text-center space-x-4">
                        <!-- Approve Button -->
                        <form action="#" method="POST" class="inline-block">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors duration-200">
                                Approve
                            </button>
                        </form>

                        <!-- Reject Button -->
                        <form action="#" method="POST" class="inline-block">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 transition-colors duration-200">
                                Reject
                            </button>
                        </form>

                        <!-- Archive Button -->
                        <form action="#" method="POST" class="inline-block">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 transition-colors duration-200">
                                Archive
                            </button>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('reservations.index') }}" 
                            class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 transition-colors duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back to Reservations
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>