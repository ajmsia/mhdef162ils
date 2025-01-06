<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Add New Request Form</title>
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
        <a href="{{ route('requests.index') }}">
            <button class="bg-black text-white py-2 px-6 rounded-lg hover:bg-gray-800 transition duration-300">
                Back
            </button>
        </a>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 text-center align-content-center">
        <h2 class="text-4xl font-bold mb-8">Add Request</h2>

        <div class="bg-gray-200 p-8 rounded-md shadow-lg max-w-4xl mx-auto flex items-center justify-center">

        @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                @endif

            <form method="POST" action="{{ route('requests.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Hidden User Type -->
                <input type="hidden" name="userType" value="Librarian">

                <!-- Resource Details -->
                <div class="flex flex-col md:flex-row gap-4">
                   
                    <!-- First Name -->
                 <div class="mb-4 flex-1">
                    <label for="userFirstName" class="block text-sm font-medium text-gray-700 mb-3">First Name</label>
                    <input type="text" id="userFirstName" name="userFirstName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>


                    <!-- Middle Name -->
                <div class="mb-4">
                    <label for="userMiddleName" class="block text-sm font-medium text-gray-700 mb-3">Middle Name</label>
                    <input type="text" id="userMiddleName" name="userMiddleName" placeholder="Leave blank if none!" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                    <!-- Last Name -->
                <div class="mb-4 flex-1">
                    <label for="userLastName" class="block text-sm font-medium text-gray-700 mb-3">Last Name</label>
                    <input type="text" id="userLastName" name="userLastName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

            </div>

            <div class="flex flex-col md:flex-row gap-4">
                    <!-- Email Address -->
                <div class="mb-4">
                    <label for="upmail" class="block text-sm font-medium text-gray-700 mb-3">Email Address</label>
                    <input type="email" id="upmail" name="upmail" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- Request Date -->
                <div class="mb-4">
                    <label for="requestDate" class="block text-sm font-medium text-gray-700 mb-3">When do you need it by?</label>
                    <input type="date" id="requestDate" name="requestDate" required class="w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
            </div>

                    <!-- College -->
                <div class="mb-4">
                    <label for="college" class="block text-sm font-medium text-gray-700 mb-3">College</label>
                    <select id="college" name="college" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option value="N/A">N/A</option>
                        <option value="College of Arts and Letters">College of Arts and Letters</option>
                        <option value="College of Fine Arts">College of Fine Arts</option>
                        <option value="College of Human Kinetics">College of Human Kinetics</option>
                        <option value="College of Mass Communication">College of Mass Communication</option>
                        <option value="College of Music">College of Music</option>
                        <option value="Asian Institute of Tourism">Asian Institute of Tourism</option>
                        <option value="Cesar E.A. Virata School of Business">Cesar E.A. Virata School of Business</option>
                        <option value="School of Economics">School of Economics</option>
                        <option value="School of Labor and Industrial Relations">School of Labor and Industrial Relations</option>
                        <option value="National College of Public Administration and Governance">National College of Public Administration and Governance</option>
                        <option value="School of Urban and Regional Planning">School of Urban and Regional Planning</option>
                        <option value="Technology Management Center">Technology Management Center</option>
                        <option value="UPD Extension Programs in Pampanga and Olongapo">UPD Extension Programs in Pampanga and Olongapo</option>
                        <option value="School of Archaeology">School of Archaeology</option>
                        <option value="College of Architecture">College of Architecture</option>
                        <option value="College of Engineering">College of Engineering</option>
                        <option value="College of Home Economics">College of Home Economics</option>
                        <option value="College of Science">College of Science</option>
                        <option value="School of Library and Information Studies">School of Library and Information Studies</option>
                        <option value="School of Statistics">School of Statistics</option>
                        <option value="Asian Center">Asian Center</option>
                        <option value="College of Education">College of Education</option>
                        <option value="Institute of Islamic Studies">Institute of Islamic Studies</option>
                        <option value="College of Law">College of Law</option>
                        <option value="College of Social Sciences and Philosophy">College of Social Sciences and Philosophy</option>
                        <option value="College of Social Work and Community Development">College of Social Work and Community Development</option>
                    </select>
                </div>
                
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Title -->
                <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-3">Title</label>
                        <input id="title" name="title" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                <!-- Resource Type -->
                    <div class="mb-4">
                        <label for="resourceType" class="block text-sm font-medium text-gray-700 mb-3">Resource Type</label>
                        <select id="resourceType" name="resourceType" required class="w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            <option value="Book">Book</option>
                            <option value="Electronic Resource">Electronic Resource</option>
                            <option value="Thesis">Thesis</option>
                            <option value="Dissertation">Dissertation</option>
                            <option value="Analytics">Analytics</option>
                            <option value="Journal">Journal</option>
                            <option value="Article">Article</option>
                            <option value="Continuing Resource">Continuing Resource</option>
                            <option value="Visual Material">Visual Material</option>
                            <option value="Music">Music</option>
                            <option value="Map">Map</option>
                            <option value="Mixed Material">Mixed Material</option>
                        </select>
                    </div>
                </div>

                <!-- Tuklas Link -->
                <div class="mb-4">
                    <label for="tuklasLink" class="block text-sm font-medium text-gray-700 mb-3">Tuklas Link</label>
                    <input type="url" id="tuklasLink" name="tuklasLink" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center mt-6 gap-4">
                    <button type="button" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">
                        <a href="{{ route ('requests.index') }}">Cancel</a>
                    </button>
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300">Add Request</button>
                </div>
            </form>
        </div>

    </main>

</body>
</html>
