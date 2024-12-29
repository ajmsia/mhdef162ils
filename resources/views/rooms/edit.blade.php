<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center mb-6">Edit Room</h2>            
        <form method="POST" action="{{ route('rooms.update', $rooms->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="roomName" class="block text-sm font-medium text-gray-700">Room Name</label>
                <input type="text" name="roomName" value="{{ $rooms->roomName }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Room Capacity</label>
                <input type="number" name="roomCapacity" value="{{ $rooms->roomCapacity }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- error display -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Room Image</label>
                <input type="file" 
                    name="image" 
                    id="image" 
                    class="mt-1 @error('image') border-red-500 @enderror">
                @error('image')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center mt-6">
                <button type="button" onclick="window.location.href='{{ route('rooms.index') }}';" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">Cancel</button>
                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300">Update Room</button>
            </div>
            
        </form>
    </div>

</body>
</html>
