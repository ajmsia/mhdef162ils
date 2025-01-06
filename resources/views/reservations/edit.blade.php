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
    <main class="container mx-auto px-6 py-12 text-center align-content-center">
        <h2 class="text-4xl font-bold mb-8">Edit Reservation</h2>

        <div class="bg-gray-200 p-8 rounded-md shadow-lg max-w-4xl mx-auto flex items-center justify-center">
            <form action="{{ route('reservations.update', ['reservation' => $reservation->id]) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="flex flex-col md:flex-row gap-4">
                    <!-- First Name -->
                    <div class="mb-4 flex-1">
                        <label for="userFirstName" class="block text-sm font-medium text-gray-700 mb-3">First Name</label>
                        <input type="text" id="userFirstName" name="userFirstName" value="{{ $reservation->userFirstName }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Last Name -->
                    <div class="mb-4 flex-1">
                        <label for="userLastName" class="block text-sm font-medium text-gray-700 mb-3">Last Name</label>
                        <input type="text" id="userLastName" name="userLastName" value="{{ $reservation->userLastName }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="upmail" class="block text-sm font-medium text-gray-700 mb-3">Email Address</label>
                    <input type="email" id="upmail" name="upmail" value="{{ $reservation->upmail }}" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <!-- User Type -->
                    <div class="mb-4">
                        <label for="userType" class="block text-sm font-medium text-gray-700 mb-3">User Type</label>
                        <select id="userType" name="userType" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            <option value="Undergraduate student" {{ $reservation->userType == 'Undergraduate student' ? 'selected' : '' }}>Undergraduate student</option>
                            <option value="Graduate student" {{ $reservation->userType == 'Graduate student' ? 'selected' : '' }}>Graduate student</option>
                            <option value="Faculty" {{ $reservation->userType == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                            <option value="Staff" {{ $reservation->userType == 'Staff' ? 'selected' : '' }}>Staff</option>
                            <option value="Reps" {{ $reservation->userType == 'Reps' ? 'selected' : '' }}>Reps</option>
                            <option value="Alumni" {{ $reservation->userType == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                        </select>
                    </div>

                    <!-- College -->
                    <div class="mb-4">
                        <label for="college" class="block text-sm font-medium text-gray-700 mb-3">College</label>
                        <select id="college" name="college" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            <option value="N/A" {{ $reservation->college == 'N/A' ? 'selected' : '' }}>N/A</option>
                            <option value="College of Arts and Letters" {{ $reservation->college == 'College of Arts and Letters' ? 'selected' : '' }}>College of Arts and Letters</option>
                            <option value="College of Fine Arts" {{ $reservation->college == 'College of Fine Arts' ? 'selected' : '' }}>College of Fine Arts</option>
                            <option value="College of Human Kinetics" {{ $reservation->college == 'College of Human Kinetics' ? 'selected' : '' }}>College of Human Kinetics</option>
                            <option value="College of Mass Communication" {{ $reservation->college == 'College of Mass Communication' ? 'selected' : '' }}>College of Mass Communication</option>
                            <option value="College of Music" {{ $reservation->college == 'College of Music' ? 'selected' : '' }}>College of Music</option>
                            <option value="Asian Institute of Tourism" {{ $reservation->college == 'Asian Institute of Tourism' ? 'selected' : '' }}>Asian Institute of Tourism</option>
                            <option value="Cesar E.A. Virata School of Business" {{ $reservation->college == 'Cesar E.A. Virata School of Business' ? 'selected' : '' }}>Cesar E.A. Virata School of Business</option>
                            <option value="School of Economics" {{ $reservation->college == 'School of Economics' ? 'selected' : '' }}>School of Economics</option>
                            <option value="School of Labor and Industrial Relations" {{ $reservation->college == 'School of Labor and Industrial Relations' ? 'selected' : '' }}>School of Labor and Industrial Relations</option>
                            <option value="National College of Public Administration and Governance" {{ $reservation->college == 'National College of Public Administration and Governance' ? 'selected' : '' }}>National College of Public Administration and Governance</option>
                            <option value="School of Urban and Regional Planning" {{ $reservation->college == 'School of Urban and Regional Planning' ? 'selected' : '' }}>School of Urban and Regional Planning</option>
                            <option value="Technology Management Center" {{ $reservation->college == 'Technology Management Center' ? 'selected' : '' }}>Technology Management Center</option>
                            <option value="School of Archaeology" {{ $reservation->college == 'School of Archaeology' ? 'selected' : '' }}>School of Archaeology</option>
                            <option value="College of Architecture" {{ $reservation->college == 'College of Architecture' ? 'selected' : '' }}>College of Architecture</option>
                            <option value="College of Engineering" {{ $reservation->college == 'College of Engineering' ? 'selected' : '' }}>College of Engineering</option>
                            <option value="College of Home Economics" {{ $reservation->college == 'College of Home Economics' ? 'selected' : '' }}>College of Home Economics</option>
                            <option value="College of Science" {{ $reservation->college == 'College of Science' ? 'selected' : '' }}>College of Science</option>
                            <option value="School of Library and Information Studies" {{ $reservation->college == 'School of Library and Information Studies' ? 'selected' : '' }}>School of Library and Information Studies</option>
                            <option value="School of Statistics" {{ $reservation->college == 'School of Statistics' ? 'selected' : '' }}>School of Statistics</option>
                            <option value="Asian Center" {{ $reservation->college == 'Asian Center' ? 'selected' : '' }}>Asian Center</option>
                            <option value="College of Education" {{ $reservation->college == 'College of Education' ? 'selected' : '' }}>College of Education</option>
                            <option value="Institute of Islamic Studies" {{ $reservation->college == 'Institute of Islamic Studies' ? 'selected' : '' }}>Institute of Islamic Studies</option>
                            <option value="College of Law" {{ $reservation->college == 'College of Law' ? 'selected' : '' }}>College of Law</option>
                            <option value="College of Social Sciences and Philosophy" {{ $reservation->college == 'College of Social Sciences and Philosophy' ? 'selected' : '' }}>College of Social Sciences and Philosophy</option>
                            <option value="College of Social Work and Community Development" {{ $reservation->college == 'College of Social Work and Community Development' ? 'selected' : '' }}>College of Social Work and Community Development</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4 flex items-center justify-center">
                    <!-- Room -->
                    <div class="mb-4">
                        <label for="roomID" class="block text-sm font-medium text-gray-700 mb-3">Room</label>
                        <select id="roomID" name="roomID" required class="w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ $room->id == $reservation->roomID ? 'selected' : '' }}>{{ $room->roomName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Reservation Time -->
                    <div class="mb-4">
                        <label for="reserveTime" class="block text-sm font-medium text-gray-700 mb-3">Reservation Time</label>
                        <select id="reserveTime" name="reserveTime" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            @foreach(['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'] as $time)
                                <option value="{{ $time }}" {{ $reservation->reserveTime == $time ? 'selected' : '' }}>{{ date('g:i A', strtotime($time)) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Reservation Date -->
                    <div class="mb-4">
                        <label for="reserveDate" class="block text-sm font-medium text-gray-700 mb-3">Reservation Date</label>
                        <input type="date" id="reserveDate" name="reserveDate" value="{{ $reservation->reserveDate }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <!-- Purpose -->
                <div class="mb-4">
                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-3">Purpose</label>
                    <input type="text" id="purpose" name="purpose" value="{{ $reservation->purpose }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
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
