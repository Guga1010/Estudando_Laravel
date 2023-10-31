<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//name() -> nomear uma rota
Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');
Route::get('/sobre-nos',[\App\Http\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobrenos');
Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::get('/login',function(){ return 'Login'; })->name('site.login');

//Agrupar rotas. Por exemplo: 1) /app/clientes 2)app/fornecedores ...
Route::prefix('/app')->group(function() {
    Route::get('/clientes',function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores',[\App\Http\Controllers\FornecedorController::class,'index'])->name('app.fornecedores');
    Route::get('/produtos',function(){ return 'produtos'; })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class,'teste'])->name('teste');

//Quando a rota digitada não for encontrada, eixibirá essa mensagem
Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});