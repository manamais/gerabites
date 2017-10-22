@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/posts')}}'>Postagens</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            @if(isset($data->ANU_CODIGO))
            {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->ANU_CODIGO", 'method' => 'POST',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
            @else
            {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
            @endif

            <div class='row'>
                <div class='input-field col-md-5'>
                    <label>NOME</label>
                    {!! Form::text('ANU_NOME', null, ['required' => 'yes', 'maxlength' => '90', 'class' => 'form-control']) !!}
                    @if ($errors->has('ANU_NOME'))
                    <span class='text-danger'> {{ $errors->first('ANU_NOME') }} </span>
                    @endif
                </div>
                <div class='input-field col-md-7'>
                    <label>LOCALIZAÇÃO</label>
                    <select name='POS_CODIGO' class="form-control" required>
                        @foreach($posicoes as $posicao)
                        <option
                            @if(isset($data->POS_CODIGO) && ($data->POS_CODIGO==$posicao->POS_CODIGO)) @php echo 'selected'; @endphp @endif
                            value="{{$posicao->POS_CODIGO}}" >
                            {{$posicao->POS_TAMANHO}} - {{$posicao->POS_DESCRICAO}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('POS_CODIGO'))
                <span class='text-danger'> {{ $errors->first('POS_CODIGO') }} </span>
                @else
                <a href='{{url("/restrito/posicoes-anuncios")}}' class='btn btn-sm btn-primary pull-left'>
                    <i class='fa fa-exclamation-circle'></i> Clique para ver a localização do anúncio em imagem
                </a>
                @endif
            </div>
        </div>
        <div class='row manager'>
            <div class='input-field col-md-5'>
                <label>LINK
                    <a data-toggle='tooltip' data-placement='right' title='' 
                       data-original-title='Endereço de encaminhamento ao clicar no anúncio. Por padrão, todos serão abertos em uma nova janela.'>
                        <i class='fa fa-exclamation-circle'></i>
                    </a>
                </label>
                {!! Form::text('ANU_URL', null, ['required' => 'yes', 'maxlength' => '255', 'class' => 'form-control']) !!}
                @if ($errors->has('ANU_URL'))
                <span class='text-danger'> {{ $errors->first('ANU_URL') }} </span>
                @endif
            </div>
            <div class='col-md-1'>
                <label class='text-danger'>ROTATIVO?</label>
                {{ Form::select('ANU_ROTATIVO', [
                                'N' => 'NÃO',
                                'S' => 'SIM',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('ANU_ROTATIVO'))
                <span class='color-danger'> {{ $errors->first('ANU_ROTATIVO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-1'>
                <label class='text-danger'>ORDEM</label>
                {!! Form::number('ANU_ORDEM', null, ['class' => 'form-control']) !!}
                @if ($errors->has('ANU_ORDEM'))
                <span class='text-danger'> {{ $errors->first('ANU_ORDEM') }} </span>
                @endif
            </div>
            <div class='input-field col-md-1'>
                <label class='text-danger'>CENAS</label>
                {{ Form::select('ANU_NUMEROCENAS', [
                                '' => '',
                                '75' => '75%',
                                '50' => '50%',
                                '25' => '25%',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('ANU_NUMEROCENAS'))
                <span class='text-danger'> {{ $errors->first('ANU_NUMEROCENAS') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>INÍCIO</label>
                {!! Form::date('ANU_DTINICIO', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('ANU_DTINICIO'))
                <span class='text-danger'> {{ $errors->first('ANU_DTINICIO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>TÉRMINO</label>
                {!! Form::date('ANU_DTTERMINO', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('ANU_DTTERMINO'))
                <span class='text-danger'> {{ $errors->first('ANU_DTTERMINO') }} </span>
                @endif
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12'>
                <p class='text-danger'>
                    Os campos "Ordem e Cenas" só devem ser preenchidos em caso a opção Rotativo seja "SIM". 
                </p>
            </div>

        </div>
        <div class='row manager'>
            <div class='input-field col-md-4'>
                <label for='ANU_IMAGEM'>IMAGEM (.jpg .png .gif .bmp)
                    <a data-toggle='tooltip' data-placement='right' title='' 
                       data-original-title='Quando o anúncio for um embed, não haverá a necessidade de upload de imagem.'>
                        <i class='fa fa-exclamation-circle'></i>
                    </a>
                </label>
                {!! Form::file('ANU_IMAGEM', null, ['required' => 'yes', 'class' => 'form-control']) !!}
                @if ($errors->has('ANU_IMAGEM'))
                <span class='text-danger'> {{ $errors->first('ANU_IMAGEM') }} </span>
                @endif
            </div>
            <div class='input-field col-md-8'>
                <label>AdWords e Scripts)
                    <a data-toggle='tooltip' data-placement='right' title='' 
                       data-original-title='Atenção! Insira somente scripts de fontes confiáveis. Essa opção pode deixar seu site vunerável a ataques.'>
                        <i class='fa fa-exclamation-circle'></i>
                    </a>
                </label>
                {!! Form::text('ANU_EMBED', null, ['class' => 'form-control']) !!}
                @if ($errors->has('ANU_EMBED'))
                <span class='text-danger'> {{ $errors->first('ANU_EMBED') }} </span>
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