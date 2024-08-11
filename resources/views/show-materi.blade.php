<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container">
        @include('partials.navbar')
    </div>

    <div class="container mx-auto px-[300px] py-4 mb-20">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        </div>
        <div class="mx-auto mt-4 mb-8">
            <div class="rounded-lg overflow-hidden">
                <iframe class="overflow-hidden" width="600" height="415" src="{{ $materi->link }}" frameborder="0"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</body>
</html>