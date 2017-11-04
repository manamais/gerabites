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
        <div class="data-info">
            <table id="tableSearch" class="display datatable">
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
                            <span class='label label-default label-sm'>EDITORIA</span>
                            @endif
                            @if($registro->CAT_TIPO == 'B')
                            <span class='label label-danger label-sm'>BLOGS</span>
                            @endif
                            @if($registro->CAT_TIPO == 'C')
                            <span class='label label-warning label-sm'>COLUNA</span>
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
                             <a href='#' class='btn btn-default btn-xs white m-r-5'
                               onclick="deletar('{{url("/restrito/$page/deletar/$registro->CAT_CODIGO")}}')" id='urlDeletar' >
                                <i class='zmdi zmdi-delete'></i> Del
                            </a>
                            <a href='{{url("/restrito/$page/editar/$registro->CAT_CODIGO")}}' class='btn btn-primary btn-xs white'>
                                <i class='zmdi zmdi-edit'></i> Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>

@push('css')
@endpush

@push('js-topo')

@endpush

@push('js-footer')
<script>
    $('#tableSearch').DataTable({
    "dom": '<"toolbar tool2"><"clear-filter">frtip',
            info: false,
            paging: true,
            responsive: true,
            "oLanguage": {"sSearch": ""}
    });
    $("div.tool2").html('<h5 class="zero-m">Dados Cadastrados</h5>');
    $('.dataTables_filter input').attr("placeholder", "Pesquisar");</script>
@endpush

@endsection