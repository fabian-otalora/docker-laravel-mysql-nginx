<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\VideoGame;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\StoreVideoGameRequest;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\VideoGameResource;


class ApiController extends Controller
{
    /**
     * Create new player
     */
    public function storePlayer(StorePlayerRequest $request){

        try {
            $player = Player::create($request->all());
            $response = [
                "player" => new PlayerResource($player),
                "message" => "Player register :)"
            ];
            return response()->json($response, 201);

        } catch (\Throwable $e) {
            $response = [
                "status" => 500,
                "message" => "Error register :(",
                "error" => $e->getMessage()
            ];
            return response()->json($response, 500);
        }

    }

    /**
     * Create new video game
     */
    public function storeVideoGame(StoreVideoGameRequest $request){

        try {
            $videoGame = VideoGame::create($request->all());
            $response = [
                "video_game" => new VideoGameResource($videoGame),
                "message" => "Video Game register :)"
            ];
            return response()->json($response, 201);

        } catch (\Throwable $e) {
            $response = [
                "status" => 500,
                "message" => "Error register :(",
                "error" => $e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Get players by date
     */
    public function getPlayersByDate($startDate, $endDate){
        $data = Player::createdBetween($startDate, $endDate)->get();
        return response()->json($data, 200);
    }

    /**
     * Get active video games
     */
    public function getVideoGameActive(){
        $data = VideoGame::active()->get();
        return response()->json($data, 200);
    }

    /**
     * Get players with video games
     */
    public function getPlayersWithVideoGames(){
        $data = Player::with('videogames')->get();
        return response()->json($data, 200);
    }

}
