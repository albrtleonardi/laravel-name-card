<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __("message.user", ['name' => 'User']) }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(10px); 
            border-radius: 20px; 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); 
            border: 2px solid transparent;
            position: relative;
            padding: 4rem; 
            margin-top: 10rem; 
            overflow: hidden; 
            transition: all 0.3s ease-in-out; 
        }

        .glass:hover {
            background: rgba(255, 255, 255, 0.15); 
            backdrop-filter: blur(15px); 
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3); 
            transform: scale(1.05); 
        }

        .text-large {
            font-size: 4rem; 
        }

        .description-large {
            font-size: 2rem; 
        }
    </style>
</head>
<body class="font-sans bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">

    <nav class="bg-gray-800 p-4 flex justify-between items-center">
        <div class="text-white text-xl">{{ __('message.choose_language') }}</div>
        <div>
            <a href="?lang=en" class="text-white px-4">English</a>
            <a href="?lang=id" class="text-white px-4">Indonesia</a>
            <a href="?lang=cn" class="text-white px-4">Chinese</a>
            <a href="?lang=fr" class="text-white px-4">French</a>
            <a href="?lang=jp" class="text-white px-4">Japan</a>
            <a href="?lang=kr" class="text-white px-4">Korea</a>
            <a href="?lang=ml" class="text-white px-4">Malay</a>
        </div>
    </nav>

    <div class="bg-gray-800 p-4 flex justify-between items-center">
        <div class="text-white text-lg">{{ __('message.choose_gradient') }}</div>
        <select id="gradient" class="p-2 border rounded w-1/3">
            <option value="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">Gradient 1</option>
            <option value="bg-gradient-to-r from-blue-500 via-teal-500 to-green-500">Gradient 2</option>
            <option value="bg-gradient-to-r from-red-500 via-yellow-500 to-orange-500">Gradient 3</option>
        </select>

        <div class="text-white text-lg">{{ __('message.enter_name') }}</div>
        <input id="name" type="text" placeholder="Enter your name" class="p-2 border rounded w-1/3">
    </div>

    <div class="max-w-3xl mx-auto my-16 p-8 glass">
        <div id="text" class="text-center text-gray-800">
            <h1 class="text-large font-bold" id="helloMessage" data-hello="{{ __('message.user', ['name' => ':name']) }}">{{ __("message.user", ['name' => 'User']) }}</h1>
            <p id="description" class="description-large mt-8">{{ __("message.description") }}</p>
        </div>
    </div>

    <script>
        const storedName = localStorage.getItem('userName');
        if (storedName) {
            document.getElementById('name').value = storedName;
            const helloMessage = document.getElementById('helloMessage').getAttribute('data-hello');
            document.getElementById('helloMessage').innerText = helloMessage.replace(':name', storedName);
        }

        const gradientSelect = document.getElementById('gradient');
        let selectedGradient = localStorage.getItem('selectedGradient') || "bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500";
        
        document.body.classList.add(...selectedGradient.split(' '));

        gradientSelect.value = selectedGradient;

        gradientSelect.addEventListener('change', function (e) {
            selectedGradient = e.target.value;
            localStorage.setItem('selectedGradient', selectedGradient);
            document.body.className = selectedGradient;
        });

        document.getElementById('name').addEventListener('input', function (e) {
            const name = e.target.value || 'User';
            const helloMessage = document.getElementById('helloMessage').getAttribute('data-hello');
            document.getElementById('helloMessage').innerText = helloMessage.replace(':name', name);
            localStorage.setItem('userName', name); // Store the name in localStorage
        });
    </script>

</body>
</html>
