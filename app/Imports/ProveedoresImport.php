<?php

namespace App\Imports;

use App\Proveedores;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProveedoresImport implements ToArray, WithHeadingRow, WithChunkReading, WithBatchInserts
{

    public function headingRow(): int
    {
        return 3;
    }

    /**
     * @inheritDoc
     */
    public function array(array $array)
    {
        // TODO: Implement array() method.
    }

    public function chunkSize(): int
    {
        // TODO: Implement chunkSize() method.
        return 200;
    }

    public function batchSize(): int
    {
        // TODO: Implement batchSize() method.
        return 200;
    }
}
