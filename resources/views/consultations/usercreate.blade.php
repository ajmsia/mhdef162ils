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
<div class="container mx-auto px-6 py-12">
        <h2 class="text-4xl font-bold mb-8 text-center">Add Consultations</h2>

        <div class="bg-gray-200 p-8 rounded-md shadow-lg max-w-4xl mx-auto flex items-center justify-center">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            <!-- Consultation Form -->
            <form action="{{ route('consultations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                <!-- Client Details -->
                <div class="flex flex-col md:flex-row gap-4 justify-center items-center">

                    <!-- First Name -->
                 <div class="mb-4 flex-1">
                    <label for="fullname" class="block text-sm font-medium text-gray-700 mb-3">Full Name</label>
                    <input type="text" id="fullname" name="fullname" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- Nickname -->
                <div class="mb-4 flex-1">
                    <label for="nickname" class="block text-sm font-medium text-gray-700 mb-3">Nickname</label>
                    <input type="text" id="nickname" name="nickname" required class="w-50 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
            </div>

            <!-- Contact Details -->
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                   <!-- Email Address and Contact # -->
                <div class="mb-4 flex-1">
                    <label for="mail" class="block text-sm font-medium text-gray-700 mb-3">Email</label>
                    <input type="email" id="mail" name="mail" required class="w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <div class="mb-4 flex-1">
                    <label for="contact" class="block text-sm font-medium text-gray-700 mb-3">Contact Number</label>
                    <input type="tel" id="contact" name="contact" required class="w-50 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
            </div>

            <!-- Date and Time -->
             <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                   
             <!-- Consultation Time -->
             <div class="mb-4">
                    <label for="reserveTime" class="block text-sm font-medium text-gray-700 mb-3">Consultation Time</label>
                    <select id="reserveTime" name="reserveTime" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
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

                    <!-- Consultation Date -->
                <div class="mb-4">
                    <label for="reserveDate" class="block text-sm font-medium text-gray-700 mb-3">Consultation Date</label>
                    <input type="date" id="reserveDate" name="reserveDate" required class="w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
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
    </main>

</body>
</html>
