<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patron Add New Request Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans"> <!-- Changed bg-gray-100 to bg-white -->

    <!-- Black Top Menu Bar -->
    <nav class="bg-black border-b border-gray-700">
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
        <a href="{{ route('user.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <main class="container mx-auto px-6 py-12 text-center align-content-center">
        <h2 class="text-4xl font-bold mb-8">Add Request</h2>

    <div class="bg-gray-200 p-8 rounded-md shadow-lg max-w-4xl mx-auto flex items-center justify-center">
    <form method="POST" action="{{ route('requests.store') }}" enctype="multipart/form-data">
            @csrf
    
        <!-- Resource Details -->
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Resource Type -->
            <div class="mb-4">
                    <label for="resourceType" class="block text-sm font-medium text-gray-700 mb-3">Resource Type</label>
                    <select id="resourceType" name="resourceType" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option value="Book">Book</option>
                        <option value="Electronic Resource">Electronic Resource</option>
                        <option value="Thesis">Thesis</option>
                        <option value="Analytics">Analytics</option>
                        <option value="Article">Article</option>
                        <option value="Continuing Resource">Continuing Resource</option>
                        <option value="Visual Material">Visual Material</option>
                    </select>
                </div>
         <!-- Resource Title -->
            <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-3">Title</label>
                    <select id="title" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option value="Undergraduate student">Undergraduate student</option>
                        <option value="Graduate student">Graduate student</option>
                        <option value="Faculty">Faculty</option>
                        <option value="Staff">Staff</option>
                        <option value="Reps">Reps</option>
                        <option value="Alumni">Alumni</option>
                    </select>
                </div>

            </div>
         <!-- Email Address -->
         <div class="mb-4">
                    <label for="tuklasLink" class="block text-sm font-medium text-gray-700 mb-3">Tuklas Link</label>
                    <input type="url" id="tuklasLink" name="tuklasLink" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
        
         <!-- Action Buttons -->
         <div class="flex justify-center mt-6 gap-4">
                    <button type="button" onclick="window.location.href='{{ route('user.index') }}';" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">Cancel</button>
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300">Add Request</button>
                </div>
    
        </form>
    </main>
    