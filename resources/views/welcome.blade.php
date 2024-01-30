<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- my css -->
    @vite('resources/js/app.js')
</head>

<body>
    <header class="text-center">
        <h1>Trains</h1>
    </header>

    <div class="container mb-5">
        <h2>Complete List of All Trains</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Azienda</th>
                    <th>Codice Treno</th>
                    <th>Stazione di Partenza</th>
                    <th>Data di Partenza</th>
                    <th>Orario di Partenza</th>
                    <th>Stazione di Arrivo</th>
                    <th>Orario di Arrivo</th>
                    <th>Stato</th>
                    <th>Ritardo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <td>{{ $train['azienda'] }}</td>
                        <td>{{ $train['codice_treno'] }}</td>
                        <td>{{ $train['stazione_di_partenza'] }}</td>
                        <td>{{ $train['departure_date'] }}</td>
                        <td>{{ $train['orario_di_partenza'] }}</td>
                        <td>{{ $train['stazione_di_arrivo'] }}</td>
                        <td>{{ $train['orario_di_arrivo'] }}</td>
                        <td>{{ $train['cancellato'] }}</td>
                        <td>{{ $train['in_orario'] }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        <h2>Trains Departing Today</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Azienda</th>
                    <th>Codice Treno</th>
                    <th>Stazione di Partenza</th>
                    <th>Data di Partenza</th>
                    <th>Orario di Partenza</th>
                    <th>Stazione di Arrivo</th>
                    <th>Orario di Arrivo</th>
                    <th>Stato</th>
                    <th>Ritardo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($today_trains as $train)
                    <tr>
                        <td>{{ $train['azienda'] }}</td>
                        <td>{{ $train['codice_treno'] }}</td>
                        <td>{{ $train['stazione_di_partenza'] }}</td>
                        <td>{{ $train['departure_date'] }}</td>
                        <td>{{ $train['orario_di_partenza'] }}</td>
                        <td>{{ $train['stazione_di_arrivo'] }}</td>
                        <td>{{ $train['orario_di_arrivo'] }}</td>
                        <td>{{ $train['cancellato'] }}</td>
                        <td>{{ $train['in_orario'] }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
