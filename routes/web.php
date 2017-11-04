<?php

//Route::group(['prefix' => 'restrito', 'middleware' => ['web', 'auth']], function() {
Route::group(['prefix' => 'restrito', 'middleware' => ['auth']], function() {

    /* CONFIGURAÇÕES DO SITE E SEUS COMPORTAMENTOS  ******* */
    Route::get('configuracoes', 'Restrito\ConfigController@index');


    /* TICKETS ***************************************** */
    Route::get('tickets', 'Restrito\TicketsController@index');
    Route::get('tickets/cadastrar', 'Restrito\TicketsController@cadastrar');
    Route::post('tickets/cadastrar', 'Restrito\TicketsController@cadastrarDB');
    Route::get('tickets/editar/{id}', 'Restrito\TicketsController@editar');
    Route::post('tickets/editar/{id}', 'Restrito\TicketsController@editarDB');
    Route::post('tickets/deletar/{id}', 'Restrito\TicketsController@deletar');
    /* MENSAGENS DOS TICKETS ***************************************** */
    Route::get('tickets/{id}/view', 'Restrito\TicketsController@view');
    Route::post('tickets/{id}/cadastrar', 'Restrito\TicketsController@cadastrarMsgDB');
//    Route::get('tickets/{id}/deletar/{id}', 'Restrito\TicketsController@cadastrarMsgDB');
    
    
    

    
    
    
    
    
    /* EMPRESA ***************************************** */
    Route::get('empresas', 'Restrito\ConfigEmpresaController@index');
    Route::get('empresas/cadastrar', 'Restrito\ConfigEmpresaController@cadastrar');
    Route::post('empresas/cadastrar', 'Restrito\ConfigEmpresaController@cadastrarDB');
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
    Route::get('posts/categorias', 'Restrito\ManagerCategoriasController@index');
    Route::get('posts/categorias/cadastrar', 'Restrito\ManagerCategoriasController@cadastrar');
    Route::post('posts/categorias/cadastrar', 'Restrito\ManagerCategoriasController@cadastrarDB');
    Route::get('posts/categorias/editar/{id}', 'Restrito\ManagerCategoriasController@editar');
    Route::post('posts/categorias/editar/{id}', 'Restrito\ManagerCategoriasController@editarDB');
    Route::post('posts/categorias/deletar/{id}', 'Restrito\ManagerCategoriasController@deletar');
    /* SUBCATEGORIAS ***************************************** */
    Route::get('posts/subcategorias', 'Restrito\ManagerSubCategoriasController@index');
    Route::get('posts/subcategorias/cadastrar', 'Restrito\ManagerSubCategoriasController@cadastrar');
    Route::post('posts/subcategorias/cadastrar', 'Restrito\ManagerSubCategoriasController@cadastrarDB');
    Route::get('posts/subcategorias/editar/{id}', 'Restrito\ManagerSubCategoriasController@editar');
    Route::post('posts/subcategorias/editar/{id}', 'Restrito\ManagerSubCategoriasController@editarDB');
    Route::post('posts/subcategorias/deletar/{id}', 'Restrito\ManagerSubCategoriasController@deletar');
    /* POSICOES POSTS  ***************************************** */
    Route::get('posts/posicoes', 'Restrito\ManagerPosicoesController@index');
    Route::get('posts/posicoes/cadastrar', 'Restrito\ManagerPosicoesController@cadastrar');
    Route::post('posts/posicoes/cadastrar', 'Restrito\ManagerPosicoesController@cadastrarDB');
    Route::get('posts/posicoes/editar/{id}', 'Restrito\ManagerPosicoesController@editar');
    Route::post('posts/posicoes/editar/{id}', 'Restrito\ManagerPosicoesController@editarDB');
    Route::post('posts/posicoes/deletar/{id}', 'Restrito\ManagerPosicoesController@deletar');
    /* PAGINAS  ***************************************** */
    Route::get('posts/paginas', 'Restrito\ManagerPaginasController@index');
    Route::get('posts/paginas/cadastrar', 'Restrito\ManagerPaginasController@cadastrar');
    Route::post('posts/paginas/cadastrar', 'Restrito\ManagerPaginasController@cadastrarDB');
    Route::get('posts/paginas/editar/{id}', 'Restrito\ManagerPaginasController@editar');
    Route::post('posts/paginas/editar/{id}', 'Restrito\ManagerPaginasController@editarDB');
    Route::post('posts/paginas/deletar/{id}', 'Restrito\ManagerPaginasController@deletar');

    /* REAÇÕES  ***************************************** */
    Route::get('posts/reacoes', 'Restrito\ManagerReacoesController@index');
    Route::get('posts/reacoes/cadastrar', 'Restrito\ManagerReacoesController@cadastrar');
    Route::post('posts/reacoes/cadastrar', 'Restrito\ManagerReacoesController@cadastrarDB');
    Route::get('posts/reacoes/editar/{id}', 'Restrito\ManagerReacoesController@editar');
    Route::post('posts/reacoes/editar/{id}', 'Restrito\ManagerReacoesController@editarDB');
    Route::post('posts/reacoes/deletar/{id}', 'Restrito\ManagerReacoesController@deletar');


    /* DEPOIMENTOS DOS USUÁRIOS QUANTOS AOS SERVIÇOS DA EMPRESA *************************** */
    Route::get('depoimentos', 'Restrito\DepoimentosUsersController@index');
    Route::get('depoimentos/cadastrar', 'Restrito\DepoimentosUsersController@cadastrar');
    Route::post('depoimentos/cadastrar', 'Restrito\DepoimentosUsersController@cadastrarDB');
    Route::get('depoimentos/editar/{id}', 'Restrito\DepoimentosUsersController@editar');
    Route::post('depoimentos/editar/{id}', 'Restrito\DepoimentosUsersController@editarDB');
    Route::post('depoimentos/deletar/{id}', 'Restrito\DepoimentosUsersController@deletar');
    /* MUDANÇA STATUS DOS DEPOIMENTOS *************************** */
    Route::get('depoimentos-adm', 'Restrito\DepoimentosAdmController@index');
    Route::get('depoimentos-adm/editar/{id}', 'Restrito\DepoimentosAdmController@editar');
    Route::post('depoimentos-adm/editar/{id}', 'Restrito\DepoimentosAdmController@editarDB');
    Route::post('depoimentos-adm/deletar/{id}', 'Restrito\DepoimentosAdmController@deletar');
    
    
    

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











    /* CONTROLE DE NOTÍCIAS DO AUTOR ******************************** */
    Route::get('posts/artigos', 'Restrito\PostsArtigosController@index');
    Route::get('posts/artigos/cadastrar', 'Restrito\PostsArtigosController@cadastrar');
    Route::post('posts/artigos/cadastrar', 'Restrito\PostsArtigosController@cadastrarDB');
    Route::get('posts/artigos/editar/{id}', 'Restrito\PostsArtigosController@editar');
    Route::post('posts/artigos/editar/{id}', 'Restrito\PostsArtigosController@editarDB');
    Route::post('posts/artigos/deletar/{id}', 'Restrito\PostsArtigosController@deletar');
    /* BANNERS ***************************************** */
    Route::get('posts/banners', 'Restrito\PostsBannersController@index');
    Route::get('posts/banners/cadastrar', 'Restrito\PostsBannersController@cadastrar');
    Route::post('posts/banners/cadastrar', 'Restrito\PostsBannersController@cadastrarDB');
    Route::get('posts/banners/editar/{id}', 'Restrito\PostsBannersController@editar');
    Route::post('posts/banners/editar/{id}', 'Restrito\PostsBannersController@editarDB');
    Route::post('posts/banners/deletar/{id}', 'Restrito\PostsBannersController@deletar');
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








    /* PROJETOS ***************************************** */
    Route::get('projetos', 'Restrito\ProjetosController@index');
    Route::get('projetos/cadastrar', 'Restrito\ProjetosController@cadastrar');
    Route::post('projetos/cadastrar', 'Restrito\ProjetosController@cadastrarDB');
    Route::get('projetos/editar/{id}', 'Restrito\ProjetosController@editar');
    Route::post('projetos/editar/{id}', 'Restrito\ProjetosController@editarDB');
    Route::post('projetos/deletar/{id}', 'Restrito\ProjetosController@deletar');
    Route::get('projetos/view/{id}', 'Restrito\ProjetosController@view');
    /* ETAPAS E FASE DO PROJETO ***************************************** */
    Route::get('projetos/etapas', 'Restrito\ProjetosEtapasController@index');
    Route::get('projetos/etapas/cadastrar', 'Restrito\ProjetosEtapasController@cadastrar');
    Route::post('projetos/etapas/cadastrar', 'Restrito\ProjetosEtapasController@cadastrarDB');
    Route::get('projetos/etapas/editar/{id}', 'Restrito\ProjetosEtapasController@editar');
    Route::post('projetos/etapas/editar/{id}', 'Restrito\ProjetosEtapasController@editarDB');
    Route::post('projetos/etapas/deletar/{id}', 'Restrito\ProjetosEtapasController@deletar');
    /* TAREFAS ***************************************** */
    Route::get('projetos/{cod}/tarefas/cadastrar', 'Restrito\ProjetosController@cadastrarTarefa');
    Route::post('projetos/{cod}/tarefas/cadastrar', 'Restrito\ProjetosController@cadastrarTarefaDB');
    Route::get('projetos/{cod}/tarefas/editar/{id}', 'Restrito\ProjetosController@editarTarefa');
    Route::post('projetos/{cod}/tarefas/editar/{id}', 'Restrito\ProjetosController@editarTarefaDB');
    Route::post('projetos/{cod}/tarefas/deletar/{id}', 'Restrito\ProjetosController@deletarTarefa');
    /* COMENTÁRIOS ***************************************** */
    Route::get('projetos/{cod}/comentarios/cadastrar', 'Restrito\ProjetosController@cadastrarComentarios');
    Route::post('projetos/{cod}/comentarios/cadastrar', 'Restrito\ProjetosController@cadastrarComentariosDB');
    Route::get('projetos/{cod}/comentarios/editar/{id}', 'Restrito\ProjetosController@editarComentarios');
    Route::post('projetos/{cod}/comentarios/editar/{id}', 'Restrito\ProjetosController@editarComentariosDB');
    Route::post('projetos/{cod}/comentarios/deletar/{id}', 'Restrito\ProjetosController@deletarComentarios');
    /* BUGS ***************************************** */
    Route::get('projetos/{cod}/bugs/cadastrar', 'Restrito\ProjetosController@cadastrarBugs');
    Route::post('projetos/{cod}/bugs/cadastrar', 'Restrito\ProjetosController@cadastrarBugsDB');
    Route::get('projetos/{cod}/bugs/editar/{id}', 'Restrito\ProjetosController@editarBugs');
    Route::post('projetos/{cod}/bugs/editar/{id}', 'Restrito\ProjetosController@editarBugsDB');
    Route::post('projetos/{cod}/bugs/deletar/{id}', 'Restrito\ProjetosController@deletarBugs');
 











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
