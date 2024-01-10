@extends('welcome')

@section('content')
<div class="relative sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        
        <div class="mt-16">
            <div class="grid ">
                <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <h2 class="mb-2 text-xl fw-bolder text-gray-900 dark:text-white">Hasil Pertandingan</h2>
                        <table id="tableHasilHome2" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-searchable="true">Kontingen</th>
                                    <th data-searchable="true">Cabang Olahraga</th>
                                    <th data-searchable="true">Nomor</th>
                                    <th data-searchable="true">Atlet</th>
                                    <th data-searchable="true">Babak</th>
                                    <th data-searchable="true">Medali</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection