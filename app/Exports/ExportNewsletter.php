<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Faker\Factory as Faker;

use App\Models\Newsletter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Storage;
use Carbon\Carbon;
use DB;

class ExportNewsletter implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function headings(): array
    {
        $headings[]   =   __('label.no.name');
        $headings[]   =   __('label.name.name');
        $headings[]   =   __('label.email.name');
        $headings[]   =   __('label.created.name');

        
        return $headings;
    }

    /**
     * @return array
     */
    public function collection()
    {
        $sheets = [];
        $newsletters = Newsletter::descending()->get();
        foreach($newsletters as $key => $newsletter) {
            $sheets[] = [
                __('label.no.name')      => $key+1,
                __('label.name.name')    => $newsletter->firstname.' '.$newsletter->lastname,
                __('label.email.name')   => $newsletter->email,
                __('label.created.name') => $newsletter->created_at->toFormattedDateString(),
            ];
        }
        
        return collect($sheets);

    }

}
