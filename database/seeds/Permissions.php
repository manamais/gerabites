<?php

use Illuminate\Database\Seeder;

class Permissions extends Seeder {

    public function run() {
        if (DB::table('permissions')->get()->count() == 0) {
            DB::table('permissions')->insert([
                /* permissão gral de administrador (ADMIN) */
                [
                    'id' => 1,
                    'name' => 'SUPERADMIN',
                    'label' => 'Perfil implantador BemFuncional',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                /* CONFIGURAÇÕES DO SITE/EMPRESA/FINANCEIRO */
                [
                    'id' => 2,
                    'name' => 'COMPANY',
                    'label' => 'Configurações dos dados gerais do Freelancer/Company',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 3,
                    'name' => 'EMAIL',
                    'label' => 'Configurações das principais informações da porta do email.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 4,
                    'name' => 'BOLETO',
                    'label' => 'Gerenciamento das configurações do boleto.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 5,
                    'name' => 'MIDIAS-SOCIAIS',
                    'label' => 'Gerenciamento das midias sociais.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                /* CONFIGURAÇÕES DO SITE/EMPRESA/FINANCEIRO */



                /* MANAGER SITE */
                [
                    'id' => 6,
                    'name' => 'USUARIOS',
                    'label' => 'Gerenciamento dos usuários e atribuições de perfis, com exceçãos da criaçao de novos tipos de Permissões e Papéis e a exclusão do Implantador do Sistema.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 7,
                    'name' => 'TAREFAS',
                    'label' => 'Gerenciamento das tarefas dos projetos',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 8,
                    'name' => 'COMENTÁRIOS',
                    'label' => 'Inserir comentários nos projetos.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 9,
                    'name' => 'ARQUIVOS',
                    'label' => 'Inserir arquivos nos projetos.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 10,
                    'name' => 'BUGS',
                    'label' => 'Relatar bugs nos projetos.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 11,
                    'name' => 'BUGS-STATUS',
                    'label' => 'Informar se os bugs foram resolvidos ou não.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
                
                
                
                [
                    'id' => 12,
                    'name' => 'PRODUTOS/SERVICOS',
                    'label' => 'Interação com todos os projetos.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 13,
                    'name' => 'FINANCEIRO/CONTABILIDADE',
                    'label' => 'Gerencia as contas (receitas e despesas), valores e taxas de serviços e impostos, gerencia boletos (inclusive baixa manual) e envia boleto de cobrança para o usuário.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 14,
                    'name' => 'CREDENCIAIS',
                    'label' => 'Autorização para a criação de PDF de crachás (somente para funcionários cadastrados no expediente).',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 15,
                    'name' => 'RESPONDER-CHAMADOS',
                    'label' => 'Responde os chamados(solicitações) dos usuários',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 16,
                    'name' => 'LIBERAR-DEPOIMENTOS',
                    'label' => 'Libera ou exclui depoimentos dos clientes relacionados a empresa.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
                /* POSTAGENS NO SITE */
                [
                    'id' => 17,
                    'name' => 'CATEGORIAS',
                    'label' => 'Gerencia as categorias das notícias.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 18,
                    'name' => 'SUBCATEGORIAS',
                    'label' => 'Gerencia as subcategorias das notícias.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 19,
                    'name' => 'POSTAGEM',
                    'label' => 'Cria e edita postagens sem liberação automática.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 20,
                    'name' => 'BANNERS',
                    'label' => 'Gerenciamento dos banners do site.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 21,
                    'name' => 'PORTIFOLIO',
                    'label' => 'Gerenciamento dos portifólios.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 22,
                    'name' => 'REACOES-POSTAGENS',
                    'label' => 'Configurações dos dados da Imprensa',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                /* POSTS DO SITE */
                [
                    'id' => 23,
                    'name' => 'AUDITORIA',
                    'label' => 'Permite visualizar todos as interações dos usuários com o sistema (login, logout, ação).',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
                
                /* PERMISSÕES DOS CLIENTES */
                [
                    'id' => 24,
                    'name' => 'MEU-PERFIL',
                    'label' => 'Visualização das informações do seu cadastro. Informações de usuário (pf) e informações da Pessoa Jurídica, quando houver.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 25,
                    'name' => 'MINHAS-FINANCAS',
                    'label' => 'Página do cliente para acompanhar seus débitos, pagamentos, receibos e NFs',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 26,
                    'name' => 'MEUS-DEPOIMENTOS',
                    'label' => 'Criação de depoimentos para o site. Para que seja visualizado no site, é necessário a liberação de um dos administradores.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 27,
                    'name' => 'MEUS-PROJETOS',
                    'label' => 'Acompanhamento dos projetos atribuídos ao seu perfil.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 28,
                    'name' => 'CHAMADOS',
                    'label' => 'Efetua solcitações diversas aos administradores do sistema.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Permission não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
