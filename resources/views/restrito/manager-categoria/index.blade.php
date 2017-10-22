@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/categorias')}}'>Classificação</a></li>
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
                            <th>TIPO</th>
                            <th>CATEGORIA</th>
                            <th>DESCRIÇÃO</th>
                            <th>CORES</th>
                            <th>ICONE</th>
                            <th>LINKS</th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th width='120px'>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $registro)
                        <tr>
                            <td>
                                @if($registro->CAT_TIPO == 'E')
                                <span class='label label-default'>EDITORIA</span>
                                @endif
                                @if($registro->CAT_TIPO == 'B')
                                <span class='label label-danger'>BLOGS</span>
                                @endif
                                @if($registro->CAT_TIPO == 'C')
                                <span class='label label-warning'>COLUNA</span>
                                @endif
                            </td>
                            <td>{{$registro->CAT_TITULO}}</td>
                            <td>{{$registro->CAT_DESCRICAO}}</td>
                            <td class='text-center' style="background-color: #{{$registro->CAT_CORTOPO}}; color: #{{$registro->CAT_CORFONTETOPO}};">AMOSTRA</td>
                            <td class='text-center'><i class="fa fa-2x {{$registro->CAT_ICONE}}"></i></td>
                            <td>
                                @if($registro->CAT_LINKTOPO == 'S')
                                T
                                @endif
                                @if($registro->CAT_LINKFOOTER == 'S')
                                | R
                                @endif
                               </td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td>
                                <a href='#' class='label label-danger m-r-5'
                                   onclick="deletar('{{url("/restrito/$page/deletar/$registro->CAT_CODIGO")}}')" id='urlDeletar' >
                                    <i class='fa fa-trash-o'></i> Del
                                </a>

                                <a href='{{url("/restrito/$page/editar/$registro->CAT_CODIGO")}}' class='label label-success'>
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