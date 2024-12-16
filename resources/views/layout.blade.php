<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Default Title')</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Header Section -->
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">
                <a href="{{ url('/') }}">My Laravel App</a>
            </h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="/" class="hover:underline">Home</a></li>
                    <li><a href="/about" class="hover:underline">About</a></li>
                    <li><a href="/contact" class="hover:underline">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-gray-300 py-4">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} My Laravel App. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>