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

                @foreach($data as $registro)
                <a href='#' class='label label-danger m-r-5 pull-right'
                   onclick="deletar('{{url("/restrito/$page/deletar/$registro->PAG_CODIGO")}}')" id='urlDeletar' >
                    <i class='fa fa-trash-o'></i> Del
                </a>

                <a href='{{url("/restrito/$page/editar/$registro->PAG_CODIGO")}}' class='label label-success pull-right m-r-5'>
                    <i class='fa fa-pencil'></i> Edit
                </a>
                <h2>{{$registro->PAG_TITULO}}</h2>
                <p>{!!$registro->PAG_DESCRICAO!!}</p>

                @endforeach

                {{ $data->links() }}
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