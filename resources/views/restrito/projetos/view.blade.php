@extends('layouts.restrito')
@section('content')

<ol class='breadcrumb breadcrumb-arrow text-uppercase'>
    <li><a href='{{url('/restrito')}}'>Home</a></li>
    <li><a href='{{url('/restrito/projetos')}}'>Projetos</a></li>
    <li class='active'>{{$titulo}}</li>
</ol>

<h3 class='section-title first-title'>
    {{$nomeProjeto}}
</h3>


<div class='row'>
    <div class='col-lg-12'>
        <div class='content-box'>
            <div class='content'>
                <ul class='nav nav-tabs'>
                    <li class='active'>
                        <a href='#tarefas' data-toggle='tab' aria-expanded='false'>
                            <i class='zmdi zmdi-view-list-alt'></i>Tarefas
                        </a>
                    </li>
                    <li>
                        <a href='#comentarios' data-toggle='tab' aria-expanded='false'>
                            <i class='zmdi zmdi-comments'></i>Comentários
                        </a>
                    </li>

                    <li>
                        <a href='#arquivos' data-toggle='tab' aria-expanded='false'>
                            <i class='zmdi zmdi-folder-outline'></i>Arquivos
                        </a>
                    </li>
                    <li>
                        <a href='#bugs' data-toggle='tab' aria-expanded='false'>
                            <i class='zmdi zmdi-bug'></i>Bugs
                            <span class="badge badge-primary">8</span>
                        </a>
                    </li>
                </ul>






                <div class='clearfix'></div>
                <div class='tab-content'>
                    <div class='tab-pane fade in active' id='tarefas'>
                        @can('TAREFAS')
                        <a href='{{url("/restrito/projetos/$codProjeto/tarefas/cadastrar")}}' 
                           class='btn btn-info waves-effect white'>Inserir Tarefa</a>
                        @endcan

                        @foreach($etapas as $etapa)
                        <div class='row m-t-15'>
                            <div class='col-md-12'>
                                <h3>{{$etapa->ETA_NOME}}</h3>
                                <table class='table table-hover table-responsive'>
                                    <thead>
                                        <tr>
                                            <th width='30px'>#</th>
                                            <th>Tarefa</th>
                                            <th width='100px'>Início</th>
                                            <th width='100px'>Prazo</th>
                                            <th width='100px'>Encerramento</th>
                                            <th width='30px'>OA</th>
                                            <th width='30px'>SA</th>
                                            <th>Progresso</th>
                                            <th width='120px'>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tarefas as $tarefa)
                                        @if($tarefa->ETA_CODIGO==$etapa->ETA_CODIGO)
                                        <tr>
                                            <td>{{$tarefa->TAR_CODIGO}}</td>
                                            <td>
                                                <strong>{{$tarefa->PROD_NOME}}</strong>
                                                <p class='small'>{{$tarefa->name}}</p>
                                            </td>
                                            <td class='table-date'>
                                                {{ \Carbon\Carbon::parse($tarefa->TAR_DTINICIO)->format('d/m/Y')}}
                                                <br/><i class='zmdi zmdi-time'></i>
                                                {{ \Carbon\Carbon::parse($tarefa->TAR_DTINICIO)->format('G:i')}}
                                            </td>
                                            <td class='table-date'>
                                                {{ \Carbon\Carbon::parse($tarefa->TAR_DTPRAZOESTIMADO)->format('d/m/Y')}}
                                                <br/><i class='zmdi zmdi-time'></i>
                                                {{ \Carbon\Carbon::parse($tarefa->TAR_DTPRAZOESTIMADO)->format('G:i')}} 
                                            </td>
                                            <td class='table-date'>
                                                @if($tarefa->TAR_DTFINAL != null)
                                                {{ \Carbon\Carbon::parse($tarefa->TAR_DTFINAL)->format('d/m/Y')}}
                                                <br/><i class='zmdi zmdi-time'></i>
                                                {{ \Carbon\Carbon::parse($tarefa->TAR_DTFINAL)->format('G:i')}} 
                                                @endif
                                            </td>
                                            <td>
                                                @if($tarefa->TAR_APVCLIENTE_VALOR=='SIM')
                                                <a data-toggle='tooltip' data-placement='left' 
                                                   data-original-title='Orçamento aprovado'>
                                                    <i class='zmdi zmdi-check-circle success-color'></i> 
                                                </a>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>
                                                @if($tarefa->TAR_APVCLIENTE_TAREFA=='SIM')
                                                <a data-toggle='tooltip' data-placement='left' 
                                                   data-original-title='Serviço Aprovado'>
                                                    <i class='zmdi zmdi-check-circle success-color'></i> 
                                                </a>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td class='table-date'>
                                                <div class='progress progress-bar-lg'>
                                                    <div class='progress-bar progress-bar-success' 
                                                         role='progressbar' aria-valuenow='51' aria-valuemin='0' 
                                                         aria-valuemax='100' style='width: {{$tarefa->TAR_PROGRESSO}}%'>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class='table-icon-cell'>
                                                <a href='#' class='btn btn-default btn-xs white m-r-5'
                                                   onclick='deletar("{{url("/restrito/projetos/$codProjeto/tarefas/deletar/$tarefa->TAR_CODIGO")}}")' id='urlDeletar' >
                                                    <i class='zmdi zmdi-delete'></i> Del
                                                </a>
                                                <a href='{{url("/restrito/projetos/$codProjeto/tarefas/editar/$tarefa->TAR_CODIGO")}}' class='btn btn-primary btn-xs white'>
                                                    <i class='zmdi zmdi-edit'></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        <tr>
                                            <td colspan='10'>
                                                <span class='f-s-10'>
                                                    OA - Orçamento Aprovado | SA - Serviço Aprovado
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class='tab-pane fade' id='comentarios'>
                        @can('COMENTÁRIOS')
                        <a href='{{url("/restrito/projetos/$codProjeto/comentarios/cadastrar")}}' 
                           class='btn btn-info waves-effect white'>Inserir Comentário</a>
                        @endcan

                        @foreach($comentarios as $comentario)
                        <table width='100%' class='m-t-30' >
                            <tr>
                                @if($comentario->foto != '')
                                <td width='50px' style='vertical-align: top;'>
                                    <a class='pull-left thumb-sm avatar'>
                                        <img src='{{url("assets/img/users/$comentario->foto")}}' class='img-circle img-responsive'/>
                                    </a>
                                </td>
                                <td width='5px' class='text-right' style='vertical-align: top;'>
                                    <p class='f-s-28 text-info'>
                                        <i class='zmdi zmdi-caret-left'></i>
                                    </p>

                                </td>
                                @endif
                                <td style='vertical-align: top;'>
                                    <div class='border-radius p-10' style='border: 1px solid #49ceff;'>
                                        <p class='text-info'>
                                            <strong>
                                                {{$comentario->name}} - 
                                            </strong>
                                            @if($comentario->tipo == 'CLI')
                                            <span class='label label-default f-s-10'>
                                                Cliente
                                            </span>
                                            @else
                                            <span class='label label-danger f-s-10'>
                                                {{$comentario->cargo}}
                                            </span>
                                            @endif
                                            <br/>
                                            <span style='color: #454545'>
                                                <i class='zmdi zmdi-time'></i>
                                                {{ \Carbon\Carbon::parse($comentario->criadoem)->format('d/m/Y G:i')}}
                                            </span>


                                        </p>
                                        <br/>
                                        {{$comentario->COM_TEXTO}}
                                    </div>
                                </td>
                            </tr>
                        </table>
                        @endforeach

                    </div>
                    <div class='tab-pane fade' id='arquivos'>
                        @can('ARQUIVOS')
                        <a href='{{url("/restrito/projetos/$codProjeto/arquivos/cadastrar")}}' 
                           class='btn btn-info waves-effect white'>Inserir Arquivo</a>
                        @endcan
                        <p>Remain valley who mrs uneasy remove wooded him you. Her questions favourite him concealed. We to wife face took he. The taste begin early old why since dried can first. Prepared as or humoured formerly. Evil mrs true get post. Express village evening prudent my as ye hundred forming. Thoughts she why not directly reserved packages you. Winter an silent favour of am tended mutual.</p>

                        <p>Examine she brother prudent add day ham. Far stairs now coming bed oppose hunted become his. You zealously departure had procuring suspicion. Books whose front would purse if be do decay. Quitting you way formerly disposed perceive ladyship are. Common turned boy direct and yet.</p>
                    </div>


                    <div class='tab-pane fade' id='bugs'>
                        @can('BUGS')
                        <a href='{{url("/restrito/projetos/$codProjeto/bugs/cadastrar")}}' 
                           class='btn btn-info waves-effect white'>Relatar Erros</a>
                        @endcan

                        @foreach($bugs as $bug)
                        <table width='100%' class='m-t-30' >
                            <tr>
                                <td style='vertical-align: top;'>
                                    <div class='border-radius p-10' style='border: 1px solid #49ceff;'>
                                        <p class='text-info'>
                                            <strong>
                                                {{$bug->BUGS_NOME}} - 
                                            </strong>
                                            <br/>
                                            <span style='color: #454545'>
                                                <i class='zmdi zmdi-time'></i>
                                                {{ \Carbon\Carbon::parse($bug->created_at)->format('d/m/Y G:i')}}
                                            </span>
                                        </p>

                                        <br/>
                                        {{$bug->BUGS_DESCRICAO}}
                                        <hr/>
                                        Prioridade: {{$bug->BUGS_PRIORIDADE}}
                                        | Gravidade: {{$bug->BUGS_GRAVIDADE}}
                                        | Status: {{$bug->BUGS_STATUS}}

                                        @can('COMPANY')
                                        <hr/>
                                        <a href='#' class='btn btn-default btn-xs white m-r-5'
                                           onclick='deletar("{{url("/restrito/projetos/$codProjeto/bugs/deletar/$bug->BUGS_CODIGO")}}")' id='urlDeletar' >
                                            <i class='zmdi zmdi-delete'></i> Del
                                        </a>
                                        <a href='{{url("/restrito/projetos/$codProjeto/bugs/editar/$bug->BUGS_CODIGO")}}' class='btn btn-primary btn-xs white'>
                                            <i class='zmdi zmdi-edit'></i> Edit
                                        </a>
                                        @endcan

                                    </div>
                                </td>
                            </tr>
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>












@push('css')
@endpush

@push('js-topo')

@endpush

@push('js-footer')
<script>
    $('#tableSearch').DataTable({
    'dom': '<'toolbar tool2'><'clear - filter'>frtip',
            info: false,
            paging: true,
            responsive: true,
            'oLanguage': {'sSearch': ''}
    });
    $('div.tool2').html('<h5 class='zero - m'>Dados Cadastrados</h5>');
    $('.dataTables_filter input').attr('placeholder', 'Pesquisar');
</script>
@endpush

@endsection