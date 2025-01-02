<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
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
            </div>
        </div>
    </nav>

    <!-- Edit Room Form -->
    <div class="container mx-auto px-6 py-12">
        <div class="bg-gray-200 p-8 rounded-md shadow-lg w-full max-w-md mx-auto">
            <h2 class="text-2xl font-semibold text-center mb-6">Edit Room</h2>
            <form method="POST" action="{{ route('rooms.update', $rooms->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Room Name -->
                <div class="mb-4">
                    <label for="roomName" class="block text-sm font-medium text-gray-700">Room Name</label>
                    <input type="text" id="roomName" name="roomName" value="{{ $rooms->roomName }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Room Capacity -->
                <div class="mb-4">
                    <label for="capacity" class="block text-sm font-medium text-gray-700">Room Capacity</label>
                    <input type="number" id="capacity" name="roomCapacity" value="{{ $rooms->roomCapacity }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Upload Image -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Room Image</label>
                    <input type="file" id="image" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Error Display -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex justify-between mt-6">
                    <button type="button" onclick="window.location.href='{{ route('rooms.index') }}';" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300 ml-4">Update Room</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

