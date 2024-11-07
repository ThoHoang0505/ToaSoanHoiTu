<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tòa Soạn Hội Tụ</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>

    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Noto Serif', serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    @include('components.header')
    

    <div class="flex-1 container mx-auto">
        @yield('content')
    </div>
    
    <footer>
        @include('components.footer') 
    </footer>
    <script>
        document.getElementById('toggleSubMenuButton').addEventListener('click', function() {
        var subMenu = document.getElementById('subMenu');
        subMenu.classList.toggle('hidden');
    });
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('toggleSubMenuButton').addEventListener('click', function() {
                var subMenu = document.getElementById('subMenu');
                subMenu.classList.toggle('hidden');
                subMenu.classList.toggle('block'); 
            });
        });
    </script>
</body>
</html>
