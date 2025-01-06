<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultations Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
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

                <!-- Buttons Container (Add Consultation) -->
                <div class="flex space-x-4 absolute top-4 right-4" >
                    <!-- Add Request Button -->
                    <a href="{{ route('consultations.usercreate') }}">
                        <button class="bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-300 text-sm">
                            Add Request
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <!-- Back Button -->
    <div class="flex justify-start mt-8 px-6">
        <a href="http://mhdef162ils.test/librarian">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <h2 class="text-4xl font-bold text-center mb-4">Consultations</h2>
    <div class="container mx-auto px-6 py-12">
        <!-- Consultations Table -->
        <div class="bg-gray-200 p-8 rounded-md shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border-separate border-spacing-0">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Full Name</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Nickname</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Status</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Email</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Contact</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Reserve Date</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Reserve Time</th>
                        <th class="py-3 px-6 text-left border-b border-r border-gray-300">Purpose</th>
                        <th class="py-3 px-6 text-left border-b border-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($consultations as $consultation)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 border-r border-gray-300">
                                <a href="{{ route('consultations.show', $consultation->id) }}" class="text-black hover:text-blue-500">
                                    {{ $consultation->fullname }}
                                </a>    
                            </td>
                            <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->nickname }}</td>
                            <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->status }}</td>
                            <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->mail }}</td>
                            <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->contact ?? 'N/A' }}</td>
                            <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->reserveDate }}</td>
                            <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->reserveTime }}</td>
                            <td class="py-3 px-6 border-r border-gray-300">{{ $consultation->purpose }}</td>
                            <td class="py-3 px-6 text-center border-r border-gray-300">
                            
                            <div class="flex space-x-4">
                                <a href="{{ route('consultations.edit', $consultation->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Edit
                                </a>

                                <form action="{{ route('consultations.update', ['consultation' => $consultation->id]) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="completed">
                                    <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-blue-600">
                                         Approve
                                    </button>
                                </form>

                                <form action="{{ route('consultations.update', ['consultation' => $consultation->id]) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="denied">
                                    <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-blue-600">
                                         Reject
                                    </button>
                                </form>
                                
                                

                                <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="return confirm('Are you sure you want to archive this consultation??')">
                                        Archive
                                    </button>
                                </form>
                            
                            </div>
                        
                            </td>
                        </tr>
                    
                    
                    
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">No consultations scheduled.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $consultations->links('pagination::tailwind') }}
        </div>
    </div>

</body>
</html>
