<?php

//Route::group(['prefix' => 'restrito', 'middleware' => ['web', 'auth']], function() {
Route::group(['prefix' => 'restrito', 'middleware' => ['auth']], function() {

    /* CONFIGURAÇÕES DO SITE E SEUS COMPORTAMENTOS  ******* */
    Route::get('configuracoes', 'Restrito\ConfigController@index');


    /* EMPRESA ***************************************** */
    Route::get('empresas', 'Restrito\ConfigEmpresaController@index');
    Route::get('empresas/editar/{id}', 'Restrito\ConfigEmpresaController@editar');
    Route::post('empresas/editar/{id}', 'Restrito\ConfigEmpresaController@editarDB');
    /* DADOS DO BOLETO ***************************************** */
    Route::get('configuracoes-boleto', 'Restrito\ConfigBoletoController@index');
    Route::get('configuracoes-boleto/editar/{id}', 'Restrito\ConfigBoletoController@editar');
    Route::post('configuracoes-boleto/editar/{id}', 'Restrito\ConfigBoletoController@editarDB');
    Route::get('configuracoes-boleto/view-modelo', 'Restrito\ConfigBoletoController@viewModelo');
    /* CONFIG MIDIAS SOCIAIS***************************************** */
    Route::get('configuracoes-midias', 'Restrito\ConfigMidiasSociaisController@index');
    Route::get('configuracoes-midias/cadastrar', 'Restrito\ConfigMidiasSociaisController@cadastrar');
    Route::post('configuracoes-midias/cadastrar', 'Restrito\ConfigMidiasSociaisController@cadastrarDB');
    Route::get('configuracoes-midias/editar/{id}', 'Restrito\ConfigMidiasSociaisController@editar');
    Route::post('configuracoes-midias/editar/{id}', 'Restrito\ConfigMidiasSociaisController@editarDB');
    Route::post('configuracoes-midias/deletar/{id}', 'Restrito\ConfigMidiasSociaisController@deletar');
    /* CONFIG DO SISTEMA ***************************************** */
    Route::get('configuracoes-sistema', 'Restrito\ConfigSistemaController@index');
    Route::get('configuracoes-sistema/editar/{id}', 'Restrito\ConfigSistemaController@editar');
    Route::post('configuracoes-sistema/editar/{id}', 'Restrito\ConfigSistemaController@editarDB');

    /* GERENCIAMENTO DAS CLASSIFICAÇÕES (POSTS, ANÚNCIOS E PÁGINAS */
    Route::get('manager', 'Restrito\ManagerController@index');
    /* CATEGORIAS ***************************************** */
    Route::get('categorias', 'Restrito\ManagerCategoriasController@index');
    Route::get('categorias/cadastrar', 'Restrito\ManagerCategoriasController@cadastrar');
    Route::post('categorias/cadastrar', 'Restrito\ManagerCategoriasController@cadastrarDB');
    Route::get('categorias/editar/{id}', 'Restrito\ManagerCategoriasController@editar');
    Route::post('categorias/editar/{id}', 'Restrito\ManagerCategoriasController@editarDB');
    Route::post('categorias/deletar/{id}', 'Restrito\ManagerCategoriasController@deletar');
    /* SUBCATEGORIAS ***************************************** */
    Route::get('subcategorias', 'Restrito\ManagerSubCategoriasController@index');
    Route::get('subcategorias/cadastrar', 'Restrito\ManagerSubCategoriasController@cadastrar');
    Route::post('subcategorias/cadastrar', 'Restrito\ManagerSubCategoriasController@cadastrarDB');
    Route::get('subcategorias/editar/{id}', 'Restrito\ManagerSubCategoriasController@editar');
    Route::post('subcategorias/editar/{id}', 'Restrito\ManagerSubCategoriasController@editarDB');
    Route::post('subcategorias/deletar/{id}', 'Restrito\ManagerSubCategoriasController@deletar');
    /* POSICOES POSTS  ***************************************** */
    Route::get('posicoes', 'Restrito\ManagerPosicoesController@index');
    Route::get('posicoes/cadastrar', 'Restrito\ManagerPosicoesController@cadastrar');
    Route::post('posicoes/cadastrar', 'Restrito\ManagerPosicoesController@cadastrarDB');
    Route::get('posicoes/editar/{id}', 'Restrito\ManagerPosicoesController@editar');
    Route::post('posicoes/editar/{id}', 'Restrito\ManagerPosicoesController@editarDB');
    Route::post('posicoes/deletar/{id}', 'Restrito\ManagerPosicoesController@deletar');
    /* POSICOES ANUNCIOS  ***************************************** */
    Route::get('posicoes-anuncios', 'Restrito\ManagerPosicoesAnunciosController@index');
    Route::get('posicoes-anuncios/cadastrar', 'Restrito\ManagerPosicoesAnunciosController@cadastrar');
    Route::post('posicoes-anuncios/cadastrar', 'Restrito\ManagerPosicoesAnunciosController@cadastrarDB');
    Route::get('posicoes-anuncios/editar/{id}', 'Restrito\ManagerPosicoesAnunciosController@editar');
    Route::post('posicoes-anuncios/editar/{id}', 'Restrito\ManagerPosicoesAnunciosController@editarDB');
    Route::post('posicoes-anuncios/deletar/{id}', 'Restrito\ManagerPosicoesAnunciosController@deletar');
    /* PAGINAS  ***************************************** */
    Route::get('paginas', 'Restrito\ManagerPaginasController@index');
    Route::get('paginas/cadastrar', 'Restrito\ManagerPaginasController@cadastrar');
    Route::post('paginas/cadastrar', 'Restrito\ManagerPaginasController@cadastrarDB');
    Route::get('paginas/editar/{id}', 'Restrito\ManagerPaginasController@editar');
    Route::post('paginas/editar/{id}', 'Restrito\ManagerPaginasController@editarDB');
    Route::post('paginas/deletar/{id}', 'Restrito\ManagerPaginasController@deletar');

    /* REAÇÕES  ***************************************** */
    Route::get('reacoes', 'Restrito\ManagerReacoesController@index');
    Route::get('reacoes/cadastrar', 'Restrito\ManagerReacoesController@cadastrar');
    Route::post('reacoes/cadastrar', 'Restrito\ManagerReacoesController@cadastrarDB');
    Route::get('reacoes/editar/{id}', 'Restrito\ManagerReacoesController@editar');
    Route::post('reacoes/editar/{id}', 'Restrito\ManagerReacoesController@editarDB');
    Route::post('reacoes/deletar/{id}', 'Restrito\ManagerReacoesController@deletar');




    /* GESTÃO DE USUÁRIOS, PAPÉIS E PERMISSÕES NO SISTEMA *************************** */
    Route::get('usuarios', 'Restrito\UsuariosController@index');
    Route::get('usuarios/cadastrar', 'Restrito\UsuariosController@cadastrar');
    Route::post('usuarios/cadastrar', 'Restrito\UsuariosController@cadastrarDB');
    Route::get('usuarios/editar/{id}', 'Restrito\UsuariosController@editar');
    Route::post('usuarios/editar/{id}', 'Restrito\UsuariosController@editarDB');
    Route::post('usuarios/deletar/{id}', 'Restrito\UsuariosController@deletar');
    /* GESTÃO DE USUÁRIOS (PERMISSÕES)  - SOMENTE ADMIN ************************************* */
    Route::get('permissoes', 'Restrito\UsuariosPermissionsController@index');
    Route::get('permissoes/cadastrar', 'Restrito\UsuariosPermissionsController@cadastrar');
    Route::post('permissoes/cadastrar', 'Restrito\UsuariosPermissionsController@cadastrarDB');
    Route::get('permissoes/editar/{id}', 'Restrito\UsuariosPermissionsController@editar');
    Route::post('permissoes/editar/{id}', 'Restrito\UsuariosPermissionsController@editarDB');
    Route::post('permissoes/deletar/{id}', 'Restrito\UsuariosPermissionsController@deletar');
    /* GESTÃO DE USUÁRIOS (PAPEIS)  - SOMENTE ADMIN ***************************************** */
    Route::get('papeis', 'Restrito\UsuariosRolesController@index');
    Route::get('papeis/cadastrar', 'Restrito\UsuariosRolesController@cadastrar');
    Route::post('papeis/cadastrar', 'Restrito\UsuariosRolesController@cadastrarDB');
    Route::get('papeis/editar/{id}', 'Restrito\UsuariosRolesController@editar');
    Route::post('papeis/editar/{id}', 'Restrito\UsuariosRolesController@editarDB');
    Route::post('papeis/deletar/{id}', 'Restrito\UsuariosRolesController@deletar');
    /* GESTÃO DE USUÁRIOS (ATRIBUIR PERMISSÕES AOS PERFIS/PAPÉIS)  - SOMENTE ADMIN ************ */
    Route::get('permissoes-perfil', 'Restrito\UsuariosRolesPermissionsController@index');
    Route::get('permissoes-perfil/adicionar/{id}', 'Restrito\UsuariosRolesPermissionsController@adicionarPermissao');
    Route::post('permissoes-perfil/adicionar/{id}', 'Restrito\UsuariosRolesPermissionsController@adicionarPermissaoDB');
    Route::post('permissoes-perfil/deletar/{id}', 'Restrito\UsuariosRolesPermissionsController@deletar');
    /* GESTÃO DE USUÁRIOS (ATRIBUIR PERFIS AOS USUÁRIOS)  - SOMENTE ADMIN ************ */
    Route::get('perfil-usuarios', 'Restrito\UsuariosRolesUsersController@index');
    Route::get('perfil-usuarios/adicionar/{id}', 'Restrito\UsuariosRolesUsersController@adicionarPermissao');
    Route::post('perfil-usuarios/adicionar/{id}', 'Restrito\UsuariosRolesUsersController@adicionarPermissaoDB');
    Route::post('perfil-usuarios/deletar/{id}', 'Restrito\UsuariosRolesUsersController@deletar');










    /* POSTS   ***************************************** */
    Route::get('posts', 'Restrito\PostsController@index');
    /* CONTROLE DE NOTÍCIAS DO AUTOR ******************************** */
    Route::get('noticias', 'Restrito\PostsNoticiasController@index');
    Route::get('noticias/cadastrar', 'Restrito\PostsNoticiasController@cadastrar');
    Route::post('noticias/cadastrar', 'Restrito\PostsNoticiasController@cadastrarDB');
    Route::get('noticias/editar/{id}', 'Restrito\PostsNoticiasController@editar');
    Route::post('noticias/editar/{id}', 'Restrito\PostsNoticiasController@editarDB');
    Route::post('noticias/deletar/{id}', 'Restrito\PostsNoticiasController@deletar');
    /* BANNERS ***************************************** */
    Route::get('banners', 'Restrito\PostsBannersController@index');
    Route::get('banners/cadastrar', 'Restrito\PostsBannersController@cadastrar');
    Route::post('banners/cadastrar', 'Restrito\PostsBannersController@cadastrarDB');
    Route::get('banners/editar/{id}', 'Restrito\PostsBannersController@editar');
    Route::post('banners/editar/{id}', 'Restrito\PostsBannersController@editarDB');
    Route::post('banners/deletar/{id}', 'Restrito\PostsBannersController@deletar');
    /* VIDEOS   ***************************************** */
    Route::get('videos', 'Restrito\PostsVideosController@index');
    Route::get('videos/cadastrar', 'Restrito\PostsVideosController@cadastrar');
    Route::post('videos/cadastrar', 'Restrito\PostsVideosController@cadastrarDB');
    Route::get('videos/editar/{id}', 'Restrito\PostsVideosController@editar');
    Route::post('videos/editar/{id}', 'Restrito\PostsVideosController@editarDB');
    Route::post('videos/deletar/{id}', 'Restrito\PostsVideosController@deletar');






    /* ==================== MEU FINANCEIRO ================================= */
    Route::get('meus-boletos', 'Restrito\MeuFinanceiroController@index');
    Route::get('meus-boletos/{id}', 'Restrito\MeuFinanceiroController@viewBoleto');
    Route::get('meus-recibos', 'Restrito\MeuFinanceiroController@recibos');
    Route::get('meus-recibos/{id}', 'Restrito\MeuFinanceiroController@viewRecibo');
    Route::get('meu-perfil/{id}', 'Restrito\MeuPerfilController@perfil');




    /* ==================== FINANCEIRO ================================= */

    /* TIPOS DE SAÍDA ***************************************** */
    Route::get('despesas/categorias', 'Restrito\FinanceiroDespesasCategoriasController@index');
    Route::get('despesas/categorias/cadastrar', 'Restrito\FinanceiroDespesasCategoriasController@cadastrar');
    Route::post('despesas/categorias/cadastrar', 'Restrito\FinanceiroDespesasCategoriasController@cadastrarDB');
    Route::get('despesas/categorias/editar/{id}', 'Restrito\FinanceiroDespesasCategoriasController@editar');
    Route::post('despesas/categorias/editar/{id}', 'Restrito\FinanceiroDespesasCategoriasController@editarDB');
    Route::post('despesas/categorias/deletar/{id}', 'Restrito\FinanceiroDespesasCategoriasController@deletar');
    /* DÉBITOS ***************************************** */
    Route::get('despesas', 'Restrito\FinanceiroDespesasController@index');
    Route::get('despesas/cadastrar', 'Restrito\FinanceiroDespesasController@cadastrar');
    Route::post('despesas/cadastrar', 'Restrito\FinanceiroDespesasController@cadastrarDB');
    Route::get('despesas/editar/{id}', 'Restrito\FinanceiroDespesasController@editar');
    Route::post('despesas/editar/{id}', 'Restrito\FinanceiroDespesasController@editarDB');
    Route::post('despesas/deletar/{id}', 'Restrito\FinanceiroDespesasController@deletar');








    /* DÉBITOS ***************************************** */
    Route::get('projetos', 'Restrito\ProjetosController@index');
    Route::get('projetos/cadastrar', 'Restrito\ProjetosController@cadastrar');
    Route::post('projetos/cadastrar', 'Restrito\ProjetosController@cadastrarDB');
    Route::get('projetos/editar/{id}', 'Restrito\ProjetosController@editar');
    Route::post('projetos/editar/{id}', 'Restrito\ProjetosController@editarDB');
    Route::post('projetos/deletar/{id}', 'Restrito\ProjetosController@deletar');
    /* DÉBITOS ***************************************** */
    Route::get('projetos/etapas', 'Restrito\ProjetosEtapasController@index');
    Route::get('projetos/etapas/cadastrar', 'Restrito\ProjetosEtapasController@cadastrar');
    Route::post('projetos/etapas/cadastrar', 'Restrito\ProjetosEtapasController@cadastrarDB');
    Route::get('projetos/etapas/editar/{id}', 'Restrito\ProjetosEtapasController@editar');
    Route::post('projetos/etapas/editar/{id}', 'Restrito\ProjetosEtapasController@editarDB');
    Route::post('projetos/etapas/deletar/{id}', 'Restrito\ProjetosEtapasController@deletar');
    /* DÉBITOS ***************************************** */
    Route::get('projetos/{cod}/tarefas', 'Restrito\ProjetosTarefasController@tarefas');
    Route::get('projetos/{cod}/tarefas/cadastrar', 'Restrito\ProjetosTarefasController@cadastrarTarefa');
    Route::post('projetos/{cod}/tarefas/cadastrar', 'Restrito\ProjetosTarefasController@cadastrarTarefaDB');
    Route::get('projetos/{cod}/tarefas/editar/{id}', 'Restrito\ProjetosTarefasController@editarTarefa');
    Route::post('projetos/{cod}/tarefas/editar/{id}', 'Restrito\ProjetosTarefasController@editarTarefaDB');
    Route::post('projetos/{cod}/tarefas/deletar/{id}', 'Restrito\ProjetosTarefasController@deletar');















    /* BOLETOS - FATURAMENTO   ***************************************** */
    Route::get('receitas/boletos', 'Restrito\ReceitasController@listarBoletos');
    Route::get('receitas/boletos/{id}', 'Restrito\ReceitasController@viewBoleto');
    Route::get('receitas/gerar-boletos', 'Restrito\ReceitasController@gerarBoleto');
    Route::get('receitas/boletos/email/{id}', 'Restrito\ReceitasController@enviarEmail');

    Route::post('receitas/gerar-boletos-mensalidade', 'Restrito\ReceitasController@gerarBoletoMensalidade');
    Route::post('receitas/gerar-boletos-unico', 'Restrito\ReceitasController@gerarBoletoUnico');

    /* PORTAL TRANSPARÊNCIA   ***************************************** */
    Route::get('transparencia', 'Restrito\TransparenciaController@index');
    Route::get('transparencia/{ano}', 'Restrito\TransparenciaController@ano');
    Route::get('transparencia/{ano}/{mes}', 'Restrito\TransparenciaController@anoMes');














    /* PRODUTOS E SERVICOS  ***************************************** */
    Route::get('produtos-servicos', 'Restrito\ProdutosServicosController@index');
    Route::get('produtos-servicos/cadastrar', 'Restrito\ProdutosServicosController@cadastrar');
    Route::post('produtos-servicos/cadastrar', 'Restrito\ProdutosServicosController@cadastrarDB');
    Route::get('produtos-servicos/editar/{id}', 'Restrito\ProdutosServicosController@editar');
    Route::post('produtos-servicos/editar/{id}', 'Restrito\ProdutosServicosController@editarDB');
    Route::post('produtos-servicos/deletar/{id}', 'Restrito\ProdutosServicosController@deletar');

    /* PRODUTOS E SERVICOS  ***************************************** */
    Route::get('impostos', 'Restrito\FinanceiroImpostosController@index');
    Route::get('impostos/cadastrar', 'Restrito\FinanceiroImpostosController@cadastrar');
    Route::post('impostos/cadastrar', 'Restrito\FinanceiroImpostosController@cadastrarDB');
    Route::get('impostos/editar/{id}', 'Restrito\FinanceiroImpostosController@editar');
    Route::post('impostos/editar/{id}', 'Restrito\FinanceiroImpostosController@editarDB');
    Route::post('impostos/deletar/{id}', 'Restrito\FinanceiroImpostosController@deletar');










//Rota Inical do Dashboard
    Route::get('/', 'Restrito\RestritoController@index');
});



Auth::routes();


/* CONTROLES DO ACESSO PÚBLICO  */
Route::group(['prefix' => 'site'], function () {
    Route::get('boletos/{id}', 'Site\PublicReceitasController@index');

    /* é aconselhável deixar a rota pasta raiz por último */
    Route::get('/', 'Site\SiteController@index');
});





//Route::get('/', function () {
//    //return redirect()->action('Site\SiteController@index');
//    return view('site._home.index');
//});



Route::get('/coluna/social', 'Site\ColunaSocialController@coluna');
Route::get('/coluna/social/{slug}/{codigo}', 'Site\ColunaSocialController@post');

Route::get('/blog/{blogs}', 'Site\BlogsController@blog');
Route::get('/blog/{blogs}/{slug}', 'Site\BlogsController@post');

Route::get('/coluna/{colunas}', 'Site\ColunasController@coluna');
Route::get('/coluna/{colunas}/{slug}', 'Site\ColunasController@post');

Route::get('/{editoria}', 'Site\SiteController@editoria');
//Route::get('/{editoria}/{slug}', 'Site\SiteController@postEditorias');

Route::get('/reacoes/{reacao}/{post}', 'Site\ReacoesController@votar');
Route::get('/reacoes/cs/{reacao}/{post}/{id}', 'Site\ReacoesController@votarCS');
Route::get('/tags/{tags}', 'Site\TagsController@tags');


Route::get('/versaoimpressa/atual', 'Site\VersaoImpressaController@impresso');
Route::get('/versaoimpressa/{edicao}', 'Site\VersaoImpressaController@versaoImpressa');



//Route::resource('/flipbook','rudrarajiv\flipbooklaravel\FlipBookController');



Route::get('/', 'Site\SiteController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
