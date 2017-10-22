@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/usuarios')}}'>Usuários</a></li>
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
                            <th>NOME</th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th width='120px'>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $registro)
                        <tr>
                            <td>
                                <h5><strong>{{$registro->name}}</strong></h5>
                                <hr/>
                                @foreach($table_pivot as $pivot)
                                @if( $registro->id == $pivot->userId)
                                <div class="btn-group margin-inline" aria-label="" role="group">
                                    <button type="button" class="btn btn-xs btn-danger">
                                        {{$pivot->roleName}}
                                    </button>
                                    <button type="button" class="btn btn-xs btn-danger" onclick="deletar('{{url("/restrito/$page/deletar/$pivot->id")}}')" id='urlDeletar' >
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                    </button>
                                </div>
                                @endif
                                @endforeach
                            </td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td>
                                <a href='{{url("/restrito/$page/adicionar/$registro->id")}}' class='label label-success'>
                                    <i class='fa fa-pencil'></i> Adicionar Perfil
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