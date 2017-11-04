@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/projetos')}}'>projetos</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">
        @if(isset($data->TAR_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/projetos/$codProjeto/tarefas/editar/$data->TAR_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/projetos/$codProjeto/tarefas/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data']) !!}
        @endif

        <div class='row'>
            <div class='input-field col-md-3'>
                <label>ETAPA/FASE</label>
                <select name='ETA_CODIGO' class="form-control" required>
                    @foreach($etapas as $etapa)
                    <option
                        @if(isset($data->ETA_CODIGO) && ($data->ETA_CODIGO==$etapa->ETA_CODIGO)) @php echo 'selected'; @endphp @endif
                        value="{{$etapa->ETA_CODIGO}}" >
                        {{$etapa->ETA_NOME}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('PROD_CODIGO'))
                <span class='text-danger'> {{ $errors->first('PROD_CODIGO') }} </span>
                @endif
        </div>
        <div class='input-field col-md-5'>
            <label>TAREFA/PRODUTO</label>
            <select name='PROD_CODIGO' class="form-control" required>
                @foreach($produtos as $produto)
                <option
                    @if(isset($data->PROD_CODIGO) && ($data->PROD_CODIGO==$produto->PROD_CODIGO)) @php echo 'selected'; @endphp @endif
                    value="{{$produto->PROD_CODIGO}}" >
                    {{$produto->PROD_NOME}}
            </option>
            @endforeach
        </select>
        @if ($errors->has('PROD_CODIGO'))
        <span class='text-danger'> {{ $errors->first('PROD_CODIGO') }} </span>
        @endif
    </div>
    <div class='input-field col-md-4'>
        <label>RESPONSÁVEL PELA TAREFA</label>
        <select name='user_id' class="form-control" required>
            @foreach($users as $user)
            <option
                @if(isset($data->user_id) && ($data->user_id==$user->id)) @php echo 'selected'; @endphp @endif
                value="{{$user->id}}" >
                {{$user->name}}
        </option>
        @endforeach
    </select>
    @if ($errors->has('user_id'))
    <span class='text-danger'> {{ $errors->first('user_id') }} </span>
    @endif
</div>

</div>
<div class='row m-t-20'>
    <div class='input-field col-md-9'>
        <label>COMPLEMENTO DA TAREFA</label>
        {!! Form::text('TAR_DESCRICAO', null, ['required' => 'yes', 'maxlength' => '255', 'class' => 'form-control']) !!}
        @if ($errors->has('TAR_DESCRICAO'))
        <span class='text-danger'> {{ $errors->first('TAR_DESCRICAO') }} </span>
        @endif
    </div>
    <div class='col-md-3'>
        <label>DT. INÍCIO</label>
        <input name="TAR_DTINICIO" type="datetime-local" class="form-control"
               value="{{$data->TAR_DTINICIO or old('TAR_DTINICIO')}}"/>
        @if ($errors->has('TAR_DTINICIO'))
        <span class='text-danger'> {{ $errors->first('TAR_DTINICIO') }} </span>
        @endif
    </div>

</div>
<div class='row m-t-20'>
    <div class='col-md-3'>
        <label>(ESTIMATIVA)</label>
        <input name="TAR_DTPRAZOESTIMADO" type="datetime-local" class="form-control"
               value="{{$data->TAR_DTPRAZOESTIMADO or old('TAR_DTPRAZOESTIMADO')}}"/>
        @if ($errors->has('TAR_DTPRAZOESTIMADO'))
        <span class='text-danger'> {{ $errors->first('TAR_DTPRAZOESTIMADO') }} </span>
        @endif
    </div>
    <div class='col-md-3'>
        <label>ENCERRAMENTO</label>
        <input name="TAR_DTFINAL" type="datetime-local" class="form-control"
               value="{{$data->TAR_DTFINAL or old('TAR_DTFINAL')}}"/>
        @if ($errors->has('TAR_DTFINAL'))
        <span class='text-danger'> {{ $errors->first('TAR_DTFINAL') }} </span>
        @endif
    </div>
    <div class='input-field col-md-6'>
        <label>ARQUIVO (.jpg .png .gif .pdf)</label>
        {!! Form::file('TAR_ARQUIVO', null, ['class' => 'form-control']) !!}
        @if ($errors->has('TAR_ARQUIVO'))
        <span class='text-danger'> {{ $errors->first('TAR_ARQUIVO') }} </span>
        @endif
    </div>
</div>
<div class='row m-t-20'>
    <div class='input-field col-md-3'>
        <label>PROGRESSO</label>
        {!! Form::number('TAR_PROGRESSO', null, ['required' => 'yes', 'class' => 'form-control']) !!}
        @if ($errors->has('TAR_PROGRESSO'))
        <span class='text-danger'> {{ $errors->first('TAR_PROGRESSO') }} </span>
        @endif
    </div>
    <div class='input-field col-md-2'>
        <label>VISÍVEL</label>
        {{ Form::select('TAR_VISIVELAOCLIENTE', [
                                'SIM' => 'SIM',
                                'NAO' => 'NAO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
        }}
        @if ($errors->has('TAR_VISIVELAOCLIENTE'))
        <span class='text-danger'> {{ $errors->first('TAR_VISIVELAOCLIENTE') }} </span>
        @endif
    </div>
    <div class='input-field col-md-2'>
        <label>VL. APROVADO?</label>
        {{ Form::select('TAR_APVCLIENTE_VALOR', [
                                'NAO' => 'NAO',
                                'SIM' => 'SIM',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
        }}
        @if ($errors->has('TAR_APVCLIENTE_VALOR'))
        <span class='text-danger'> {{ $errors->first('TAR_APVCLIENTE_VALOR') }} </span>
        @endif
    </div>
    <div class='input-field col-md-2'>
        <label>TAREF. APROVADA?</label>
        {{ Form::select('TAR_APVCLIENTE_TAREFA', [
                                'NAO' => 'NAO',
                                'SIM' => 'SIM',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
        }}
        @if ($errors->has('TAR_APVCLIENTE_TAREFA'))
        <span class='text-danger'> {{ $errors->first('TAR_APVCLIENTE_TAREFA') }} </span>
        @endif
    </div>
    <div class='input-field col-md-3'>
        <label>STATUS</label>
        {{ Form::select('TAR_STATUS', [
                                'EM-EXECUCAO' => 'EM-EXECUCAO',
                                'COMPLETO' => 'COMPLETO',
                                'CANCELADO' => 'CANCELADO',
                                'STANDBY' => 'STANDBY',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
        }}
        @if ($errors->has('TAR_STATUS'))
        <span class='text-danger'> {{ $errors->first('TAR_STATUS') }} </span>
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
<link rel='stylesheet' href='{{url('assets/restrito/bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}'/>
<link rel='stylesheet' href='{{url('assets/restrito/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}'/>
@endpush

@push('js-topo')
@endpush

@push('js-footer')

<script src="{{url('assets/restrito/js/input-mask.min.js')}}"></script>
<script src="{{url('assets/restrito/bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
<script src="{{url('assets/restrito/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('assets/restrito/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{url('assets/restrito/js/farbtastic.js')}}"></script>

<script>
$(".data-select").datetimepicker({
    icons: {
        time: "zmdi zmdi-time",
        date: 'zmdi zmdi-calendar',
        up: "zmdi zmdi-chevron-up",
        down: "zmdi zmdi-chevron-down",
        previous: "zmdi zmdi-chevron-left",
        next: "zmdi zmdi-chevron-right"
    },
    defaultDate: "<?php date('d-m-Y') ?>",
    disabledDates: [
        moment("<?php date('d-m-Y') ?>"),
        moment("<?php date('d-m-Y') ?>")
    ]
});
</script>
@endpush

@endsection