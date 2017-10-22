@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/usuarios')}}'>Usuários</a></li>
    <li><a href='{{url("/restrito/$page")}}'>{{$titulo}}</a></li>
    <li class='active'>Gerencimento</li>
</ol>

<h3 class="section-title first-title">{{$titulo}}</h3>
<div class="content-box">
    <div class="content">

        {!! Form::open(['url' => "/restrito/$page/adicionar/$id", 'method' => 'POST', 'class' => 'form-horizontal',
        'enctype'=>'multipart/form-data', 'form-send'=> "restrito/$page/cadastrar" ]) !!}
        <div class='row'>
            <div class='input-field col-md-12'>
                <label>TIPO DE PERMISSÃO</label>
                <select name='permission_id' class="form-control" required>
                    @foreach($permissions as $permission)
                    <option value="{{$permission->id}}" >
                        {{$permission->name}} - {{$permission->label}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('permission_id'))
                <span class='text-danger'> {{ $errors->first('permission_id') }} </span>
                @endif
            </div>
        </div>
        <div class='row'>
            <hr/>
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