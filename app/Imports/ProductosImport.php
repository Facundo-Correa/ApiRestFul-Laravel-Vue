<?php

namespace App\Imports;

use App\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductosImport implements ToModel, WithHeadingRow, WithBatchInserts
{

    public function headingRow(): int
    {
        return 3;
    }



    /**
     * @inheritDoc
     */
    public function model(array $row)
    {
        // TODO: Implement model() method.
    }

    /**
     * @inheritDoc
     */
    public function batchSize(): int
    {
        // TODO: Implement batchSize() method.
    }
}
