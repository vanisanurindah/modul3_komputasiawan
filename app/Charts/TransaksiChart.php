<?php

// app/Models/Transaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Model code here
}

// app/Charts/TransaksiChart.php
namespace App\Charts;

use App\Models\Pembelian;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class TransaksiChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Query to get sales data grouped by month
        $salesData = Pembelian::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Prepare data for the chart
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $salesCounts = [];

        foreach (range(1, 12) as $month) {
            $salesCounts[] = $salesData->get($month)->count ?? 0;
        }

        return $this->chart->barChart()
            ->setTitle('Jumlah Penjualan per Bulan')
            ->setSubtitle('Tahun ' . Carbon::now()->year)
            ->addData('Penjualan', $salesCounts)
            ->setXAxis($months);
    }
}
