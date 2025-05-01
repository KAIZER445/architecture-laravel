<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>{{ $title ?? 'My App' }}</title>
    <style>
        #toast-container>.toast {
            box-shadow: 0 0 12px #000d24;
        }
    </style>
    @livewireStyles
</head>

<body class="bg-gray-900">
    <nav>
        <a wire:navigate href="{{ route('home') }}" class="text-white">Home</a>
        <a wire:navigate href="{{ route('test') }}" class="text-white">Test</a>
    </nav>

    {{ $slot }}

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Optional: Configure Toastr options
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 5000
            };

            // Listen for the show-success-toast event
            Livewire.on('show-success-toast', (event) => {
                toastr.success(event.message);
            });
        });
    </script>
    @stack('scripts')
</body>

</html>