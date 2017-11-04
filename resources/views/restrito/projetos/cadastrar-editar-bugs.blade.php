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
        @if(isset($data->BUGS_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/projetos/$codProjeto/bugs/editar/$data->BUGS_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/projetos/$codProjeto/bugs/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data']) !!}
        @endif
        <div class='row'>
            <div class='input-field col-md-9'>
                <label>TÍTULO DO ERRO</label>
                {!! Form::text('BUGS_NOME', null, ['required' => 'yes', 'maxlength' => '60', 'class' => 'form-control']) !!}
                @if ($errors->has('BUGS_NOME'))
                <span class='text-danger'> {{ $errors->first('BUGS_NOME') }} </span>
                @endif
            </div>
            <div class='input-field col-md-3'>
                <label>PRIORIDADE</label>
                {{ Form::select('BUGS_GRAVIDADE', [
                                'Baixa' => 'Baixa',
                                'Média' => 'Média',
                                'Alta' => 'Alta',
                                'Urgente' => 'Urgente',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('BUGS_GRAVIDADE'))
                <span class='text-danger'> {{ $errors->first('BUGS_GRAVIDADE') }} </span>
                @endif
            </div>
        </div>

        <div class='row m-t-20'>
            <div class='input-field col-md-12'>
                <label>DESCRIÇÃO DO ERRO</label>
                {!! Form::textarea('BUGS_DESCRICAO', null, ['required' => 'yes', 'maxlength' => '600', 'class' => 'form-control', 'rows'=>'4']) !!}
                @if ($errors->has('BUGS_DESCRICAO'))
                <span class='text-danger'> {{ $errors->first('BUGS_DESCRICAO') }} </span>
                @endif
            </div>
        </div>

        @can('COMPANY')
        <div class='row m-t-20'>
            <div class='input-field col-md-9'>
                <label>RELATAR A:</label>
                <select name='user_id' class='form-control' autocomplete='yes' >
                    @foreach($users as $user)
                    <option @if(isset($data->user_id) && ($data->user_id==$user->id)) @php echo 'selected'; @endphp @endif value="{{$user->id}}" >{{$user->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                <span class='text-danger'> {{ $errors->first('user_id') }} </span>
                @endif
            </div>
            
            <div class='input-field col-md-3'>
                <label>STATUS</label>
                {{ Form::select('BUGS_STATUS', [
                                'Aberto' => 'Aberto',
                                'Em Análise' => 'Em Análise',
                                'Em Produção' => 'Em Produção',
                                'Resolvido' => 'Resolvido',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('BUGS_STATUS'))
                <span class='text-danger'> {{ $errors->first('BUGS_STATUS') }} </span>
                @endif
            </div>
        </div>
        @endcan

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