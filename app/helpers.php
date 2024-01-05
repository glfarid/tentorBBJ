<?php

use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Total;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use function PHPUnit\Framework\isNull;



//apakah funciion core_factor itu ada di laravel
if (!function_exists('core_factor')) {
    function core_factor(Collection $gap, $alternatif_id, $aspek_id)
    {

        $kriteria_coreFactor = Kriteria::where('jenis', 'Core Factor')->where('aspek_id', $aspek_id)->count();

        return $gap
            ->where('alternatif_id', $alternatif_id)
            ->where('aspek_id', $aspek_id)
            ->where('kriteria.jenis', 'Core Factor')
            ->sum('selisih') / $kriteria_coreFactor;
    }
}

if (!function_exists('secondary_factor')) {
    function secondary_factor(Collection $gap, $alternatif_id, $aspek_id)
    {
        $kriteria_secondary = Kriteria::where('jenis', 'Secondary Factor')->where('aspek_id', $aspek_id)->count();


        return $gap
            ->where('alternatif_id', $alternatif_id)
            ->where('aspek_id', $aspek_id)
            ->where('kriteria.jenis', 'Secondary Factor')
            ->sum('selisih') / $kriteria_secondary;
    }
}

if (!function_exists('t_nilai')) {
    function t_nilai($core, $secondtes, $ap)
    {
        return (($ap->bobot_cf / 100) * $core) + (($ap->bobot_sf / 100) * $secondtes);
    }
}

if (!function_exists('ts_nilai')) {
    function ts_nilai($total, $aspek, $alternatif_id)
    {
        // dump($total, $aspek->toArray()[1]);
        $a = $aspek->map(function ($item) use ($total) {
            $item->total += ($item->persentase / 100) * $total[$item->id];

            return $item;
        })->sum('total');

        $aspek->transform(fn ($i) => Arr::except($i, 'total')); //hapus total sesuai alternatif. jadi gak ganggu alternatif selanjutnya
        Total::updateOrCreate(
            [
                'alternatif_id' => $alternatif_id

            ],
            [

                'alternatif_id' => $alternatif_id,
                'total' => $a
            ]
        );

        return $a;
    }
}
