<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultations Receipt</title>
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

    <!-- Back Button -->
    <div class="flex justify-start mt-8 px-6">
        <a href="{{ route('user.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Reservation Details Title -->
    <h2 class="text-4xl font-bold text-center mb-1 mt-3">Consultation Details</h2>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Request Details Table with Border -->
        <div class="bg-gray-200 p-8 rounded-md shadow-lg border border-gray-300">
            <!-- Edit Button -->
            <div class="flex justify-start mt-1 mb-6 px-2">
                <a href="{{ route('consultations.edit', $consultation->id) }}">
                    <button class="bg-blue-500 text-white py-3 px-5 rounded-lg hover:bg-blue-600 transition duration-300">
                        Edit
                    </button>
                </a>
            </div>

            <table class="min-w-full bg-white border-collapse">
                <tbody>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300 w-1/3">First Name</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->fullname }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Nickname</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->nickname}}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Email Address</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->email }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Contact Number</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->contact }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Consultation Time</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->reserveTime }}</td>
                    </tr>

                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Consultation Date</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ date('M d, Y', strtotime($consultation->reserveDate)) }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Purpose</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->purpose }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Status</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

