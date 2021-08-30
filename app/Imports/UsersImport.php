<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UsersImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['nombre'],
            'email'    => $row['correo'],
            'password' => Hash::make($row['clave'])
        ]);
    }
    public function onError(Throwable $error)
    {

    }
}
