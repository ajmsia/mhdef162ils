<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Request</title>
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
        <a href="{{ route('requests.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 text-center align-content-center">
        <h2 class="text-4xl font-bold mb-8">Edit Reservation</h2>

        <div class="bg-gray-200 p-8 rounded-md shadow-lg max-w-4xl mx-auto flex items-center justify-center">
            <form action="{{ route('requests.update', ['request' => $request->requestID]) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- First Name -->
                    <div class="mb-4 flex-1">
                        <label for="userFirstName" class="block text-sm font-medium text-gray-700 mb-3">First Name</label>
                        <input type="text" id="userFirstName" name="userFirstName" value="{{ $request->userFirstName }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Last Name -->
                    <div class="mb-4 flex-1">
                        <label for="userLastName" class="block text-sm font-medium text-gray-700 mb-3">Last Name</label>
                        <input type="text" id="userLastName" name="userLastName" value="{{ $request->userLastName }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="upmail" class="block text-sm font-medium text-gray-700 mb-3">Email Address</label>
                    <input type="email" id="upmail" name="upmail" value="{{ $request->upmail }}" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <!-- User Type -->
                    <div class="mb-4">
                        <label for="userType" class="block text-sm font-medium text-gray-700 mb-3">User Type</label>
                        <input type="text" id="userType" name="userType" value="{{ $request->userType }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- College -->
                    <div class="mb-4">
                        <label for="college" class="block text-sm font-medium text-gray-700 mb-3">College</label>
                        <input type="text" id="college" name="college" value="{{ $request->college }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4 flex items-center justify-center">
                    <!-- Request Date -->
                    <div class="mb-4">
                        <label for="reserveDate" class="block text-sm font-medium text-gray-700 mb-3">Reservation Date</label>
                        <input type="date" id="requestDate" name="requestDate" value="{{ $request->requestDate }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <!-- Purpose -->
                <div class="mb-4">
                    <label for="purpose" class="block text-sm font-medium text-gray-700 mb-3">Purpose</label>
                    <input type="text" id="purpose" name="purpose" value="{{ $request->purpose }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center mt-6 gap-4">
                    <button type="button" onclick="window.location.href='{{ route('requests.index') }}';" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300">Update</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
