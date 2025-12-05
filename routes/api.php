<?php



// http://localhost:8000/api/
// universal resource locator
// tickets
// users

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Ticket;

Route::post('/login', [AuthController::class, 'login']);  // Se utuliza para enviar o crear informacion
Route::post('/register', [AuthController::class, 'register']);  //  Se utiliza para obtener o leer informacion 

Route::get('/tickets' , function(){
    return Ticket::all();
});