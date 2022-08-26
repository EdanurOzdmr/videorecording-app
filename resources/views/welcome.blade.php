<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Video Register App</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }


        /* CSS */
        .button-29 {
            align-items: center;
            appearance: none;
            background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
            border: 0;
            border-radius: 6px;
            box-shadow: rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, rgba(58, 65, 111, .5) 0 -3px 0 inset;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-29:focus {
            box-shadow: #3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
        }

        .button-29:hover {
            box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-29:active {
            box-shadow: #3c4fe0 0 3px 7px inset;
            transform: translateY(2px);
        }

        .btn {
            margin-top: 230px;
            text-align: center;
        }

        .both {
            width: 150px;
            text-transform: uppercase;
            padding: 10px 15px;
            font-size: 20px;
            letter-spacing: 2px;
            font-weight: bold;
            border-radius: 10px;
            margin: 30px;
            outline: none;
            transition: all ease 0.5s;
        }
        a {
            text-decoration: none;
            color:#ffffff;
        }
    </style>
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else

            @endauth
        </div>
@endif
<!-- HTML !-->


    <div class="btn">
        <button class="button-29 both" role="button">
            @if (Route::has('login'))
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            @endif
        </button>
        <button class="button-29 both" role="button">
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            @endif
        </button>
    </div>
</div>

</body>
</html>
