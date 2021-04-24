<?php

namespace App\Http\Controllers;

use App\Models\Listagem;
use App\Repositories\ListagemRepository;
use App\Criteria\ListagemCriteria;
use App\Forms\ListagemForm;
use Kris\LaravelFormBuilder\Form;
use Illuminate\Http\Request;

class ListagemController extends Controller
{

    private $repository;

    public function __construct(ListagemRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Lista todos os registros do sistema.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $filtros = request()->all();
        $this->repository->pushCriteria(new ListagemCriteria($filtros));
        $dados = $this->repository->paginate();
        return view('listagem.index', compact('dados', 'filtros'));
    }

    /**
         * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $form = \FormBuilder::create(ListagemForm::class,[
            'url'=>route('listagem.store'),
            'method'=>'POST'
        ]);

        return view('listagem.create',compact('form'));

    }


   /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          /** @var Form $form */
          $form = \FormBuilder::create(ListagemForm::class);
          if(!$form->isValid()){
              return redirect()
                  ->back()
                  ->withErrors($form->getErrors())
                  ->withInput();
          }
          $data = $form->getFieldValues();
          $this->repository->create($data);

          flash('Listagem criado com sucesso!', 'success');

          return redirect()->route('listagem.index');
      }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Models\Listagem $listagem
        * @return \Illuminate\Http\Response
        */
       public function edit(Listagem $listagem)
       {
           $form = \FormBuilder::create(ListagemForm::class,[
               'url'=>route('listagem.update',['listagem' => $listagem->id]),
               'method'=>'PUT',
               'model' => $listagem
           ]);

           return view('listagem.edit',compact('form'));
       }


    /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\User  $listagem
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Listagem $listagem)
        {
            /** @var Form $form */
            $form = \FormBuilder::create(ListagemForm::class,[
                'data' => ['id' => $listagem->id],
                'model' => $listagem
            ]);
            if(!$form->isValid()){
                return redirect()
                    ->back()
                    ->withErrors($form->getErrors())
                    ->withInput();
            }
            $data = $form->getFieldValues();
            $this->repository->update($data,$listagem->id);
            flash('Listagem alterado com sucesso!!', 'success');
            return redirect()->route('listagem.index');
        }


     /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Listagem $user
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $this->repository->delete($id);
            flash('Listagem deletado com sucesso!!', 'success');

             return redirect()->route('listagem.index');
        }

  
}
