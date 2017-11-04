@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/empresa')}}'>Configurações</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>






<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">

        @if(isset($data->CB_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->CB_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            <div class='col-md-6'>
                <label>BANCO</label>
                {{ Form::select('CB_BANCO', [
                                'BANCO DO BRASIL' => 'BANCO DO BRASIL',
                                'BANCOOB(SICOOB)' => 'BANCOOB(SICOOB)',
                                'BANRISUL' => 'BANRISUL',
                                'BRADESCO' => 'BRADESCO',
                                'CAIXA ECONÔMICA' => 'CAIXA ECONÔMICA',
                                'HSBC' => 'HSBC',
                                'ITAÚ' => 'ITAÚ',
                                'SANTANDER' => 'SANTANDER',
                            ], null, ['id'=>'CB_BANCO','class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('CB_BANCO'))
                <span class='color-danger'> {{ $errors->first('CB_BANCO') }} </span>
                @endif
            </div>


            <div class='col-md-2'>
                <label>AGÊNCIA</label>
                {!! Form::number('CB_AGENCIA', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_AGENCIA'))
                <span class='color-danger'> {{ $errors->first('CB_AGENCIA') }} </span>
                @endif
            </div>
            <div class='col-md-1'>
                <label>DV</label>
                {!! Form::number('CB_AGENCIA_DV', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_AGENCIA_DV'))
                <span class='color-danger'> {{ $errors->first('CB_AGENCIA_DV') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label>Nº CONTA</label>
                {!! Form::number('CB_CONTA', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_CONTA'))
                <span class='color-danger'> {{ $errors->first('CB_CONTA') }} </span>
                @endif
            </div>
            <div class='col-md-1'>
                <label>DV</label>
                {!! Form::number('CB_CONTA_DV', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_CONTA_DV'))
                <span class='color-danger'> {{ $errors->first('CB_CONTA_DV') }} </span>
                @endif
            </div>
        </div>

        <div class='row m-t-20'>
            <div class='col-md-2'>
                <label class='text-warning'>CARTEIRA (BB*)</label>
                {!! Form::number('CB_CARTEIRA', null, ['class' => 'form-control']) !!}
                @if ($errors->has('CB_CARTEIRA'))
                <span class='color-danger'> {{ $errors->first('CB_CARTEIRA') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label class='text-warning'>VAR CART. (BB*)</label>
                {!! Form::number('CB_VARIACAOCARTEIRA', null, ['class' => 'form-control']) !!}
                @if ($errors->has('CB_VARIACAOCARTEIRA'))
                <span class='color-danger'> {{ $errors->first('CB_VARIACAOCARTEIRA') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label class='text-warning'>CONVÊNIO (BB*)</label>
                {!! Form::number('CB_CONVENIO', null, ['class' => 'form-control']) !!}
                @if ($errors->has('CB_CONVENIO'))
                <span class='color-danger'> {{ $errors->first('CB_CONVENIO') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label class='text-info'>CÓD CLI. (CEF*)</label>
                {!! Form::number('CB_CODIGOCLIENTE', null, ['class' => 'form-control']) !!}
                @if ($errors->has('CB_CODIGOCLIENTE'))
                <span class='color-danger'> {{ $errors->first('CB_CODIGOCLIENTE') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label>ACEITE</label>
                {!! Form::number('CB_ACEITE', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_ACEITE'))
                <span class='color-danger'> {{ $errors->first('CB_ACEITE') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label>ESPÉCIE DOC.</label>
                {{ Form::select('CB_ESPECIEDOC', [
                                'DM' => 'DM',
                                'NP' => 'NP',
                                'NS' => 'NS',
                                'REC' => 'REC',
                                'LC' => 'LC',
                                'W' => 'W',
                                'CH' => 'CH',
                                'DS' => 'DS',
                                'ND' => 'ND',
                            ], null, ['id'=>'CB_ESPECIEDOC','class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('CB_ESPECIEDOC'))
                <span class='color-danger'> {{ $errors->first('CB_ESPECIEDOC') }} </span>
                @endif
            </div>
        </div>

        <div class='row m-t-20'>
            <div class='col-md-4'>
                <label>*MENSAGEM 1</label>
                {!! Form::text('CB_MENSAGEM1', null, ['required' => 'yes', 'maxlength'=>'200', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_MENSAGEM1'))
                <span class='color-danger'> {{ $errors->first('CB_MENSAGEM1') }} </span>
                @endif
            </div>
            <div class='col-md-4'>
                <label>MENSAGEM 2</label>
                {!! Form::text('CB_MENSAGEM2', null, ['maxlength'=>'200', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_MENSAGEM2'))
                <span class='color-danger'> {{ $errors->first('CB_MENSAGEM2') }} </span>
                @endif
            </div>
            <div class='col-md-4'>
                <label>MENSAGEM 3</label>
                {!! Form::text('CB_MENSAGEM3', null, ['maxlength'=>'200', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_MENSAGEM3'))
                <span class='color-danger'> {{ $errors->first('CB_MENSAGEM3') }} </span>
                @endif
            </div>
        </div>

        <div class='row m-t-20'>
            <div class='col-md-4'>
                <label>*INSTRUÇÃO 1</label>
                {!! Form::text('CB_INSTRUCAO1', null, ['required' => 'yes', 'maxlength'=>'200', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_INSTRUCAO1'))
                <span class='color-danger'> {{ $errors->first('CB_INSTRUCAO1') }} </span>
                @endif
            </div>
            <div class='col-md-4'>
                <label>INSTRUÇÃO 2</label>
                {!! Form::text('CB_INSTRUCAO2', null, ['maxlength'=>'200', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_INSTRUCAO2'))
                <span class='color-danger'> {{ $errors->first('CB_INSTRUCAO2') }} </span>
                @endif
            </div>
            <div class='col-md-4'>
                <label>INSTRUÇÃO 3</label>
                {!! Form::text('CB_INSTRUCAO3', null, ['maxlength'=>'200', 'class' => 'form-control']) !!}
                @if ($errors->has('CB_INSTRUCAO3'))
                <span class='color-danger'> {{ $errors->first('CB_INSTRUCAO3') }} </span>
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
<script src="{{url('assets/restrito/js/input-mask.min.js')}}"></script>
@endpush

@endsection