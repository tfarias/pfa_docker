<?php

namespace App\Forms;

use Bootstrapper\Facades\Icon;
use Kris\LaravelFormBuilder\Form;

class ListagemForm extends Form
{
    public function buildForm()
    {

        $this->add("nome", "text", [
            "label" => "Nome",
            "attr" => [
                "maxlength" => "255",
            ],
            "rules" => "required",
            "wrapper" => ["class" => "form-group"]
        ]);
        $this->add("descricao", "text", [
            "label" => "Descrição",
            "attr" => [
                "maxlength" => "255",
            ],
            "rules" => "required",
            "wrapper" => ["class" => "form-group"]
        ]);
        $this
            ->add('submit', 'submit', ['label' => Icon::create('pencil') . ' Salvar', 'attr' => ['class' => 'btn btn-primary btn-send-form pull-left']])
            ->add('clear', 'reset', ['label' => Icon::create('refresh') . ' Limpar', 'attr' => ['class' => 'btn btn-danger pull-left']]);
    }
}
