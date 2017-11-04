@extends('layouts.restrito')
@section('content')

<ol class="breadcrumb breadcrumb-arrow text-uppercase">
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/projetos')}}'>Projetos</a></li>
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
                        <th width='30px'>#</th>
                        <th>CLIENTE</th>

                        <th width='180px'>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $registro)
                    <tr>
                        <td>
                            @if($registro->EMPR_CODIGO == 1)
                            <span class='text-danger'>
                                {{$registro->EMPR_CODIGO}}
                            </span>
                            @else
                            {{$registro->EMPR_CODIGO}}
                            @endif
                        </td>
                        <td>
                            @if($registro->EMPR_CODIGO == 1)
                            <span class='text-danger'>
                                {{$registro->EMPR_NOMEFANTASIA}}
                            </span>
                            @else
                            {{$registro->EMPR_NOMEFANTASIA}}
                            @endif
                        </td>

                        <td>
                            @if($registro->EMPR_CODIGO == 1)
                            @else
                            <a href='#' class='btn btn-default btn-xs white m-r-5'
                               onclick="deletar('{{url("/restrito/$page/deletar/$registro->EMPR_CODIGO")}}')" id='urlDeletar' >
                                <i class='zmdi zmdi-delete'></i> Del
                            </a>
                            @endif



                            <a href='{{url("/restrito/$page/editar/$registro->EMPR_CODIGO")}}' class='btn btn-primary btn-xs white'>
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
    $('.dataTables_filter input').attr("placeholder", "Pesquisar");
</script>
@endpush

@endsection