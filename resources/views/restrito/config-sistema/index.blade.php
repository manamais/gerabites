@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/empresa')}}'>Configurações</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class='section-title first-title'>
    {{$titulo}}
</h3>

<div class='row'>
    <div class='col-lg-12'>
        <div class='data-info'>

            @foreach($data as $registro)
            <table class='display datatable'>
                <tr>
                    <td class='p-10'><strong>NOME DO SITE</strong> <br/> {{$registro->CONFIG_NOMESITE}}</td>
                    <td class='p-10'><strong>METADESCRIPTION</strong> <br/> {{$registro->CONFIG_METADESCRIPTION}}</td>
                    <td class='p-10'><strong>METATITLE</strong> <br/> {{$registro->CONFIG_METATITLE}}</td>
                </tr>
            </table>
            <table class='display datatable'>
                <tr>
                    <td class='p-10'><strong>KEYWORDS</strong> <br/> {{$registro->CONFIG_METAKEYWORDS}}</td>
                    <td class='p-10'><strong>URL TERMO DE USO</strong> <br/> {{$registro->CONFIG_URLTERMODEUSO}}</td>
                </tr>
            </table>
            <table class='display datatable'>
                <tr>
                    <td class='p-10'>
                        <strong>LOGO TOPO</strong> <br/> 
                        @if($registro->CONFIG_LOGOTOPO!=null)
                        <img src='{{url('/assets/img/$registro->CONFIG_LOGOTOPO')}}' class='img-responsive'  />
                        @endif
                    </td>
                    <td class='p-10'>
                        <strong>LOGO RODAPÉ</strong> <br/> 
                        @if($registro->CONFIG_LOGORODAPE!=null)
                        <img src='{{url('/assets/img/$registro->CONFIG_LOGORODAPE')}}' class='img-responsive'  />
                        @endif
                    </td>
                    <td class='p-10'>
                        <strong>FAVICON</strong> <br/> 
                        @if($registro->CONFIG_FAVICON!=null)
                        <img src='{{url('/assets/img/$registro->CONFIG_FAVICON')}}' />
                        @endif
                    </td>
                </tr>
            </table>
            <table class='display datatable'>
                <tr>
                    <td class='p-10'>
                        <strong>CÓD GOOGLE</strong> <br/>
                        {{$registro->CONFIG_CODGOOGLE}}
                    </td>
                </tr>
            </table>
            <table class='display datatable'>
                <tr>
                    <td class='p-10'>
                        <strong>CHAVE BEMFUNCIONAL</strong> <br/>
                        {{$registro->CONFIG_EJORNAL_API}}
                    </td>
                </tr>
            </table>
            @endforeach
        </div>
    </div>
</div>
<a href='{{url("/restrito/$page/editar/$registro->CONFIG_CODIGO")}}' class='label label-success'>
    <i class='fa fa-pencil'></i> Edit
</a>

@push('css')
@endpush

@push('js-topo')
@endpush

@push('js-footer')
@endpush

@endsection