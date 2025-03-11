<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="dim">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Frentle Invoice Service - Create</title>

        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body class="m-8 font-sans antialiased">
        <form class="flex flex-col gap-3" method="post">
            @csrf
            <div class="flex justify-between">
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                    <legend class="fieldset-legend">Page details</legend>

                    <label class="fieldset-label">Anschrift</label>
                    <input name="foo" type="text" class="input" />

                    <label class="fieldset-label">Foobar</label>
                    <input type="text" class="input" placeholder="my-awesome-page" />

                    <label class="fieldset-label">Author</label>
                    <input type="text" class="input" placeholder="Name" />
                </fieldset>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                    <legend class="fieldset-legend">Page details</legend>

                    <label class="fieldset-label">Anschrift</label>
                    <input type="text" class="input" placeholder="My awesome page" />

                    <label class="fieldset-label">Foobar</label>
                    <input type="text" class="input" placeholder="my-awesome-page" />

                    <label class="fieldset-label">Author</label>
                    <input type="text" class="input" placeholder="Name" />
                </fieldset>
            </div>
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Page details</legend>

                <label class="fieldset-label">Anschrift</label>
                <input type="text" class="input" placeholder="My awesome page" />

                <label class="fieldset-label">Foobar</label>
                <input type="text" class="input" placeholder="my-awesome-page" />

                <label class="fieldset-label">Author</label>
                <input type="text" class="input" placeholder="Name" />
            </fieldset>
            <button class="btn btn-primary">Rechnung erstellen</button>
        </form>
    </body>
</html>
