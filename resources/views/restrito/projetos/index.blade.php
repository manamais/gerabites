@extends('layouts.restrito')
@section('content')

<ol class="breadcrumb breadcrumb-arrow text-uppercase">
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/projetos')}}'>Projetos</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
    @can('TAREFAS')
    <a href='{{url("/restrito/$page/cadastrar")}}' class='btn btn-sm btn-primary pull-right white'>Novo Registro</a>
    @endcan
</h3>

<div class="row">
    <div class="col-lg-12">
        <div class="data-info">
            <table id="tableSearch" class="display datatable">
                <thead>
                    <tr>
                        <th width='30px'>#</th>
                        <th>PROJETO</th>
                        <th>CLIENTE</th>
                        <th>EQUIPE</th>
                        <th>STATUS</th>
                        <th width='180px'>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $registro)
                    <tr>
                        <td>{{$registro->PROJ_CODIGO}}</td>
                        <td>{{$registro->PROJ_NOME}}</td>
                        <td>{{$registro->EMPR_NOMEFANTASIA}}</td>
                        <td>EQUIPE</td>
                        <td>{{$registro->PROJ_STATUS}}</td>
                        <td class='pull-right'>
                            <a href='{{url("/restrito/$page/view/$registro->PROJ_CODIGO")}}' class='btn btn-primary btn-xs white m-r-5'>
                                <i class='zmdi zmdi-eye'></i> View
                            </a>
                            @can('TAREFAS')
                            <a href='#' class='btn btn-default btn-xs white m-r-5'
                               onclick="deletar('{{url("/restrito/$page/deletar/$registro->PROJ_CODIGO")}}')" id='urlDeletar' >
                                <i class='zmdi zmdi-delete'></i> Del
                            </a>
                            <a href='{{url("/restrito/$page/editar/$registro->PROJ_CODIGO")}}' class='btn btn-primary btn-xs white'>
                                <i class='zmdi zmdi-edit'></i> Edit
                            </a>
                            @endcan
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
    $('.dataTables_filter input').attr("placeholder", "Pesquisar");
</script>
@endpush

@endsection