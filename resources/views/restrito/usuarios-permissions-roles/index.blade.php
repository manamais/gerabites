@extends('layouts.restrito')
@section('content')
<ol class="breadcrumb breadcrumb-arrow text-uppercase">
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/usuarios')}}'>Usuários</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
</h3>


<div class="row">
    <div class="col-lg-12">
        <div class="data-info">
            <table id="tableSearch" class="display datatable">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOME</th>
                        <th width='120px'>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $registro)
                    <tr>
                        <td> {{$registro->id}} </td>
                        <td>
                            <h5><strong>{{$registro->name}}</strong></h5>
                            <hr/>
                            @foreach($table_pivot as $pivot)
                            @if( $registro->id == $pivot->prRoleId)
                            <div class="btn-group margin-inline" aria-label="" role="group">
                                <button type="button" class="btn btn-primary m-b-5">
                                    {{$pivot->namePerm}}
                                </button>
                                <button type="button" class="btn btn-danger p-0" onclick="deletar('{{url("/restrito/$page/deletar/$pivot->idpr")}}')" id='urlDeletar' >
                                    <i class="zmdi zmdi-minus-circle" aria-hidden="true"></i>
                                </button>
                            </div>
                            @endif
                            @endforeach
                        </td>
                       
                        <td>
                            <a href='{{url("/restrito/$page/adicionar/$registro->id")}}' class='btn btn-primary btn-xs white'>
                                <i class='zmdi zmdi-edit'></i> Nova Permissão
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
            responsive: false,
            "oLanguage": {"sSearch": ""}
    });
    $("div.tool2").html('<h5 class="zero-m">Dados Cadastrados</h5>');
    $('.dataTables_filter input').attr("placeholder", "Pesquisar");
</script>
@endpush

@endsection