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
        @if(isset($data->BAN_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->BAN_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            <div class='input-field col-md-3'>
                <label>IDENTIFICAÇÃO</label>
                {!! Form::text('BAN_NOME', null, ['required' => 'yes', 'maxlength' => '90', 'class' => 'form-control']) !!}
                @if ($errors->has('BAN_NOME'))
                <span class='text-danger'> {{ $errors->first('BAN_NOME') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label>POSIÇÃO</label>
                {{ Form::select('BAN_POSICAO', [
                                'TOPO' => 'TOPO',
                                'LATERAL' => 'LATERAL',
                                'RODAPE' => 'RODAPE',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('BAN_POSICAO'))
                <span class='color-danger'> {{ $errors->first('BAN_POSICAO') }} </span>
                @endif
            </div>
       


            <div class='input-field col-md-6'>
                <label>LINK
                    <a data-toggle='tooltip' data-placement='right' title=''
                       data-original-title='Endereço de encaminhamento ao clicar no anúncio. Por padrão, todos serão abertos em uma nova janela.'>
                        <i class='fa fa-exclamation-circle'></i>
                    </a>
                </label>
                {!! Form::url('BAN_URL', null, ['required' => 'yes', 'maxlength' => '255', 'class' => 'form-control']) !!}
                @if ($errors->has('BAN_URL'))
                <span class='text-danger'> {{ $errors->first('BAN_URL') }} </span>
                @endif
            </div>

            <div class='input-field col-md-1'>
                <label class='text-danger'>ORDEM</label>
                {!! Form::number('BAN_ORDEM', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('BAN_ORDEM'))
                <span class='text-danger'> {{ $errors->first('BAN_ORDEM') }} </span>
                @endif
            </div>



        </div>

        <div class='row m-t-20'>
            <div class='input-field col-md-4'>
                <label>UPLOAD IMAGEM (.jpg .png .gif .bmp)
                    <a data-toggle='tooltip' data-placement='right' title=''
                       data-original-title='Quando o anúncio for um embed ou uma imagem externa não haverá a necessidade de upload de imagem.'>
                        <i class='fa fa-exclamation-circle'></i>
                    </a>
                </label>
                {!! Form::file('BAN_IMAGEM', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('BAN_IMAGEM'))
                <span class='text-danger'> {{ $errors->first('BAN_IMAGEM') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label>LINK IMAGEM
                    <a data-toggle='tooltip' data-placement='right' title=''
                       data-original-title='Adicione o endereço da imagem completo com o http.'>
                        <i class='fa fa-exclamation-circle'></i>
                    </a>
                </label>
                {!! Form::text('BAN_IMAGEMEXTERNA', null, ['class' => 'form-control']) !!}
                @if ($errors->has('BAN_IMAGEMEXTERNA'))
                <span class='text-danger'> {{ $errors->first('BAN_IMAGEMEXTERNA') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label>AdWords e Scripts)
                    <a data-toggle='tooltip' data-placement='right' title=''
                       data-original-title='Atenção! Insira somente scripts de fontes confiáveis. Essa opção pode deixar seu site vunerável a ataques.'>
                        <i class='fa fa-exclamation-circle'></i>
                    </a>
                </label>
                {!! Form::text('BAN_EMBED', null, ['class' => 'form-control']) !!}
                @if ($errors->has('BAN_EMBED'))
                <span class='text-danger'> {{ $errors->first('BAN_EMBED') }} </span>
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