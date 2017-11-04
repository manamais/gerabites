@extends('layouts.restrito')
@section('content')

<ol class="breadcrumb breadcrumb-arrow text-uppercase">
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/categorias')}}'>Classificação</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
    <a href='{{url("/restrito/$page/cadastrar")}}' class='btn btn-sm btn-primary pull-right white'>Novo Registro</a>
</h3>

<div class="row">
    <div class="col-lg-12">
        <div class='content-box'>
            <div class='content'>
                <table class="table display">
                    @foreach($data as $registro)
                    @if($registro->CB_BANCO == 'BANCO DO BRASIL')
                    @php $class = 'text-warning' @endphp
                    @else
                    @php $class = 'text-info' @endphp
                    @endif
                    <thead>
                        <tr>
                            <th class="{!!$class!!}">BANCO</th>
                            <th>AGÊNCIA</th>
                            <th>CONTA CORRENTE</th>
                            <th class='text-warning'>CARTEIRA</th>
                            <th class='text-warning'>VAR. CART.</th>
                            <th class='text-warning'>CONVÊNIO</th>
                            <th class='text-info'>CÓD. CLI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="{!!$class!!}">{{$registro->CB_BANCO }}</td>
                            <td>{{$registro->CB_AGENCIA }}-{{$registro->CB_AGENCIA_DV }}</td>
                            <td>{{$registro->CB_CONTA }}-{{$registro->CB_CONTA_DV }}</td>
                            <td class='text-warning'>{{$registro->CB_CARTEIRA }}</td>
                            <td class='text-warning'>{{$registro->CB_VARIACAOCARTEIRA }}</td>
                            <td class='text-warning'>{{$registro->CB_CONVENIO }}</td>
                            <td class='text-info'>{{$registro->CB_CODIGOCLIENTE }}</td>
                        </tr>
                        <tr>
                            <th colspan='3'>MENSAGEM #1</th>
                            <th colspan='2'>MENSAGEM #2</th>
                            <th colspan='2'>MENSAGEM #3</th>
                        </tr>
                        <tr>
                            <td colspan='3'>{{ $registro->CB_MENSAGEM1 }}</td>
                            <td colspan='2'>{{ $registro->CB_MENSAGEM2 }}</td>
                            <td colspan='2'>{{ $registro->CB_MENSAGEM3 }}</td>
                        </tr>
                        <tr>
                            <th colspan='3'>INSTRUÇÃO #1</th>
                            <th colspan='2'>INSTRUÇÃO #2</th>
                            <th colspan='2'>INSTRUÇÃO #3</th>
                        </tr>
                        <tr>
                            <td colspan='3'>{{ $registro->CB_INSTRUCAO1 }}</td>
                            <td colspan='2'>{{ $registro->CB_INSTRUCAO2 }}</td>
                            <td colspan='2'>{{ $registro->CB_INSTRUCAO3 }}</td>
                        </tr>

                        <tr>
                            <td colspan='7'>
                                <a href='{{url("/restrito/$page/editar/$registro->CB_CODIGO")}}' 
                                   class='btn btn-primary btn-xs white m-r-5'>
                                    <i class='fa fa-pencil'></i> Edit
                                </a>

                                <a href='{{url("/restrito/$page/view-modelo")}}' 
                                   target='_blank' class='btn btn-default btn-xs white'>
                                    Visualizar Modelo
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach


                </table>
            </div>


        </div>
    </div>
</div>

@push('css')
@endpush

@push('js-topo')

@endpush

@push('js-footer')
@endpush

@endsection