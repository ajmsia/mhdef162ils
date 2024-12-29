<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservation Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h2 class="text-2xl font-semibold text-center mb-6">Add Reservation</h2>
        <form method="POST" action="{{ route('reservations.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- This is the user version of create -->
            <div class="mb-4">
                <label for="userFirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="userFirstName" name="userFirstName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="userLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="userLastName" name="userLastName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="userMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                <input type="text" id="userMiddleName" name="userMiddleName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="upmail" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="upmail" name="upmail" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="userType" class="block text-sm font-medium text-gray-700">User Type</label>
                <select id="userType" name="userType" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="Undergraduate student">Undergraduate student</option>
                    <option value="Graduate student">Graduate student</option>
                    <option value="Faculty">Faculty</option>
                    <option value="Staff">Staff</option>
                    <option value="Reps">Reps</option>
                    <option value="Alumni">Alumni</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="college" class="block text-sm font-medium text-gray-700">College</label>
                <select id="college" name="college" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="College of Arts and Letters">College of Arts and Letters</option>
                    <option value="College of Fine Arts">College of Fine Arts</option>
                    <option value="College of Human Kinetics">College of Human Kinetics</option>
                    <option value="College of Mass Communication">College of Mass Communication</option>
                    <option value="College of Music">College of Music</option>
                    <option value="Asian Institute of Tourism">Asian Institute of Tourism</option>
                    <option value="Cesar E.A. Virata School of Business">Cesar E.A. Virata School of Business</option>
                    <option value="School of Economics">School of Economics</option>
                    <option value="School of Labor and Industrial Relations">School of Labor and Industrial Relations</option>
                    <option value="National College of Public Administration and Governance">National College of Public Administration and Governance</option>
                    <option value="School of Urban and Regional Planning">School of Urban and Regional Planning</option>
                    <option value="Technology Management Center">Technology Management Center</option>
                    <option value="UPD Extension Programs in Pampanga and Olongapo">UPD Extension Programs in Pampanga and Olongapo</option>
                    <option value="School of Archaeology">School of Archaeology</option>
                    <option value="College of Architecture">College of Architecture</option>
                    <option value="College of Engineering">College of Engineering</option>
                    <option value="College of Home Economics">College of Home Economics</option>
                    <option value="College of Science">College of Science</option>
                    <option value="School of Library and Information Studies">School of Library and Information Studies</option>
                    <option value="School of Statistics">School of Statistics</option>
                    <option value="Asian Center">Asian Center</option>
                    <option value="College of Education">College of Education</option>
                    <option value="Institute of Islamic Studies">Institute of Islamic Studies</option>
                    <option value="College of Law">College of Law</option>
                    <option value="College of Social Sciences and Philosophy">College of Social Sciences and Philosophy</option>
                    <option value="College of Social Work and Community Development">College of Social Work and Community Development</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="roomID" class="block text-sm font-medium text-gray-700">Room</label>
                <select id="roomID" name="roomID" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->roomName }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-4">
                <label for="reserveTime" class="block text-sm font-medium text-gray-700">Reservation Time</label>
                <select id="reserveTime" name="reserveTime" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="08:00">8:00 AM</option>
                    <option value="09:00">9:00 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="13:00">1:00 PM</option>
                    <option value="14:00">2:00 PM</option>
                    <option value="15:00">3:00 PM</option>
                    <option value="16:00">4:00 PM</option>
                    <option value="17:00">5:00 PM</option>
                    <option value="18:00">6:00 PM</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="reserveDate" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                <input type="date" id="reserveDate" name="reserveDate" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose</label>
                <textarea id="purpose" name="purpose" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <div class="flex justify-center mt-6 gap-4">
                <button type="button" onclick="window.location.href='{{ route('user.index') }}';" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">Cancel</button>
                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300">Add Reservation</button>
            </div>

        </form>
    </div>

</body>
</html>
