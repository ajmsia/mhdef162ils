<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Form</title>
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
        <a href="http://mhdef162ils.test/user">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

<!-- Main Content -->
<main class="container mx-auto px-6 py-12 mt-0">
        <h2 class="text-4xl font-bold mb-8 text-center">Consultations</h2>

        <div class="container mx-auto px-6 py-12">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-gray-200 p-8 rounded-md shadow-lg border border-gray-200">
        <!-- Consultation Information Section -->
        <div class="mb-12">
            <p class="text-lg mb-6 text-center">We offer personalized consultations to help you with various inquiries. Book a consultation below:</p>
            
            <!-- Consultation Form -->
            <div class="max-w-4xl mx-auto">
                <form action="{{ route('consultations.store') }}" method="POST" class="space-y-6 grid grid-cols-1 sm:grid-cols-2 gap-8">
                    @csrf

                    <!-- Full Name and Date/Time -->
                    <div class="space-y-6">
                        <div>
                            <label for="fullname" class="block text-lg font-medium text-gray-700 mb-3">Full Name</label>
                            <input type="text" name="fullname" id="fullname" class="w-full border-gray-300 border p-4 rounded-lg" required>
                        </div>

                        <div>
                            <label for="mail" class="block text-lg font-medium text-gray-700 mb-3">Email Address</label>
                            <input type="email" name="mail" id="mail" class="w-full border-gray-300 border p-4 rounded-lg" required>
                        </div>

                        <div>
                            <label for="contact" class="block text-lg font-medium text-gray-700 mb-3">Contact #</label>
                            <input type="tel" name="contact" id="contact" class="w-full border-gray-300 border p-4 rounded-lg" required>
                        </div>
                    </div>

                    <!-- Date and Time -->
                    <div class="space-y-6">
                        <div>
                            <label for="reserveDate" class="block text-lg font-medium text-gray-700 mb-3">
                                Preferred Date
                            </label>
                            <input 
                                type="date" 
                                name="reserveDate" 
                                id="reserveDate" 
                                class="w-full border-gray-300 border p-4 rounded-lg" 
                                min="{{ date('Y-m-d') }}" 
                                required>
                        </div>   
                        <div>
                            <label for="reserveTime" class="block text-lg font-medium text-gray-700 mb-3">Preferred Time</label>
                            <input type="time" name="reserveTime" id="reserveTime" class="w-full border-gray-300 border p-4 rounded-lg" required>
                        </div>
                    </div>
                 
                    <div class="col-span-2">
                        <label for="purpose" class="block text-lg font-medium text-gray-700 mb-3">Purpose</label>
                        <textarea name="purpose" id="purpose" rows="4" class="w-full border-gray-300 border p-4 rounded-lg" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-2 text-center">
                            <button type="button" onclick="window.location.href='{{ route('user.index') }}';" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">Cancel</button>
                            <button type="submit" id="submit" name="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300">Book Consultation</button>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>

</body>
</html>
