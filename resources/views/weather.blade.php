<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f0f8ff;
        }

        .hero {
            position: relative;
            color: white;
            text-align: center;
            padding: 100px 20px;
            background-size: cover;
            background-position: center;
        }

        .hero .overlay {
            background: rgba(0, 0, 0, 0.5);
            padding: 50px;
            border-radius: 10px;
        }

        .search-box {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .search-box input {
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            width: 300px;
        }

        .search-box button {
            padding: 10px;
            background-color: #3bceff86;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .weather-results {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
            margin: 10px;
        }

        .card .icon {
            font-size: 50px;
            margin-bottom: 10px;
        }

        .card.sunny .icon {
            color: #FFD700;
        }

        .card.cloudy .icon {
            color: #B0C4DE;
        }

        .card.rainy .icon {
            color: #87CEFA;
        }
    </style>
</head>
<body>
    <section class="hero" style="background-image: url('{{ asset('images/background.jpg') }}')">
        <div class="overlay">
            <h1>Latest Weather Forecasts</h1>
            <p>Get the most accurate and up-to-date weather information for your location</p>
            <div class="search-box">
                <form method="GET" action="/weather" class="my-4 d-flex">
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter city name">
                    <button type="submit" class="btn btn-primary">Get Weather</button>
                </form>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        @if(isset($data))
            <div class="weather-results">
                <div class="card sunny">
                    <div class="icon">☀️</div>
                    <h2 class="card-title">{{ $data['name'] }}</h2>
                    <p class="card-text">Temperature: {{ $data['main']['temp'] }} °C</p>
                    <p class="card-text">Weather: {{ ucfirst($data['weather'][0]['description']) }}</p>
                    <p class="card-text">Humidity: {{ $data['main']['humidity'] }}%</p>
                    <p class="card-text">Wind Speed: {{ $data['wind']['speed'] }} m/s</p>
                </div>
            </div>
        @elseif(isset($error))
            <div class="alert alert-danger mt-5">
                {{ $error }}
            </div>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cityInput = document.getElementById('city');
            cityInput.addEventListener('focus', function() {
                cityInput.classList.add('shadow');
            });

            cityInput.addEventListener('blur', function() {
                cityInput.classList.remove('shadow');
            });
        });
    </script>
</body>
</html>
