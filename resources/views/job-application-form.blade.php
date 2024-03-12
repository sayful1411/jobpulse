<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Application</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&family=Montserrat&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --box-height: 40px;
            --border-radius: 5px;
            --space-between: 20px;
            --font-size: 16px;

            --color-0: #ffffff;
            --color-1: #dcdcdd;
            --color-2: #c5c3c6;
            --color-3: #212529;
            --color-4: #659b5e;
            --color-5: #ce4257;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: "Montserrat", sans-serif;
            box-sizing: border-box;
        }

        body {
            padding: 0 10px;
            background-image: url("https://i.postimg.cc/BnhHF28S/nastuh-abootalebi-y-Wwob8kw-OCk-unsplash-modified.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }

        #survey-container {
            margin: 20px auto;
            padding: 30px 20px;
            width: 100%;
            max-width: 840px;
            border-radius: calc(3 * var(--border-radius));
        }

        #title {
            margin: 30px 0;
            text-align: center;
            font-family: "Kumbh Sans", sans-serif;
            font-size: 50px;
            text-transform: capitalize;
            color: var(--color-3);
        }

        #description {
            margin: 30px 0;
            padding: 5px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            color: var(--color-3);
        }

        #survey-form {
            padding: 30px;
            padding-top: 20px;
            background: var(--color-1);
            opacity: 98%;
            border: none;
            border-radius: calc(2 * var(--border-radius));
        }

        #survey-form * {
            font-size: var(--font-size);
        }

        .row-label,
        .row-input {
            padding: 5px 10px;
            margin: 0;
            height: var(--box-height);
            width: 100%;
            display: block;
        }

        .row-label {
            color: var(--color-3);
            font-weight: 600;
        }

        .row-label:not(:first-child) {
            margin-top: var(--space-between);
        }

        .row-input:not(.small) {
            background: white;
            border: none;
            border-radius: var(--border-radius);
        }

        .inline-label {
            margin-left: 10px;
            font-size: 14px;
            color: var(--color-3);
        }

        .small {
            height: calc(var(--box-height) * 0.75);
        }

        #comments {
            padding: 10px;
            margin: 0;
            height: 120px;
            width: 100%;
            background: white;
            border: none;
            border-radius: var(--border-radius);
            resize: none;
        }

        #submit {
            margin-top: calc(2 * var(--space-between));
            height: var(--box-height);
            width: 100%;
            background: var(--color-4);
            border: none;
            border-radius: var(--border-radius);
            color: white;
            font-weight: 600;
            cursor: pointer;
            text-transform: capitalize;
        }

        #submit:hover {
            box-shadow: 0 0 2px var(--color-3);
        }

        .success {
            color: #06aa0c;
        }

        .error {
            color: #dc1c1c;
        }

        .nav{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn{
            text-decoration: none;
            color: #fff;
            background-color: #333;
            padding: 8px 12px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="survey-container">

        <div class="nav">
            <a href="{{ url()->previous() }}" class="btn">Go Back</a>
            <a href="{{ route('home') }}" class="btn">Home</a>
        </div>

        <h1 id="title">Job form</h1>

        <p id="description">Fill in to apply</p>

        <form id="survey-form" action="{{ route('store.applied.job', $job->id) }}" method="POST">
            @csrf

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif

            <!-- name -->
            <label id="name-label" class="row-label" for="name">Name:</label>
            <input id="name" name="name" class="row-input" type="text" placeholder="Enter your name">
            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <!-- years of experience -->
            <label id="number-label" class="row-label" for="number">Years of experience (optional):</label>
            <input id="number" name="experience" class="row-input" type="number"
                placeholder="Enter number of years of experience" min="0" max="50">
            @error('experience')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <!-- salary radio -->
            <label id="salary-label" class="row-label" for="salary">Expected salary:</label>
            <input id="salary" name="expected_salary" class="row-input" type="number" placeholder="$1000">
            @error('expected_salary')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <!-- submit button -->
            <button id="submit" type="submit">Submit</button>

        </form>

    </div>
</body>

</html>
