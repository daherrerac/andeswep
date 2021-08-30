<?php

namespace App\Imports;

use App\Models\UserEvento;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Throwable;

class UsersEventoImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function  __construct($id_evento)
    {
        $this->id_evento= $id_evento;
    }

    public function collection(Collection $rows)
    {
        //dd($rows);
        foreach ($rows as $row) {
            UserEvento::create([
                'id_evento'   => $this->id_evento,
                'nombre'        => $row['nombre'],
                'email'       => $row['correo']                
            ]);
        }
    }
    
    
}
