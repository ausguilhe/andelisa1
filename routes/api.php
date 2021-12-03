<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Venda;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

    // Vendas
    Route::get("vendas", function () {
        return response()->json(Venda::with(["produto", "cliente"])->get());
    });
    Route::post("/venda", function(Request $request){
        $venda = new Venda($request->input());
        $venda->saveOrFail();
        return response()->json(["data" => "true"]);
    });
    Route::get("/venda/{id}", function($id){
        $venda = Venda::with(["produto", "cliente"])->findOrFail($id);
        return response()->json($venda);
    });
    Route::delete("/venda/{id}", function($id){
        $venda = Venda::findOrFail($id);
        $venda->delete();
        return response()->json(true);
    });

});
