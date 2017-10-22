@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/categorias')}}'>Classificação</a></li>
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
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th width='300px'>IMAGEM</th>
                            <th>DESCRIÇÃO</th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th width='120px'>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $registro)
                        <tr>
                            <td>
                                <a href='{{url("/assets/restrict/images/layouts/$registro->POS_IMAGEM")}}' target='_blank'>
                                    
                                @if(isset($registro->POS_IMAGEM) && $registro->POS_IMAGEM!=null)
                                <img src='{{url("/assets/restrict/images/layouts/$registro->POS_IMAGEM")}}' class='img-responsive'  />
                                @endif
                                </a>
                            </td>
                            <td>{{$registro->POS_DESCRICAO}}</td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td>
                                <a href='#' class='label label-danger m-r-5'
                                   onclick="deletar('{{url("/restrito/$page/deletar/$registro->POS_CODIGO")}}')" id='urlDeletar' >
                                    <i class='fa fa-trash-o'></i> Del
                                </a>

                                <a href='{{url("/restrito/$page/editar/$registro->POS_CODIGO")}}' class='label label-success'>
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