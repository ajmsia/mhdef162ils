<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Request Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">

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
    <main class="container mx-auto px-6 py-12 text-center">
        <h2 class="text-4xl font-bold mb-8">Edit Request</h2>

        <div class="bg-gray-200 p-8 rounded-md shadow-lg max-w-4xl mx-auto">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('requests.update', $request->requestID) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Resource Details -->
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- First Name -->
                    <div class="mb-4 flex-1">
                        <label for="userFirstName" class="block text-sm font-medium text-gray-700 mb-3">First Name</label>
                        <input type="text" id="userFirstName" name="userFirstName" value="{{ old('userFirstName', $request->userFirstName) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Middle Name -->
                    <div class="mb-4">
                        <label for="userMiddleName" class="block text-sm font-medium text-gray-700 mb-3">Middle Name</label>
                        <input type="text" id="userMiddleName" name="userMiddleName" value="{{ old('userMiddleName', $request->userMiddleName) }}" placeholder="Leave blank if none!" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Last Name -->
                    <div class="mb-4 flex-1">
                        <label for="userLastName" class="block text-sm font-medium text-gray-700 mb-3">Last Name</label>
                        <input type="text" id="userLastName" name="userLastName" value="{{ old('userLastName', $request->userLastName) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="upmail" class="block text-sm font-medium text-gray-700 mb-3">Email Address</label>
                        <input type="email" id="upmail" name="upmail" value="{{ old('upmail', $request->upmail) }}" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Request Date -->
                    <div class="mb-4">
                        <label for="requestDate" class="block text-sm font-medium text-gray-700 mb-3">When do you need it by?</label>
                        <input type="date" id="requestDate" name="requestDate" value="{{ old('requestDate', $request->requestDate) }}" required class="w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <!-- User Type -->
                    <div class="mb-4">
                        <label for="userType" class="block text-sm font-medium text-gray-700 mb-3">User Type</label>
                        <select id="userType" name="userType" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            <option value="Undergraduate student" {{ old('userType', $request->userType) == 'Undergraduate student' ? 'selected' : '' }}>Undergraduate student</option>
                            <option value="Graduate student" {{ old('userType', $request->userType) == 'Graduate student' ? 'selected' : '' }}>Graduate student</option>
                            <option value="Faculty" {{ old('userType', $request->userType) == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                            <option value="Staff" {{ old('userType', $request->userType) == 'Staff' ? 'selected' : '' }}>Staff</option>
                            <option value="Reps" {{ old('userType', $request->userType) == 'Reps' ? 'selected' : '' }}>Reps</option>
                            <option value="Alumni" {{ old('userType', $request->userType) == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                        </select>
                    </div>

                    <!-- College -->
                    <div class="mb-4">
                        <label for="college" class="block text-sm font-medium text-gray-700 mb-3">College</label>
                        <select id="college" name="college" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            <option value="N/A" {{ old('college', $request->college) == 'N/A' ? 'selected' : '' }}>N/A</option>
                            <option value="College of Arts and Letters" {{ old('college', $request->college) == 'College of Arts and Letters' ? 'selected' : '' }}>College of Arts and Letters</option>
                            <option value="College of Fine Arts" {{ old('college', $request->college) == 'College of Fine Arts' ? 'selected' : '' }}>College of Fine Arts</option>
                            <option value="College of Human Kinetics" {{ old('college', $request->college) == 'College of Human Kinetics' ? 'selected' : '' }}>College of Human Kinetics</option>
                            <option value="College of Mass Communication" {{ old('college', $request->college) == 'College of Mass Communication' ? 'selected' : '' }}>College of Mass Communication</option>
                            <option value="College of Music" {{ old('college', $request->college) == 'College of Music' ? 'selected' : '' }}>College of Music</option>
                            <option value="Asian Institute of Tourism" {{ old('college', $request->college) == 'Asian Institute of Tourism' ? 'selected' : '' }}>Asian Institute of Tourism</option>
                            <option value="Cesar E.A. Virata School of Business" {{ old('college', $request->college) == 'Cesar E.A. Virata School of Business' ? 'selected' : '' }}>Cesar E.A. Virata School of Business</option>
                            <option value="School of Economics" {{ old('college', $request->college) == 'School of Economics' ? 'selected' : '' }}>School of Economics</option>
                            <option value="School of Labor and Industrial Relations" {{ old('college', $request->college) == 'School of Labor and Industrial Relations' ? 'selected' : '' }}>School of Labor and Industrial Relations</option>
                            <option value="National College of Public Administration and Governance" {{ old('college', $request->college) == 'National College of Public Administration and Governance' ? 'selected' : '' }}>National College of Public Administration and Governance</option>
                            <option value="School of Urban and Regional Planning" {{ old('college', $request->college) == 'School of Urban and Regional Planning' ? 'selected' : '' }}>School of Urban and Regional Planning</option>
                            <option value="Technology Management Center" {{ old('college', $request->college) == 'Technology Management Center' ? 'selected' : '' }}>Technology Management Center</option>
                            <option value="School of Library and Information Studies" {{ old('college', $request->college) == 'School of Library and Information Studies' ? 'selected' : '' }}>School of Library and Information Studies</option>
                            <option value="College of Social Work and Community Development" {{ old('college', $request->college) == 'College of Social Work and Community Development' ? 'selected' : '' }}>College of Social Work and Community Development</option>
                            <option value="College of Science" {{ old('college', $request->college) == 'College of Science' ? 'selected' : '' }}>College of Science</option>
                            <option value="College of Social Sciences and Philosophy" {{ old('college', $request->college) == 'College of Social Sciences and Philosophy' ? 'selected' : '' }}>College of Social Sciences and Philosophy</option>
                            <option value="College of Engineering" {{ old('college', $request->college) == 'College of Engineering' ? 'selected' : '' }}>College of Engineering</option>
                            <option value="College of Education" {{ old('college', $request->college) == 'College of Education' ? 'selected' : '' }}>College of Education</option>
                            <option value="College of Home Economics" {{ old('college', $request->college) == 'College of Home Economics' ? 'selected' : '' }}>College of Home Economics</option>
                            <option value="College of Law" {{ old('college', $request->college) == 'College of Law' ? 'selected' : '' }}>College of Law</option>
                            <option value="College of Medicine" {{ old('college', $request->college) == 'College of Medicine' ? 'selected' : '' }}>College of Medicine</option>
                            <option value="College of Nursing" {{ old('college', $request->college) == 'College of Nursing' ? 'selected' : '' }}>College of Nursing</option>
                            <option value="College of Public Health" {{ old('college', $request->college) == 'College of Public Health' ? 'selected' : '' }}>College of Public Health</option>
                            <option value="College of Architecture" {{ old('college', $request->college) == 'College of Architecture' ? 'selected' : '' }}>College of Architecture</option>
                            <option value="College of Technology" {{ old('college', $request->college) == 'College of Technology' ? 'selected' : '' }}>College of Technology</option>
                            <option value="Institute of Environmental Science and Meteorology" {{ old('college', $request->college) == 'Institute of Environmental Science and Meteorology' ? 'selected' : '' }}>Institute of Environmental Science and Meteorology</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-3">Title</label>
                        <input id="title" name="title" value="{{ old('title', $request->title) }}" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <!-- Resource Type -->
                    <div class="mb-4">
                        <label for="resourceType" class="block text-sm font-medium text-gray-700 mb-3">Resource Type</label>
                        <select id="resourceType" name="resourceType" required class="w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            <option value="Book" {{ old('resourceType', $request->resourceType) == 'Book' ? 'selected' : '' }}>Book</option>
                            <option value="Thesis/Dissertation" {{ old('resourceType', $request->resourceType) == 'Thesis/Dissertation' ? 'selected' : '' }}>Thesis/Dissertation</option>
                            <option value="Journal Article" {{ old('resourceType', $request->resourceType) == 'Journal Article' ? 'selected' : '' }}>Journal Article</option>
                            <option value="Magazine/Newspaper" {{ old('resourceType', $request->resourceType) == 'Magazine/Newspaper' ? 'selected' : '' }}>Magazine/Newspaper</option>
                            <option value="Audio/Visual Material" {{ old('resourceType', $request->resourceType) == 'Audio/Visual Material' ? 'selected' : '' }}>Audio/Visual Material</option>
                            <option value="E-book/E-resource" {{ old('resourceType', $request->resourceType) == 'E-book/E-resource' ? 'selected' : '' }}>E-book/E-resource</option>
                            <option value="Others" {{ old('resourceType', $request->resourceType) == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>
                </div>

                <!-- Tuklas Link -->
                <div class="mb-4">
                    <label for="tuklasLink" class="block text-sm font-medium text-gray-700 mb-3">Tuklas Link</label>
                    <input type="url" id="tuklasLink" name="tuklasLink" value="{{ old('tuklasLink', $request->tuklasLink) }}" required class="w-96 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-center mt-6 gap-4">
                    <button type="button" class="bg-red-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-red-600 transition duration-300">
                        <a href="{{ route('requests.index') }}">Cancel</a>
                    </button>

                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-600 transition duration-300">Update</button>
                </div>

            </form>
        </div>
    </main>

</body>
</html>
