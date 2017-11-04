@extends('layouts.restrito')
@section('content')

<ol class="breadcrumb breadcrumb-arrow text-uppercase">
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/posts')}}'>Postagens</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
    <a href='{{url("/restrito/$page/cadastrar")}}' class='btn btn-sm btn-primary pull-right white'>Novo Registro</a>
</h3>

<div class="row">
    <div class="col-lg-12">
        <div class="data-info">
            <table id="table2" class="display datatable">
                <thead>
                    <tr>
                        <th width='30px'>#</th>
                        <th>IDENTIFICAÇÃO</th>
                        <th>POSIÇÃO</th>
                        <th width='90px'>ORDEM</th>
                        <th width='120px'>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $registro)
                    <tr>
                        <td>{{$registro->BAN_CODIGO}} </td>
                        <td>{{$registro->BAN_NOME}} </td>
                        <td>{{$registro->BAN_POSICAO}}</td>
                        <td>{{$registro->BAN_ORDEM}}</td>
                        <td>
                            <a href='#' class='btn btn-default btn-xs white m-r-5'
                               onclick="deletar('{{url("/restrito/$page/deletar/$registro->BAN_CODIGO")}}')" id='urlDeletar' >
                                <i class='zmdi zmdi-delete'></i> Del
                            </a>
                            <a href='{{url("/restrito/$page/editar/$registro->BAN_CODIGO")}}' class='btn btn-primary btn-xs white'>
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
    //Data Tables
    $('#table1').DataTable({
    "dom": '<"toolbar tool1">rtip',
            info: false,
            paging: false,
            responsive: true,
    });
    $("div.tool1").html('<h5 class="zero-m">Info table</h5>');
    $('#table2').DataTable({
    "dom": '<"toolbar tool2"><"clear-filter">frtip',
            info: false,
            paging: true,
            responsive: true,
            "oLanguage": {"sSearch": ""}
    });



</script>
@endpush

@endsection