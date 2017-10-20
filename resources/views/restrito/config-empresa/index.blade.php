@extends('layouts.restrito')
@section('content')





<div class="container-fluid">

    <ol class="breadcrumb breadcrumb-arrow">
        <li><a href="#">Home</a></li>
        <li><a href="#">Library</a></li>
        <li><a href="#">Media</a></li>
        <li class="active">Data</li>
    </ol>


    <div class="row">
        <div class="col-lg-12">

            <div class="data-info">
                <table id="table2" class="display datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>EMPRESA</th>
                            <th>FONE</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $registo)
                        <tr>
                            <td>{{$registo->EMPR_CODIGO}}</td>
                            <td>{{$registo->EMPR_NOMEFANTASIA}}</td>
                            <td>{{$registo->EMPR_FONE1}}</td>

                            <td></td>
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