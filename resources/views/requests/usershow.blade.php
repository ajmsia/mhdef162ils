<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
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
        <a href="{{ route('requests.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Request Details Title -->
    <h2 class="text-4xl font-bold text-center mb-1 mt-3">Request Details</h2>

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
                <a href="{{ route('requests.edit', $request->requestID) }}">
                    <button class="bg-blue-500 text-white py-3 px-5 rounded-lg hover:bg-blue-600 transition duration-300">
                        Edit
                    </button>
                </a>
            </div>
            <table class="min-w-full bg-white border-collapse">
                <tbody>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300 w-1/3">First Name</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->userFirstName }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Middle Name</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->userMiddleName ?? 'N/A' }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Last Name</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->userLastName }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Email Address</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->upmail }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Request Date</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->requestDate }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">User Type</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->userType }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">College</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->college }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Title</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->title }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Resource Type</th>
                        <td class="py-3 px-6 border-r border-gray-300">{{ $request->resourceType }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <th class="py-3 px-6 text-left border-r border-gray-300">Tuklas Link</th>
                        <td class="py-3 px-6 border-r border-gray-300">
                            <a href="{{ $request->tuklasLink }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $request->tuklasLink }}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</body>
</html>