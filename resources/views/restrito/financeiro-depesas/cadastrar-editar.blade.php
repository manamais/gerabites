@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/despesas')}}'>despesas</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">

        @if(isset($data->DEB_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->DEB_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row manager'>
            <div class='input-field col-md-6'>
                <label for='TD_CODIGO'>DESCRIÇÃO</label>
                <select name='TD_CODIGO' id='DEB_CODIGO' class="select2 form-control">
                    @foreach($tipos as $tipo)
                    <option 
                        @if(isset($data->TD_CODIGO) && ($data->TD_CODIGO==$tipo->TD_CODIGO)) @php echo 'selected'; @endphp @endif 
                        value="{{$tipo->TD_CODIGO}}" >
                        {{$tipo->TD_DESCRICAO}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('TD_CODIGO'))
            <span class='text-danger'> {{ $errors->first('TD_CODIGO') }} </span>
            @endif
        </div>
        <div class='input-field col-md-6'>
            <label for='COMPLEMENTO'>COMPLEMENTO</label>
            {!! Form::text('COMPLEMENTO', null, ['class' => 'form-control', 'style' => 'text-transform: uppercase']) !!}
            @if ($errors->has('COMPLEMENTO'))
            <span class='text-danger'> {{ $errors->first('COMPLEMENTO') }} </span>
            @endif
        </div>
    </div>
    <div class='row m-t-20'>
        <div class='input-field col-md-3'>
            <label for='DEB_DTLANCAMENTO'>LANÇAMENTO</label>
            {!! Form::date('DEB_DTLANCAMENTO', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'yes']) !!}
            @if ($errors->has('DEB_DTLANCAMENTO'))
            <span class='text-danger'> {{ $errors->first('DEB_DTLANCAMENTO') }} </span>
            @endif
        </div>
        <div class='input-field col-md-3'>
            <label for='DEB_DTVENCIMENTO'>VENCIMENTO</label>
            {!! Form::date('DEB_DTVENCIMENTO', null, ['class' => 'form-control', 'required' => 'yes']) !!}
            @if ($errors->has('DEB_DTVENCIMENTO'))
            <span class='text-danger'> {{ $errors->first('DEB_DTVENCIMENTO') }} </span>
            @endif
        </div>
        <div class='input-field col-md-3'>
            <label for='DEB_DTPAGAMENTO'>PAGAMENTO</label>
            {!! Form::date('DEB_DTPAGAMENTO', null, ['class' => 'form-control']) !!}
            @if ($errors->has('DEB_DTPAGAMENTO'))
            <span class='text-danger'> {{ $errors->first('DEB_DTPAGAMENTO') }} </span>
            @endif
        </div>
        <div class='input-field col-md-3'>
            <label for='DEB_VALOR'>VALOR R$</label>
            {!! Form::text('DEB_VALOR', null, ['class' => 'form-control autonumber', 'required' => 'yes']) !!}
            @if ($errors->has('DEB_VALOR'))
            <span class='text-danger'> {{ $errors->first('DEB_VALOR') }} </span>
            @endif
        </div>
    </div>
    <div class='row'>
        <hr/>
        <button type='reset' class='btn btn-default waves-effect'>Resetar</button>
        <button type='submit' class='btn btn-primary waves-effect waves-light'>Salvar Dados</button>
    </div>
    {!! Form::close() !!}
</div>
</div>


@push('css')
@endpush

@push('js-topo')
@endpush

@push('js-footer')
@endpush

@endsection