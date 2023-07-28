<!DOCTYPE html>
<html>
<head>
    <title>Fantasy Premier League Players</title>
</head>
<body>
    <h1>Player Details:</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Team</th>
            <th>Element Type</th>
        </tr>
        @foreach ($players as $player)
            <tr>
                <td>{{ $player['first_name'] }} {{ $player['second_name'] }}</td>
                <td>{{ $player['team_name'] }}</td>
                <td>{{ $player['element_type_name'] }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>