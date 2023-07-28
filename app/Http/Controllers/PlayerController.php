<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class PlayerController extends Controller
{
    public function index()
    {
        // Fetch data from the Fantasy Premier League API
        $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');
        $data = $response->json();

        // Extract player names, team names, and element types
        $players = collect($data['elements'])->map(function ($player) use ($data) {
            $team_name = $this->getTeamName($player['team'], $data['teams']);
            $element_type_name = $this->getElementType($player['element_type'], $data['element_types']);

            return [
                'first_name' => $player['first_name'],
                'second_name' => $player['second_name'],
                'team_name' => $team_name,
                'element_type_name' => $element_type_name,
            ];
        });

        // Pass the data to the view
        return view('players', compact('players'));
    }

    private function getTeamName($teamId, $teams)
    {
        foreach ($teams as $team) {
            if ($team['id'] === $teamId) {
                return $team['name'];
            }
        }
        return 'Unknown Team';
    }

    private function getElementType($elementTypeId, $elementTypes)
    {
        foreach ($elementTypes as $elementType) {
            if ($elementType['id'] === $elementTypeId) {
                return $elementType['singular_name'];
            }
        }
        return 'Unknown Element Type';
    }
}
