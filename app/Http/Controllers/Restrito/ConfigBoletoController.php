<?php

namespace App\Http\Controllers\Restrito;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Restrito\ConfigBoletos;
use App\Models\Restrito\Empresa;
use Gate;

class ConfigBoletoController extends StandardController {

    protected $model;
    protected $empresa;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.config-boleto';
    protected $redirectIndex = '/restrito/configuracoes-boleto';

    public function __construct(ConfigBoletos $model, Empresa $empresa, Request $request) {
        $this->model = $model;
        $this->empresa = $empresa;
        $this->request = $request;
        $this->page = "configuracoes-boleto";
        $this->titulo = "CONFIGURAÇÕES DO BOLETO";
        $this->gate = 'SECRETARIA';
    }

    public function viewModelo() {
        $di = $this->empresa->all()->first();
        $gr = $this->model->all()->first();

        $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa([
            'nome' => "$di->EMPR_NOMEFANTASIA",
            'endereco' => "$di->EMPR_ENDERECO",
            'cep' => "$di->EMPR_CEP",
            'uf' => "$di->EMPR_UF",
            'cidade' => "$di->EMPR_CIDADE",
            'documento' => "$di->EMPR_CNPJ",
        ]);


        $pagador = new \Eduardokum\LaravelBoleto\Pessoa([
            'nome' => 'NOME COMPLETO DO CLIENTE (PJ/PF)',
            'endereco' => 'AVENIDA BRASIL, RUA 12-A',
            'bairro' => 'NOVA ESPERANÇA',
            'cep' => '99999-999',
            'uf' => 'UF',
            'cidade' => 'CIDADE DA ESPERANÇA',
            'documento' => '999.999.999-99',
        ]);


        if ($gr->CB_BANCO == "BANCO DO BRASIL") {

            $boletoArray = [
//                'logo' => 'assets/images/logoCimadseta.jpg', // Logo da empresa
                'logo' => '', // Logo da empresa
                'dataVencimento' => new \Carbon\Carbon('1790-01-01'),
                'valor' => 100.00, // $gr->REC_VALOR
                'multa' => 0,
                'juros' => 0,
                'juros_apos' => 0, // juros e multa após
                'diasProtesto' => false, // protestar após, se for necessário //'numero' => 1,
                'numero' => 0101010, //nosso numero
                'numeroDocumento' => 00000000, //nosso numero
                'pagador' => $pagador, // Objeto PessoaContract
                'beneficiario' => $beneficiario, // Objeto PessoaContract
                'agencia' => $gr->CB_AGENCIA, // BB, Bradesco, CEF, HSBC, Itáu
                'agenciaDv' => $gr->CB_AGENCIA_DV, // se possuir
                'conta' => $gr->CB_CONTA, // BB, Bradesco, CEF, HSBC, Itáu, Santander
                'contaDv' => $gr->CB_CONTA_DV, // Bradesco, HSBC, Itáu
                'carteira' => $gr->CB_CARTEIRA,
                'convenio' => $gr->CB_CONVENIO, // BB
                'variacaoCarteira' => $gr->CB_VARIACAOCARTEIRA, // BB
                //'codigoCliente' => $gr->CB_CODIGOCLIENTE, // Bradesco, CEF, Santander
                'descricaoDemonstrativo' => [$gr->CB_MENSAGEM1, $gr->CB_MENSAGEM2, $gr->CB_MENSAGEM3], // máximo de 5
                'instrucoes' => [$gr->CB_INSTRUCAO1, $gr->CB_INSTRUCAO2, $gr->CB_INSTRUCAO3], // máximo de 5
                'aceite' => $gr->CB_ACEITE,
                'especieDoc' => $gr->CB_ESPECIEDOC,
            ];

            $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Bb($boletoArray);
        }
        if ($gr->CB_BANCO == "CAIXA ECONÔMICA") {

            $boletoArray = [
//                'logo' => 'assets/images/logoCimadseta.jpg', // Logo da empresa
                'logo' => '', // Logo da empresa
                'dataVencimento' => new \Carbon\Carbon('1790-01-01'),
                'valor' => 100.00, // $gr->REC_VALOR
                'multa' => 0,
                'juros' => 0,
                'juros_apos' => 0, // juros e multa após
                'diasProtesto' => false, // protestar após, se for necessário //'numero' => 1,
                'numero' => 0101010, //nosso numero
                'numeroDocumento' => 00000000, //nosso numero
                'pagador' => $pagador, // Objeto PessoaContract
                'beneficiario' => $beneficiario, // Objeto PessoaContract
                'agencia' => $gr->CB_AGENCIA, // BB, Bradesco, CEF, HSBC, Itáu
                'agenciaDv' => $gr->CB_AGENCIA_DV, // se possuir
                'conta' => $gr->CB_CONTA, // BB, Bradesco, CEF, HSBC, Itáu, Santander
                'contaDv' => $gr->CB_CONTA_DV, // Bradesco, HSBC, Itáu
                'carteira' => 'RG',
                //'convenio' => $gr->CB_CONVENIO, // BB
                //'variacaoCarteira' => 'RG', // BB
                //'range' => 99999, // HSBC
                'codigoCliente' => $gr->CB_CODIGOCLIENTE, // Bradesco, CEF, Santander
                'descricaoDemonstrativo' => [$gr->CB_MENSAGEM1, $gr->CB_MENSAGEM2, $gr->CB_MENSAGEM3], // máximo de 5
                'instrucoes' => [$gr->CB_INSTRUCAO1, $gr->CB_INSTRUCAO2, $gr->CB_INSTRUCAO3], // máximo de 5
                'aceite' => $gr->CB_ACEITE,
                'especieDoc' => $gr->CB_ESPECIEDOC,
            ];

            $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Caixa($boletoArray);
        }



        return response($boleto->renderHTML());
    }

}
