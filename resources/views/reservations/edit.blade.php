<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
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
        <a href="{{ route('reservations.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 text-center">
        <h2 class="text-4xl font-bold mb-8">Edit Reservation</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Reservation Edit Form -->
        <div class="bg-gray-200 p-8 rounded-md shadow-lg max-w-4xl mx-auto">
            <form action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- First Name -->
                <div class="mb-4">
                    <label for="userFirstName" class="block text-sm font-medium text-gray-700 mb-3">First Name</label>
                    <input type="text" id="userFirstName" name="userFirstName" value="{{ $reservation->userFirstName }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label for="userLastName" class="block text-sm font-medium text-gray-700 mb-3">Last Name</label>
                    <input type="text" id="userLastName" name="userLastName" value="{{ $reservation->userLastName }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="upmail" class="block text-sm font-medium text-gray-700 mb-3">Email Address</label>
                    <input type="email" id="upmail" name="upmail" value="{{ $reservation->upmail }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- User Type -->
                <div class="mb-4">
                    <label for="userType" class="block text-sm font-medium text-gray-700 mb-3">User Type</label>
                    <input type="text" id="userType" name="userType" value="{{ $reservation->userType }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- College -->
                <div class="mb-4">
                    <label for="college" class="block text-sm font-medium text-gray-700 mb-3">College</label>
                    <input type="text" id="college" name="college" value="{{ $reservation->college }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Room -->
                <div class="mb-4">
                    <label for="roomID" class="block text-sm font-medium text-gray-700 mb-3">Room</label>
                    <select id="roomID" name="roomID" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ $room->id == $reservation->roomID ? 'selected' : '' }}>{{ $room->roomName }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Reservation Time -->
                <div class="mb-4">
                    <label for="reserveTime" class="block text-sm font-medium text-gray-700 mb-3">Reservation Time</label>
                    <select id="reserveTime" name="reserveTime" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="08:00" {{ $reservation->reserveTime == '08:00' ? 'selected' : '' }}>8:00 AM</option>
                        <option value="09:00" {{ $reservation->reserveTime == '09:00' ? 'selected' : '' }}>9:00 AM</option>
                        <option value="10:00" {{ $reservation->reserveTime == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                        <option value="11:00" {{ $reservation->reserveTime == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                        <option value="12:00" {{ $reservation->reserveTime == '12:00' ? 'selected' : '' }}>12:00 PM</option>
                        <option value="13:00" {{ $reservation->reserveTime == '13:00' ? 'selected' : '' }}>1:00 PM</option>
                        <option value="14:00" {{ $reservation->reserveTime == '14:00' ? 'selected' : '' }}>2:00 PM</option>
                        <option value="15:00" {{ $reservation->reserveTime == '15:00' ? 'selected' : '' }}>3:00 PM</option>
                        <option value="16:00" {{ $reservation->reserveTime == '16:00' ? 'selected' : '' }}>4:00 PM</option>
                        <option value="17:00" {{ $reservation->reserveTime == '17:00' ? 'selected' : '' }}>5:00 PM</option>
                        <option value="18:00" {{ $reservation->reserveTime == '18:00' ? 'selected' : '' }}>6:00 PM</option>
                    </select>
                </div>

                <!-- Reservation Date -->
                <div class="mb-4">
                    <label for="reserveDate" class="block text-sm font-medium text-gray-700 mb-3">Reservation Date</label>
                    <input type="date" id="reserveDate" name="reserveDate" value="{{ $reservation->reserveDate }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>


                <!-- Purpose -->
                <div class="mb-4">
                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-3">Purpose</label>
                    <input type="text" id="purpose" name="purpose" value="{{ $reservation->purpose }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center mt-6 gap-4">
                    <button type="button" onclick="window.location.href='{{ route('reservations.index') }}';" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300">Update</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
