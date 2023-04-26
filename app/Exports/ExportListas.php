<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportListas implements FromCollection, WithHeadings
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {

        return ['Articulo','Nombre','Unidad de Medida','Cantidad UM', 'Fecha Vigencia', 'Precio', 'Dolar', 'Origen', 'Descripcion'];
    }
}
