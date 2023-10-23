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

/*
Route::get('/', function () {
    return 'Olá, seja bem vindo!';
});
*/

// nome, categoria, assunto, mensagem
/*
Route::get(
    // {nome?} ? = parâmetro é opcional
    '/contato/{nome}/{categoria_id}', 
    function(
        // informar um valor padrão, caso o parâmetro seja opcional
        // e o valor pode ser omitido da direita para a esquerda
        string $nome = 'Desconhecido', 
        int $categoria_id = 1 // 1 - 'Informação'
    ){ 
        echo "Estamos aqui: $nome - $categoria_id";
    }
)->where( // expressão regular 
    'nome', '[A-Za-z]+' // o parâmetro "nome" deve aceitar apenas caracteres(A-Za-z) com ao menos um valor(+)
)->where(
    'categoria_id','[0-9]+'  // a parâmetro "categoria_id" deve aceitar apenas valores de 0 a 9(0-9) com ao menos um valor(+)
); 
*/

//name() -> nomear uma rota
Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');
Route::get('/sobre-nos',[\App\Http\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobrenos');
Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::get('/login',function(){ return 'Login'; })->name('site.login');

//Agrupar rotas. Por exemplo: 1) /app/clientes 2)app/fornecedores ...
Route::prefix('/app')->group(function() {
    Route::get('/clientes',function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores',function(){ return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos',function(){ return 'produtos'; })->name('app.produtos');
});

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

// FORMAS DE REDIRECIONAR
// Route::redirect('/rota2','/rota1');
Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Quando a rota digitada não for encontrada, eixibirá essa mensagem
Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});