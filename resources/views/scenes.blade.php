 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">      </div>
    </body>
      <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div>
         @foreach($scenes as $scene)
            <div>
                <img class="rounded-lg rounded-b-none" src="{{asset('storage').'/'.$scene->image}}" alt="thumbnail" loading="lazy" />
            </div>
            @endforeach
        </div>
</html>