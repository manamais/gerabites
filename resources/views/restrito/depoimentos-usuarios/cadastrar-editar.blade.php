@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/depoimentos')}}'>Configurações</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">

        @if(isset($data->DEP_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->DEP_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif
        <div class='row'>
            <div class='input-field col-md-12'>
                <label>DEPOIMENTO</label>
                {!! Form::textarea('DEP_TEXTO', null, ['id'=>'summernote','class' => 'summernote form-control' ]) !!}
                @if ($errors->has('DEP_TEXTO'))
                <span class='text-danger'> {{ $errors->first('DEP_TEXTO') }} </span>
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
<script>
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        height: 250,
        plugins: [
            "image lists charmap hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen media nonbreaking",
            "table contextmenu directionality paste"
        ],
        toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | table  media fullpage | forecolor",
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    });
</script>
@endpush

@endsection
