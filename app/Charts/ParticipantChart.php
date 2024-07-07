<?php

namespace App\Charts;

use App\Models\Participant;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class ParticipantChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $participant = Participant::rightJoin('categories', function ($query) {
            $query->on('participants.category_id', 'categories.id');
        })
        ->select(DB::raw('count(participants.id) as total'), 'categories.name')
        ->groupBy('categories.id')->get();
        $name = [];
        $total = [];
        foreach ($participant as $key => $value) {
            array_push($name, $participant[$key]->name);
            array_push($total, $participant[$key]->total);
        }
        return $this->chart->horizontalBarChart()
            ->setTitle('Jumlah Peserta')
            ->setSubtitle('Peserta lomba berdasarkan kategori')
            ->addData('Jumlah Peserta', $total)
            ->setXAxis($name);
    }
}
