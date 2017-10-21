@extends('layouts.restrito')
@section('content')

<ol class="breadcrumb breadcrumb-arrow text-uppercase">
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/posts')}}'>Postagens</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
    <a href='{{url("/restrito/$page/cadastrar")}}' class='btn btn-sm btn-primary pull-right'>Novo Registro</a>
</h3>

<h3 class="section-title first-title">
    {{$titulo}}
    <a href='{{url("/restrito/$page/cadastrar")}}' class='btn btn-sm btn-primary pull-right'>Novo Registro</a>
</h3>







<div class="row">
    <div class="col-lg-12">

        <div class="data-info">
            <table id="table2" class="display datatable">
                <thead>
                    <tr>
                        <th>MÍDIA SOCIAL</th>
                        <th>URL</th>
                        <th>ID (APP)</th>
                        <th class='hidden'></th>
                        <th class='hidden'></th>
                        <th width='120px'>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $registro)
                    <tr>
                        <td>{{$registro->MS_NOME}}</td>
                        <td>{{$registro->MS_URL}}</td>
                        <td>{{$registro->MS_APP_ID}}</td>
                        <td class='hidden'></td>
                        <td class='hidden'></td>
                        <td>
                            <a href='#' class='label label-danger m-r-5'
                               onclick="deletar('{{url("/restrito/$page/deletar/$registro->MS_CODIGO")}}')" id='urlDeletar' >
                                <i class='fa fa-trash-o'></i> Del
                            </a>

                            <a href='{{url("/restrito/$page/editar/$registro->MS_CODIGO")}}' class='label label-success'>
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
            paging: false,
            responsive: true,
            "oLanguage": {"sSearch": ""}
    });
    $("div.tool2").html('<h5 class="zero-m">Danger table</h5>');
    $('.dataTables_filter input').attr("placeholder", "Search");
    $('#table3').DataTable({
    info: false,
            paging: false,
            filter: false,
            responsive: true
    });
    $('#map').vectorMap({
    map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#d1e2f5', '#0f486f'],
            normalizeFunction: 'polynomial'
    });
</script>
@endpush

@endsection