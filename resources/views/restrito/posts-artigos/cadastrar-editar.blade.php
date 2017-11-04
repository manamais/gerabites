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

        @if(isset($data->POST_CODIGO))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->POST_CODIGO", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            <div class='input-field col-md-4'>
                <label>SUBCATEGORIA</label>
                <select name='SUBCAT_CODIGO' class="form-control" required>
                    @foreach($subcategorias as $subcategoria)
                    <option
                        @if(isset($data->SUBCAT_CODIGO) && ($data->SUBCAT_CODIGO==$subcategoria->SUBCAT_CODIGO)) @php echo 'selected'; @endphp @endif
                        value="{{$subcategoria->SUBCAT_CODIGO}}" >
                        {{$subcategoria->CAT_TITULO}} - {{$subcategoria->SUBCAT_TITULO}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('POS_CODIGO'))
            <span class='text-danger'> {{ $errors->first('POS_CODIGO') }} </span>
            @endif
        </div>
        <div class='input-field col-md-4'>
            <label>CORRELATA</label>
            <select name='POST_CODIGO_CORRELATA' class="form-control" autocomplete="yes" >
                <option></option>
                @foreach($correlatas as $correlata)
                <option
                    @if(isset($data->POST_CODIGO_CORRELATA) && ($data->POST_CODIGO_CORRELATA==$correlata->POST_CODIGO)) @php echo 'selected'; @endphp @endif
                    value="{{$correlata->POST_CODIGO}}" >
                    {{$correlata->POST_TITULO}}
            </option>
            @endforeach
        </select>
        @if ($errors->has('POS_CODIGO'))
        <span class='text-danger'> {{ $errors->first('POS_CODIGO') }} </span>
        @endif
    </div>
    <div class='input-field col-md-4'>
        <label>RETRANCA</label>
        {!! Form::text('POST_RETRANCA', null, ['maxlength' => '60', 'class' => 'form-control']) !!}
        @if ($errors->has('POST_RETRANCA'))
        <span class='text-danger'> {{ $errors->first('POST_RETRANCA') }} </span>
        @endif
    </div>
</div>
<div class='row m-t-20'>
    <div class='input-field col-md-12'>
        <label>TITULO</label>
        {!! Form::text('POST_TITULO', null, ['required' => 'yes', 'maxlength' => '180', 'class' => 'form-control']) !!}
        @if ($errors->has('POST_TITULO'))
        <span class='text-danger'> {{ $errors->first('POST_TITULO') }} </span>
        @endif
    </div>
</div>
<div class='row m-t-20'>
    <div class='input-field col-md-12'>
        <label>SUBTITULO/DESCRIÇÃO</label>
        {!! Form::text('POST_SUBTITULO', null, ['required' => 'yes', 'maxlength' => '256', 'class' => 'form-control']) !!}
        @if ($errors->has('POST_SUBTITULO'))
        <span class='text-danger'> {{ $errors->first('POST_SUBTITULO') }} </span>
        @endif
    </div>
</div>
<div class='row m-t-20'>
    <div class='input-field col-md-5'>
        <label>IMAGEM (.jpg .png .gif .bmp)</label>
        {!! Form::file('POST_IMAGE', null, ['required' => 'yes', 'class' => 'form-control']) !!}
        @if ($errors->has('POST_IMAGE'))
        <span class='text-danger'> {{ $errors->first('POST_IMAGE') }} </span>
        @endif
    </div>
    <div class='input-field col-md-2'>
        <label>CRÉDITO</label>
        {!! Form::text('POST_IMAGE_CREDITO', null, ['maxlength' => '256', 'class' => 'form-control']) !!}
        @if ($errors->has('POST_IMAGE_CREDITO'))
        <span class='text-danger'> {{ $errors->first('POST_IMAGE_CREDITO') }} </span>
        @endif
    </div>
    <div class='input-field col-md-5'>
        <label>LEGENDA</label>
        {!! Form::text('POST_IMAGE_LEGENDA', null, ['maxlength' => '256', 'class' => 'form-control']) !!}
        @if ($errors->has('POST_IMAGE_LEGENDA'))
        <span class='text-danger'> {{ $errors->first('POST_IMAGE_LEGENDA') }} </span>
        @endif
    </div>
</div>
<div class='row m-t-20'>
    <div class='input-field col-md-10'>
        <label>TAGS(separe por vírgla</label>
        {!! Form::text('POST_TAGS', null, ['required' => 'yes', 'mailength' => '10', 'maxlength' => '250', 'class' => 'form-control']) !!}
        @if ($errors->has('POST_TAGS'))
        <span class='text-danger'> {{ $errors->first('POST_TAGS') }} </span>
        @endif
    </div>
    <div class='col-md-2'>
        <label>STATUS</label>
        {{ Form::select('POST_STATUS', [
                                'ATIVO' => 'ATIVO',
                                'STANDBY' => 'STANDBY',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
        }}
        @if ($errors->has('POST_STATUS'))
        <span class='color-danger'> {{ $errors->first('POST_STATUS') }} </span>
        @endif
    </div>
</div>
<div class='row m-t-20'>
    <div class='input-field col-md-12'>
        <label>URL (Youtube e Vimeo)
            <a data-toggle='tooltip' data-placement='right' title='' 
               data-original-title='Adicione somente o link da barra de endereço. É necessário adicionar o "http://" '>
                <i class='fa fa-exclamation-circle'></i>
            </a>
        </label>
        {!! Form::url('POST_VIDEO', null, ['required' => 'yes', 'maxlength' => '256', 'class' => 'form-control']) !!}
        @if ($errors->has('POST_VIDEO'))
        <span class='text-danger'> {{ $errors->first('POST_VIDEO') }} </span>
        @endif
    </div>
</div>
<div class='row m-t-20'>
    <div class='input-field col-md-12'>
        <label>TEXTO</label>
        {!! Form::textarea('POST_TEXTO', null, ['id'=>'summernote','class' => 'summernote form-control' ]) !!}
        @if ($errors->has('POST_TEXTO'))
        <span class='text-danger'> {{ $errors->first('POST_TEXTO') }} </span>
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