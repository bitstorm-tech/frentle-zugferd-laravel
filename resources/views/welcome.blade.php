<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="dim">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Frentle Invoice Service</title>

        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="bg-base-300 flex h-screen items-center justify-center font-sans text-xl antialiased">
        <h1>Frentle Invoice Service</h1>
    </body>
</html>
