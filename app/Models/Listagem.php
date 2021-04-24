<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use App\Models\Traits\Uuid;

class Listagem extends BaseModel implements TableInterface
{
    use Uuid;

    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ['id', 'nome', 'descricao'];

    protected $table = 'listagem';
    protected $dates = ['deleted_at'];

    public function getTableHeaders()
    {
        return ['Nome', 'Descrição'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {


            case "Nome":
                return $this->nome;

            case "Descrição":
                return $this->descricao;
        }
    }


}
