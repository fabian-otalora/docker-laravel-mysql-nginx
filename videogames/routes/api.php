<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/get_players_by_date/{startDate}/{endDate}', [ApiController::class, 'getPlayersByDate']);
Route::get('/get_video_game_active', [ApiController::class, 'getVideoGameActive']);
Route::get('/get_players_with_video_games', [ApiController::class, 'getPlayersWithVideoGames']);

Route::post('/store_player', [ApiController::class, 'storePlayer']);
Route::post('/store_video_game', [ApiController::class, 'storeVideoGame']);