<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Faker\Factory as Faker;

use App\Models\Inquiry;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Storage;
use Carbon\Carbon;
use DB;

class ExportInquiry implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function headings(): array
    {
        $headings[]   =   __('label.no.name');
        $headings[]   =   __('label.name.name');
        $headings[]   =   __('label.phone.name');
        $headings[]   =   __('label.email.name');
        $headings[]   =   __('label.subject.name');
        $headings[]   =   __('label.message.name');
        $headings[]   =   __('label.created.name');

        
        return $headings;
    }

    /**
     * @return array
     */
    public function collection()
    {
        $sheets = [];
        $inquiries = Inquiry::descending()->get();
        foreach($inquiries as $key => $inquiry) {
            $sheets[] = [
                __('label.no.name')      => $key+1,
                __('label.name.name')    => $inquiry->firstname.' '.$inquiry->lastname,
                __('label.phone.name')   => $inquiry->phone,
                __('label.email.name')   => $inquiry->email,
                __('label.subject.name') => $inquiry->subject,
                __('label.message.name') => $inquiry->message,
                __('label.created.name') => $inquiry->created_at->toFormattedDateString(),
            ];
        }
        
        return collect($sheets);

    }

}
