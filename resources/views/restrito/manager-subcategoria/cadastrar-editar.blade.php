@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/categorias')}}'>Classificação</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            @if(isset($data->SUBCAT_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->SUBCAT_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif

            <div class='row'>
                <div class='input-field col-md-3'>
                    <label for='CAT_CODIGO'>CATEGORIA</label>
                    <select name='CAT_CODIGO' class="form-control" required>
                        @foreach($categorias as $categoria)
                        <option
                            @if(isset($data->CAT_CODIGO) && ($data->CAT_CODIGO==$categoria->CAT_CODIGO)) @php echo 'selected'; @endphp @endif
                            value="{{$categoria->CAT_CODIGO}}" >
                            {{$categoria->CAT_TITULO}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('CAT_CODIGO'))
                <span class='text-danger'> {{ $errors->first('CAT_CODIGO') }} </span>
                @endif
            </div>

            <div class='input-field col-md-2'>
                <label for='SUBCAT_TITULO'>NOME</label>
                {!! Form::text('SUBCAT_TITULO', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '50', 'class' => 'form-control']) !!}
                @if ($errors->has('SUBCAT_TITULO'))
                <span class='text-danger'> {{ $errors->first('SUBCAT_TITULO') }} </span>
                @endif
            </div>

            <div class='input-field col-md-7'>
                <label for='SUBCAT_DESCRICAO'>DESCRIÇÃO</label>
                {!! Form::text('SUBCAT_DESCRICAO', null, ['class' => 'form-control' ]) !!}
                @if ($errors->has('SUBCAT_DESCRICAO'))
                <span class='text-danger'> {{ $errors->first('SUBCAT_DESCRICAO') }} </span>
                @endif
            </div>


        </div>

        <div class='modal-footer'>
            <button type='reset' class='btn btn-default waves-effect'>Resetar</button>
            <button type='submit' class='btn btn-primary waves-effect waves-light'>Salvar Dados</button>
        </div>
        {!! Form::close() !!}

    </div>
</div>
</div>


@push('css')
@endpush

@push('js-topo')
@endpush

@push('js-footer')
<script src='{{url('/assets/restrict/js/plugins/jscolor.min.js')}}'></script>
@endpush

@endsection