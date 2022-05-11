<?php

namespace App\Exports;

use App\Models\UkmRegistration;
use App\Models\UkmRegistDescription;
use App\Models\Ukm;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportUkmRegistration implements FromQuery, WithHeadings, WithMapping, WithTitle
{
    use Exportable;

    public function __construct($ukm_id)
    {
        $this->ukm_id = $ukm_id;
        $this->ukm = Ukm::find($ukm_id);
        $this->fieldName = UkmRegistDescription::where('ukm_id', $ukm_id)->first();
    }

    public function query()
    {
        return UkmRegistration::where('ukm_id', $this->ukm_id);
    }

    public function avatar($path)
    {
        if ($path == null)
            return null;

        $data = env('APP_URL') . $path;
        return $data;
    }

    public function file($path)
    {
        if ($path == null)
            return null;

        $data = env('APP_URL'). $path;
        return $data;
    }

    public function map($data): array
    {
        return [
            $data->user->name,
            $data->user->npm,
            $this->avatar($data->user->avatar),
            $data->user->year,
            $data->user->faculty,
            $data->user->phone_number,

            $data->field1,
            $data->field2,
            $data->field3,
            $data->field4,
            $data->field5,

            $this->file($data->file1),
            $this->file($data->file2),
            $this->file($data->file3),
            $this->file($data->file4),
        ];
    }

    public function headings(): array
    {
        return [
            "Nama",
            "NPM",
            "Profil",
            "Angkatan",
            "Fakultas",
            "No Telp",
            $this->fieldName->field1,
            $this->fieldName->field2,
            $this->fieldName->field3,
            $this->fieldName->field4,
            $this->fieldName->field5,
            $this->fieldName->file1,
            $this->fieldName->file2,
            $this->fieldName->file3,
            $this->fieldName->file4,
        ];
    }

    public function title(): string
    {
        return $this->ukm->short_name;
    }
}
