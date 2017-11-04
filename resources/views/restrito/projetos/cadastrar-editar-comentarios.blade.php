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
        @if(isset($data->COM_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/projetos/$codProjeto/comentarios/editar/$data->COM_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/projetos/$codProjeto/comentarios/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data']) !!}
        @endif
        <div class='row'>
            <div class='input-field col-md-10'>
                <label>COMENTÁRIO</label>
                {!! Form::textarea('COM_TEXTO', null, ['required' => 'yes', 'maxlength' => '600', 'class' => 'form-control', 'rows'=>'4']) !!}
                @if ($errors->has('COM_TEXTO'))
                <span class='text-danger'> {{ $errors->first('COM_TEXTO') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>VISÍVEL AO CLIENTE</label>
                {{ Form::select('COM_VISIVELAOCLIENTE', [
                                'SIM' => 'SIM',
                                'NAO' => 'NAO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('COM_VISIVELAOCLIENTE'))
                <span class='text-danger'> {{ $errors->first('COM_VISIVELAOCLIENTE') }} </span>
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