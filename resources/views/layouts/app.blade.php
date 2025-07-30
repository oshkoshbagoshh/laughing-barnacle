<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>@yield('title', 'Klutch Products')</title>
    @vite('resources/css/app.css', 'resources/js/app.js') {{-- Assuming you use Vite for assets --}}
    {{--   Alpine JS CDN--}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex flex-col">
{{--Header--}}
<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold text-yellow-600 hover:text-shadow-yellow-700">
            Klutch Products - Affiliate Reviews
        </a>
        <nav class="space-x-4">
            <a href="{{ route('home') }}" class="hover:text-yellow-600">
                Home
            </a>
            <a href="{{ route('about.index') }}" class="hover:text-yellow-600">
                About
            </a>
            <a href="{{ route('products.index') }}" class="hover:text-yellow-600">
                Products
            </a>
            <a href="{{ route('reviews.index') }}" class="hover:text-yellow-600">
                Reviews
            </a>
            {{-- Admin Dashboard           --}}
            @auth
                <a href="{{route('dashboard')}}" class="hover:text-yellow-600">
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-yellow-600">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-yellow-600">
                    Login
                </a>
                <a href="{{ route('register') }}" class="hover:text-yellow-600">
                    Register
                </a>

            @endauth
        </nav>
        {{--Nav--}}

    </div>
</header>
{{--Main--}}
<main class="flex-grow container mx-auto px-4 py-8">
    @yield('content')
</main>

{{--Footer--}}
<footer class="bg-white shadow-inner mt-auto py-4 text-center text-gray-600 text-sm">
    &copy; {{ date('Y') }} Klutch Products. All rights reserved.
</footer>

{{--Script--}}
<script src="../../js/app.js">

</script>
</body>
</html>