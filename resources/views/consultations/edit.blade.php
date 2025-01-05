<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Consultation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-4xl font-bold mb-6">Edit Consultation</h2>
        <form action="{{ route('consultations.update', $consultation->id) }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name:</label>
                <input 
                    type="text" 
                    name="fullname" 
                    id="fullname" 
                    value="{{ old('fullname', $consultation->fullname) }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div class="mb-4">
                <label for="mail" class="block text-sm font-medium text-gray-700">Email:</label>
                <input 
                    type="email" 
                    name="mail" 
                    id="mail" 
                    value="{{ old('mail', $consultation->mail) }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

            <div class="mb-4">
                <label for="contact" class="block text-sm font-medium text-gray-700">Contact Number:</label>
                <input 
                    type="text" 
                    name="contact" 
                    id="contact" 
                    value="{{ old('contact', $consultation->contact) }}" 
                    required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                />
            </div>

                    <div class="mb-4">
            <label for="reserveDate" class="block text-sm font-medium text-gray-700">Reservation Date:</label>
            <input 
                type="date" 
                name="reserveDate" 
                id="reserveDate" 
                value="{{ old('reserveDate', \Illuminate\Support\Carbon::parse($consultation->reserveDate)->toDateString()) }}" 
                required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
        </div>

        <div class="mb-4">
            <label for="reserveTime" class="block text-sm font-medium text-gray-700">Reservation Time:</label>
            <input 
                type="time" 
                name="reserveTime" 
                id="reserveTime" 
                value="{{ old('reserveTime', \Illuminate\Support\Carbon::parse($consultation->reserveTime)->format('H:i')) }}" 
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
                >{{ old('purpose', $consultation->purpose) }}</textarea>
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
