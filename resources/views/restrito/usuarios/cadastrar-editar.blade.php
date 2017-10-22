@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/usuarios')}}'>Usuários</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>

<div class="content-box">
    <div class="content">

        @if(isset($data->id))
        {!! Form::model($data, ['url' => "/restrito/$page/editar/$data->id", 'method' => 'POST',
        'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
        @else
        {!! Form::open(['url' => "/restrito/$page/cadastrar", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        @endif

        <div class='row'>
            <div class='col-md-2'>
                <label>TIPO</label>
                {{ Form::select('tipo', [
                                'CLI' => 'CLIENTE',
                                'COL' => 'COLABORADOR',
                                'FUN' => 'FUNCIONÁRIO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('tipo'))
                <span class='color-danger'> {{ $errors->first('tipo') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label for='name'>NOME</label>
                {!! Form::text('name', null, ['required' => 'yes', 'min' => '5', 'maxlength' => '120', 'class' => 'form-control']) !!}
                @if ($errors->has('name'))
                <span class='text-danger'> {{ $errors->first('name') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label for='name'>MATRICULA</label>
                {!! Form::text('matricula', null, ['maxlength' => '20', 'class' => 'form-control']) !!}
                @if ($errors->has('matricula'))
                <span class='text-danger'> {{ $errors->first('matricula') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label>SEXO</label>
                {{ Form::select('genero', [
                                'M' => 'MASC',
                                'F' => 'FEM',
                                'T' => 'TRANS',
                            ], null, ['id'=>'genero','class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('genero'))
                <span class='color-danger'> {{ $errors->first('genero') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label for='dtnascimento'>DT. NASC</label>
                {!! Form::date('dtnascimento', null, ['class' => 'form-control']) !!}
                @if ($errors->has('dtnascimento'))
                <span class='text-danger'> {{ $errors->first('dtnascimento') }} </span>
                @endif
            </div>
        </div>
        <div class='row manager m-t-20'>
            <div class='input-field col-md-3'>
                <label for='cpf'>CPF</label>
                {!! Form::text('cpf', null, ['data-mask' => '999.999.999-99', 'maxlength' => '14', 'class' => 'form-control']) !!}
                @if ($errors->has('cpf'))
                <span class='text-danger'> {{ $errors->first('cpf') }} </span>
                @endif
            </div>
            <div class='input-field col-md-3'>
                <label for='rg'>RG</label>
                {!! Form::text('rg', null, ['maxlength' => '20', 'class' => 'form-control']) !!}
                @if ($errors->has('rg'))
                <span class='text-danger'> {{ $errors->first('rg') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label for='phone'>FONE</label>
                {!! Form::text('phone', null, ['data-mask' => '(99)9999-9999', 'class' => 'form-control']) !!}
                @if ($errors->has('phone'))
                <span class='text-danger'> {{ $errors->first('phone') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label for='phone'>CELULAR</label>
                {!! Form::text('cellphone', null, ['data-mask' => '(99)99999-9999', 'class' => 'form-control']) !!}
                @if ($errors->has('cellphone'))
                <span class='text-danger'> {{ $errors->first('cellphone') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label for='phone'>CELULAR</label>
                {!! Form::text('cellphone2', null, ['data-mask' => '(99)99999-9999', 'class' => 'form-control']) !!}
                @if ($errors->has('cellphone2'))
                <span class='text-danger'> {{ $errors->first('cellphone2') }} </span>
                @endif
            </div>
        </div>

        <div class='row manager m-t-20'>
            <div class='input-field col-md-4'>
                <label>EMAIL</label>
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @if ($errors->has('email'))
                <span class='text-danger'> {{ $errors->first('email') }} </span>
                @endif
            </div>
            <div class='input-field col-md-2'>
                <label>SENHA</label>
                {!! Form::password('password', null, ['class' => 'form-control']) !!}
                @if ($errors->has('password'))
                <span class='text-danger'> {{ $errors->first('password') }} </span>
                @endif
            </div>
            <div class='input-field col-md-4'>
                <label>FOTO (.jpg .png .gif .bmp)</label>
                {!! Form::file('foto', null, ['class' => 'form-control']) !!}
                @if ($errors->has('foto'))
                <span class='text-danger'> {{ $errors->first('foto') }} </span>
                @endif
            </div>
            <div class='col-md-2'>
                <label>STATUS</label>
                {{ Form::select('status', [
                                'ATIVO' => 'ATIVO',
                                'INATIVO' => 'INATIVO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
                }}
                @if ($errors->has('status'))
                <span class='color-danger'> {{ $errors->first('status') }} </span>
                @endif
            </div>
        </div>


        <div class='row manager m-t-20'>

            <div class='input-field col-md-3'>
                <label>EMPRESA</label>
                <select name='EMPR_CODIGO' class="form-control" required>
                    @foreach($empresas as $empresa)
                    <option
                        @if(isset($data->EMPR_CODIGO) && ($data->EMPR_CODIGO==$empresa->EMPR_CODIGO)) @php echo 'selected'; @endphp @endif
                        value="{{$empresa->EMPR_CODIGO}}" >
                        {{$empresa->EMPR_NOMEFANTASIA}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('EMPR_CODIGO'))
            <span class='text-danger'> {{ $errors->first('EMPR_CODIGO') }} </span>
            @endif
        </div>


        <div class='input-field col-md-3'>
            <label>CARGO</label>
            {!! Form::text('cargo', null, ['required' => 'yes','class' => 'form-control']) !!}
            @if ($errors->has('cargo'))
            <span class='text-danger'> {{ $errors->first('cargo') }} </span>
            @endif
        </div>

        <div class='input-field col-md-4'>
            <label>DESCRICAO FUNCIONÁRIO</label>
            {!! Form::text('descricao', null, ['required' => 'yes','class' => 'form-control']) !!}
            @if ($errors->has('descricao'))
            <span class='text-danger'> {{ $errors->first('descricao') }} </span>
            @endif
        </div>





        <div class='col-md-2'>
            <label>PERFIL NO SITE</label>
            {{ Form::select('exibirnosite', [
                                'SIM' => 'SIM',
                                'NÃO' => 'NÃO',
                            ], null, ['class' => 'form-control', 'required' => 'yes'])
            }}
            @if ($errors->has('exibirnosite'))
            <span class='color-danger'> {{ $errors->first('exibirnosite') }} </span>
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