@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/empresa')}}'>Configurações</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>
<div class='row m-t-30'>

    <div class='widget widget-green'>

        <div class='widget-content'>
            @if(isset($data->MS_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->MS_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif

            <div class='row'>
                <div class='input-field col-md-2'>
                    <label for='MS_NOME'>NOME</label>
                    {{ Form::select('MS_NOME', [
                                'facebook' => 'facebook',
                                'twitter' => 'twitter',
                                'google' => 'google',
                                'linkedin' => 'linkedin',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                    }}
                    @if ($errors->has('MS_NOME'))
                    <span class='text-danger'> {{ $errors->first('MS_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-4'>
                    <label for='MS_URL'>URL</label>
                    {!! Form::url('MS_URL', null, ['required' => 'yes', 'maxlength' => '255', 'class' => 'form-control']) !!}
                    @if ($errors->has('MS_URL'))
                    <span class='text-danger'> {{ $errors->first('MS_URL') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-4'>
                    <label for='MS_APP_ID'>ID (APP)</label>
                    {!! Form::text('MS_APP_ID', null, ['maxlength' => '255', 'class' => 'form-control']) !!}
                    @if ($errors->has('MS_APP_ID'))
                    <span class='text-danger'> {{ $errors->first('MS_APP_ID') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-2'>
                    <label for='MS_APP_PASSW'>PASSWORD</label>
                    {!! Form::password('MS_APP_PASSW', ['class' => 'form-control']) !!}
                    @if ($errors->has('MS_APP_PASSW'))
                    <span class='text-danger'> {{ $errors->first('MS_APP_PASSW') }} </span>
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
@endpush

@endsection