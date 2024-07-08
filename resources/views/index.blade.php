@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
    <h1 class="my-3">Dashboard</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-4 col-md-6 mb-2">
                    <div class="card-body bg-info">
                        <center>
                            <b>Info Stok BBM</b>
                        </center>
                        <br>
                        @foreach ($bbm as $data)
                            <table>
                                <tr>
                                    @if ($data->stok > 0)
                                        <td>Kendaraan {{ $data->jenis_kendaraan }} Sisa {{ $data->stok }} liter.</td>
                                    @else
                                        <td>
                                            <div class="alert alert-danger mt-2" role="alert">
                                                <strong>Perhatian!</strong> Stok untuk kendaraan berjenis
                                                {{ $data->jenis_kendaraan }} sudah habis!
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            </table>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-8 col-md-6">
                    <div class="card-body bg-warning">
                        <center>
                            <b>Info Pajak (Jatuh Tempo)</b>
                        </center>
                        <br>
                        @php
                            $tgl = date('Y-m-d');
                            $pajaks = App\Models\Pajak::select(
                                'nopol',
                                DB::raw('DATEDIFF(jatuh_tempo, "' . $tgl . '") AS interval_tgl'),
                            )->get();
                            foreach ($pajaks as $pajak) {
                                $nopol = $pajak->nopol;
                                if ($pajak->interval_tgl < 0) {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo 'Kendaraan dengan No Polisi <b>' .
                                        $nopol .
                                        '</b> sudah melewati batas Jatuh Tempo!!';
                                    echo '</div>';
                                } elseif ($pajak->interval_tgl == 0) {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo 'Kendaraan dengan No Polisi <b>' . $nopol . '</b> akan Jatuh Tempo Hari Ini!';
                                    echo '</div>';
                                } elseif ($pajak->interval_tgl == 1) {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo 'Kendaraan dengan No Polisi <b>' . $nopol . '</b> Jatuh Tempo Besok!';
                                    echo '</div>';
                                } elseif ($pajak->interval_tgl >= 2 and $pajak->interval_tgl < 8) {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo 'Kendaraan dengan No Polisi <b>' .
                                        $nopol .
                                        '</b> Jatuh Tempo ' .
                                        $pajak->interval_tgl .
                                        ' hari lagi.';
                                    echo '</div>';
                                }
                            }
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
