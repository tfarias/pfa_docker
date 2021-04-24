@extends('layouts.lte.template')
@section('content_lte')
    <div class="this-place area">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Listagem</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Listagem</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Filtros</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('listagem.index') }}" method="get" class="form-filter validate">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input type="text" name="nome" id="nome" class="form-control"
                                                       value="{{ request('nome') }}" placeholder="Nome" maxlength="255">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 pull-right">
                                            <div class="text-right">
                                                <a href="{{ route('listagem.index') }}" class="btn btn-default"
                                                   toggle="tooltip" title="Limpar"><i class="fas fa-sync"></i></a>
                                                <button type="submit" class="btn btn-default" id="btn-filter"
                                                        name="acao" value="Search" toggle="tooltip" title="Pesquisar">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                @include('partials.buttons.lte.create', ['route' => 'listagem.create'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listagem</h3>
                            </div>
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="table-responsive">
                                        {!! Table::withContents($dados)->hover()
                                                ->callback('',function ($field,$dado){
                                                      $btn ="";
                                                      $btn.=Button::danger('<i class="fas fa-trash"></i>')->asLinkTo(route('listagem.destroy',['listagem'=>$dado->id]))->addAttributes(['class'=>'btn-xs confirma-acao pull-right','data-texto'=>'Deseja mesmo excluir este registro?','id'=>'btn-excluir','toggle'=>'tooltip','title'=>'Deletar']);
                                                      $btn.=Button::success('<i class="fas fa-edit"></i>')->asLinkTo(route('listagem.edit',['listagem'=>$dado->id]))->addAttributes(['class'=>'btn-xs pull-right','toggle'=>'tooltip','title'=>'Editar']);
                                                      return $btn;
                                                  })
                                        !!}
                                    </div>
                                </div>
                                {!! $dados->appends(request()->all())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
