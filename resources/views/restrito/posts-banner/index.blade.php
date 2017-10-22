@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/posts')}}'>Postagens</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
    <a href='{{url("/restrito/$page/cadastrar")}}' class='btn btn-sm btn-primary pull-right'>Novo Registro</a>
</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            <div class='table-responsive'>
                <table class='table table-hover datatable'>
                    <thead>
                        <tr>
                            <th>CLIENTE/RESPONSÁVEL</th>
                            <th>IDENTIFICAÇÃO</th>
                            <th>ORDEM</th>
                            <th>INÍCIO</th>
                            <th>TÉRMINO</th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th width='120px'>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $registro)
                        <tr>
                            <td>
                                @foreach($clientes as $cliente)
                                @if($registro->ANU_CLIENTE == $cliente->id)
                                {{$cliente->name}}
                                @endif
                                @endforeach
                            </td>
                            <td>{{$registro->ANU_NOME}} ({{$registro->POS_DESCRICAO}} - {{$registro->POS_TAMANHO}})</td>
                            <td>{{$registro->ANU_ORDEM}}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($registro->ANU_DTINICIO)->format('d/m/Y')}}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($registro->ANU_DTTERMINO)->format('d/m/Y')}}
                            </td>

                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td>
                                <a href='#' class='label label-danger m-r-5'
                                   onclick="deletar('{{url("/restrito/$page/deletar/$registro->ANU_CODIGO")}}')" id='urlDeletar' >
                                    <i class='fa fa-trash-o'></i> Del
                                </a>

                                <a href='{{url("/restrito/$page/editar/$registro->ANU_CODIGO")}}' class='label label-success'>
                                    <i class='fa fa-pencil'></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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