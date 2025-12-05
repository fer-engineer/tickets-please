<?php



// http://localhost:8000/api/
// universal resource locator
// tickets
// users


// api/v1/tickets/{id}/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\AuthController;

// api/v1/tickets
Route::apiResource('tickets', TicketController::class);


