<?php

namespace App\Exports;

use App\Models\Slider;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SlidersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $sliders;

    public function __construct($sliders)
    {
        $this->sliders = $sliders;
    }

    public function collection()
    {
        return $this->sliders;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Image',
            'Status',
            'Link',
            'Sort Order',
            'Language',
            'Created At'
        ];
    }

    public function map($slider): array
    {
        return [
            $slider->id,
            $slider->title,
            $slider->image ? asset('uploads/slider/'.$slider->image) : 'No Image',
            $slider->status ? 'Active' : 'Inactive',
            $slider->link,
            $slider->sort_order,
            $slider->language->name ?? 'N/A',
            $slider->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
