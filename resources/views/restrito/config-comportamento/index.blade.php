@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/empresa')}}'>Configurações</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            <div class='table-responsive'>
                <table class='table table-hover datatable'>
                    <thead>
                        <tr>
                            <th>EXIBIÇÃO URL</th>
                            <th>VOTO S/REGISTRO?</th>
                            <th>AUTOAPROVAÇÃO?</th>
                            <th>AUTOLISTAGEM?</th>
                            <th>AUTOCARREGAMENTO?</th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th width='120px'>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $registro)
                        <tr>
                            <td>{{$registro->CONFIG_METODOURL}}</td>
                            <td>{{$registro->CONFIG_VOTARSEMREGISTRO}}</td>
                            <td>{{$registro->CONFIG_AUTOAPROVACAO}}</td>
                            <td>{{$registro->CONFIG_AUTOLISTAGEM}}</td>
                            <td>{{$registro->CONFIG_AUTOCARREGAMENTO	}}</td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td>
                                <a href='#' class='label label-danger m-r-5'
                                   onclick="deletar('{{url("/restrito/$page/deletar/$registro->CONFIG_CODIGO")}}')" id='urlDeletar' >
                                    <i class='fa fa-trash-o'></i> Del
                                </a>

                                <a href='{{url("/restrito/$page/editar/$registro->CONFIG_CODIGO")}}' class='label label-success'>
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