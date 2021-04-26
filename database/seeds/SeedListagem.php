<?php

use Illuminate\Database\Seeder;

class SeedListagem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lista = [
            [
                'nome'=>'Docker',
                'descricao' => 'Docker'
            ],
            [

                'nome'=>'Padrões e técnicas avançadas com Git e Github',
                'descricao'=>'Padrões e técnicas avançadas com Git e Github',
            ],
            [

                'nome'=>'Integração contínua',
                'descricao'=>'Integração contínua',
            ],
            [

                'nome'=>'Kubernetes',
                'descricao'=>'Kubernetes',
            ],
            [

                'nome'=>'Service Mesh com Istio',
                'descricao'=>'Service Mesh com Istio',
            ]

        ];

        foreach ($lista as $l)
        {
            $achou = \App\Models\Listagem::where('descricao', $l['nome'])->first();
            if (!$achou)
            {
                App\Models\Listagem::create($l);
            } else
            {
                $achou->update($l);
            }
        }
    }
}
