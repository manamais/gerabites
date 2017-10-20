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
                /* permissão gral de administrador (ADMIN) */
                [
                    'id' => 2,
                    'name' => 'GERENCIAMENTO-USUARIOS',
                    'label' => 'Gerenciamento dos usuários e atribuições de perfis, com exceçãos da criaçao de novos tipos de Permissões e Papéis e a exclusão do Implantador do Sistema.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 3,
                    'name' => 'CONFIGURACOES-EMPRESA',
                    'label' => 'Configurações dos dados da Imprensa',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 4,
                    'name' => 'CONFIGURACOES-PLUGINS',
                    'label' => 'Configurações dos plugins que estão instalados ou que deseja instalar conforme liberação da BemFuncional.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 5,
                    'name' => 'CONFIGURACOES-EMAIL',
                    'label' => 'Configurações das principais informações da porta do email.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 6,
                    'name' => 'CONFIGURACOES-REACOES',
                    'label' => 'Configurações dos dados da Imprensa',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 7,
                    'name' => 'CONFIGURACOES-EXPEDIENTE',
                    'label' => 'Gerenciamento dos funcionários/expediente da empresa.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 8,
                    'name' => 'CONFIGURACOES-BOLETO',
                    'label' => 'Gerenciamento das configurações do boleto.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 9,
                    'name' => 'CONFIGURACOES-MIDIAS-SOCIAIS',
                    'label' => 'Gerenciamento das midias sociais.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 10,
                    'name' => 'CONFIGURACOES-COMPORTAMENTOS',
                    'label' => 'Gerenciamento dos comportamentos.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 11,
                    'name' => 'CONFIGURACOES-SITE',
                    'label' => 'Gerenciamento das configurações do site.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 12,
                    'name' => 'CONFIGURACOES-LAYOUT-MASTER',
                    'label' => 'Cadastro e gerenciamento dos layouts para o site.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 13,
                    'name' => 'APLICACAO-LAYOUT',
                    'label' => 'Escolhe e aplica o layout no site.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 14,
                    'name' => 'GERENCIAMENTO-CATEGORIAS',
                    'label' => 'Gerencia as categorias das notícias.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 15,
                    'name' => 'GERENCIAMENTO-SUBCATEGORIAS',
                    'label' => 'Gerencia as subcategorias das notícias.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 16,
                    'name' => 'GERENCIAMENTO-POSICAO-NOTICIAS',
                    'label' => 'Gerencia as posições das notícias.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 17,
                    'name' => 'GERENCIAMENTO-POSICAO-BANNERS',
                    'label' => 'Gerencia as posições dos Banners.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 18,
                    'name' => 'GERENCIAMENTO-PAGINAS',
                    'label' => 'Gerencia as páginas avulsas criadas.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 19,
                    'name' => 'CRIACAO-POSTAGEM',
                    'label' => 'Cria e edita postagens sem liberação automática.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 20,
                    'name' => 'GERENCIAMENTO-MINHA-POSTAGEM',
                    'label' => 'Gerencia e libera suas postagens de forma automática.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 21,
                    'name' => 'GERENCIAMENTO-MATERIAS',
                    'label' => 'Gerencia todas as matérias do site. Edita, escolhe o local de destaque, entre outras configurações.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 22,
                    'name' => 'GERENCIAMENTO-COLUNA-SOCIAL',
                    'label' => 'Gerenciamento das postagens a cerca da coluna social.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 23,
                    'name' => 'GERENCIAMENTO-ANUNCIOS',
                    'label' => 'Gerenciamento dos banners do site.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 24,
                    'name' => 'MEU-PERFIL',
                    'label' => 'Visualização das informações do seu cadastro. Informações de usuário (pf) e informações da Pessoa Jurídica, quando houver.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 25,
                    'name' => 'GERENCIAMENTO-CONTABIL',
                    'label' => 'Gerencia as contas (receitas e despesas) e patrimônios, gerencia boletos (inclusive baixa manual) e envia boleto de cobrança para o usuário.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 26,
                    'name' => 'GERENCIAMENTO-CREDENCIAIS',
                    'label' => 'Autorização para a criação de PDF de crachás (somente para funcionários cadastrados no expediente).',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 27,
                    'name' => 'AUDITORIA',
                    'label' => 'Permite visualizar todos as interações dos usuários com o sistema (login, logout, ação).',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                /* gera e visualiza boletos e recibos das contas pagas  */
                [
                    'id' => 28,
                    'name' => 'MINHAS-FINANCAS',
                    'label' => 'Página do cliente para acompanhar seus débitos, pagamentos, receibos e NFs',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 29,
                    'name' => 'CHAMADOS',
                    'label' => 'Efetua solcitações diversas aos administradores do sistema.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 30,
                    'name' => 'RESPONDER-CHAMADOS',
                    'label' => 'Responde os chamados(solicitações) dos usuários',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 31,
                    'name' => 'MEUS-ANUNCIOS',
                    'label' => 'Dados completos dos contratos de todos os anúncios do cliente.',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        } else {
            echo "\e[31m Permission não é uma tabela vazia. Não foi efetuado o Seed.\e";
        }
    }

}
