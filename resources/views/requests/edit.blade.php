<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Request</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-4xl font-bold mb-6">Edit request</h2>
        <form action="{{ route('requests.update', $request->requestID) }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="userFirstName" class="block text-sm font-medium text-gray-700">First Name:</label>
                <input 
                    type="text" 
                    name="userFirstName" 
                    id="userFirstName" 
                    value="{{ old('userFirstName', $request->userFirstName) }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div class="mb-4">
                <label for="userLastName" class="block text-sm font-medium text-gray-700">Last Name:</label>
                <input 
                    type="text" 
                    name="userLastName" 
                    id="userLastName" 
                    value="{{ old('userLastName', $request->userLastName) }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div class="mb-4">
                <label for="upmail" class="block text-sm font-medium text-gray-700">Email:</label>
                <input 
                    type="email" 
                    name="upmail" 
                    id="upmail" 
                    value="{{ old('upmail', $request->upmail) }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div class="mb-4">
            <label for="requestDate" class="block text-sm font-medium text-gray-700">Request Date:</label>
            <input 
                type="date" 
                name="requestDate" 
                id="requestDate" 
                value="{{ old('requestDate', \Illuminate\Support\Carbon::parse($request->requestDate)->toDateString()) }}" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

        <div class="mb-4">
            <label for="requestTime" class="block text-sm font-medium text-gray-700">Request Time:</label>
            <input 
                type="time" 
                name="requestTime" 
                id="requestTime" 
                value="{{ old('requestTime', \Illuminate\Support\Carbon::parse($request->requestTime)->format('H:i')) }}" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

            <div class="mb-4">
                <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose:</label>
                <textarea 
                    name="purpose" 
                    id="purpose" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                >{{ old('purpose', $request->purpose) }}</textarea>
            </div>

            <div class="mt-6">
                <button 
                    type="submit" 
                    class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
