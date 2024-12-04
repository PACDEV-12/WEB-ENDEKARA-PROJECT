<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.partials.head')
    <title>{{ $title ?? 'Sovenir Anyaman Bambu' }}</title>
</head>
<body>
    @include('layouts.partials.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('layouts.partials.footer')
    
    @stack('scripts')
</body>
</html>