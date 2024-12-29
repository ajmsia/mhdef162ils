<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center mb-6">Add Room</h2>
        <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="roomName" class="block text-sm font-medium text-gray-700">Room Name</label>
                <input type="text" id="roomName" name="roomName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Room Capacity</label>
                <input type="number" id="capacity" name="roomCapacity" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Room Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="flex justify-center mt-6">
                <button type="button" onclick="window.location.href='{{ route('rooms.index') }}';" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">Cancel</button>
                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300 ml-4">Add Room</button>
            </div>

        </form>
    </div>

</body>
</html>
