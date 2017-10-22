@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/posts')}}'>Postagens</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
    <a href='{{url("/restrito/$page/cadastrar")}}' class='btn btn-sm btn-primary pull-right'>Novo Registro</a>
</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            <div class='table-responsive'>
                <table class='table table-hover datatable'>
                    <thead>
                        <tr>
                            <th width='250px'>VIDEO</th>
                            <th>TITULO</th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th class='hidden'></th>
                            <th width='120px'>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $registro)
                        <tr>
                            <td>
                                @php
                                $url = $registro->VID_URL;

                                $whitelist = ['YouTube', 'Vimeo', 'Facebook'];
                                $params = [
                                'autoplay' => 0,
                                'loop' => 0
                                ];
                                $attributes = [
                                'type' => null,
                                'class' => 'iframe-class',
                                'data-html5-parameter' => true
                                ];



                                echo LaravelVideoEmbed::parse($url, $whitelist, $params, $attributes);



                                @endphp

                                <br/>



                            </td>
                            <td>{{$registro->VID_TITULO}}</td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td class='hidden'></td>
                            <td>
                                <a href='#' class='label label-danger m-r-5'
                                   onclick="deletar('{{url("/restrito/$page/deletar/$registro->VID_CODIGO")}}')" id='urlDeletar' >
                                    <i class='fa fa-trash-o'></i> Del
                                </a>

                                <a href='{{url("/restrito/$page/editar/$registro->VID_CODIGO")}}' class='label label-success'>
                                    <i class='fa fa-pencil'></i> Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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