@extends('layouts.restrito')
@section('content')
<ol class='breadcrumb'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/empresa')}}'>Configurações</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class="section-title first-title">
    {{$titulo}}
</h3>
<div class='row m-t-30'>
    <div class='widget widget-green'>
        <div class='widget-content'>
            <div class='table-responsive'>
                @foreach($data as $registro)
                <table class='table table-hover'>
                    <tr>
                        <td><strong>NOME DO SITE</strong> <br/> {{$registro->CONFIG_NOMESITE}}</td>
                        <td><strong>METADESCRIPTION</strong> <br/> {{$registro->CONFIG_METADESCRIPTION}}</td>
                        <td><strong>METATITLE</strong> <br/> {{$registro->CONFIG_METATITLE}}</td>
                    </tr>
                </table>
                <table class='table table-hover'>
                    <tr>
                        <td><strong>KEYWORDS</strong> <br/> {{$registro->CONFIG_METAKEYWORDS}}</td>
                        <td><strong>URL TERMO DE USO</strong> <br/> {{$registro->CONFIG_URLTERMODEUSO}}</td>
                    </tr>
                </table>
                <table class='table table-hover'>
                    <tr>
                        <td>
                            <strong>LOGO TOPO</strong> <br/> 
                            @if($registro->CONFIG_LOGOTOPO!=null)
                            <img src='{{url("/assets/restrict/images/$registro->CONFIG_LOGOTOPO")}}' class='img-responsive'  />
                            @endif
                        </td>
                        <td>
                            <strong>LOGO RODAPÉ</strong> <br/> 
                            @if($registro->CONFIG_LOGORODAPE!=null)
                            <img src='{{url("/assets/restrict/images/$registro->CONFIG_LOGORODAPE")}}' class='img-responsive'  />
                            @endif
                        </td>
                        <td>
                            <strong>FAVICON</strong> <br/> 
                            @if($registro->CONFIG_FAVICON!=null)
                            <img src='{{url("/assets/restrict/images/$registro->CONFIG_FAVICON")}}' />
                            @endif
                        </td>
                    </tr>
                </table>
                <table class='table table-hover'>
                    <tr>
                        <td>
                            <strong>CÓD GOOGLE</strong> <br/>
                            {{$registro->CONFIG_CODGOOGLE}}
                        </td>
                    </tr>
                </table>
                <table class='table table-hover'>
                    <tr>
                        <td>
                            <strong>CHAVE BEMFUNCIONAL</strong> <br/>
                            {{$registro->CONFIG_EJORNAL_API}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan='20'>
                            <a href='{{url("/restrito/$page/editar/$registro->CONFIG_CODIGO")}}' class='label label-success'>
                                <i class='fa fa-pencil'></i> Edit
                            </a>
                        </td>
                    </tr>
                </table>
                @endforeach
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