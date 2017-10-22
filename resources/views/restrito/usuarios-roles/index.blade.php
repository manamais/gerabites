@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/usuarios')}}'>Usuários</a></li>
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
                            <th>NOME</th>
                            <th>DESCRIÇÃO</th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th width='120px'>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $registro)
                        <tr>
                            <td>{{$registro->name}}</td>
                            <td>{{$registro->label}}</td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td>
                                <a href='#' class='label label-danger m-r-5'
                                   onclick="deletar('{{url("/restrito/$page/deletar/$registro->id")}}')" id='urlDeletar' >
                                    <i class='fa fa-trash-o'></i> Del
                                </a>

                                <a href='{{url("/restrito/$page/editar/$registro->id")}}' class='label label-success'>
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