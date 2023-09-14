<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script type="text/javascript">
      window.Laravel = {
         csrfToken: "{{ csrf_token() }}",
         jsPermissions: {!! auth()->check()
             ? auth()->user()->jsPermissions()
             : 0 !!}
      }
   </script>

   <title inertia>{{ config('app.name', 'Laravel') }}</title>

   <!-- Fonts -->
   {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
   {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
   <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
   {{-- <link rel="stylesheet" href="/style.css" /> --}}

   <!-- Scripts -->
   @routes
   @vite(['resources/js/app.js', 'resources/css/app.css', "resources/js/Pages/{$page['component']}.vue"])
   @inertiaHead
</head>

<body>
   @inertia
</body>
{{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}

</html>
