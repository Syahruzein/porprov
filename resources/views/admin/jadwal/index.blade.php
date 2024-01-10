<x-app-layout>
    <style>
        @media only screen and (max-width: 767px) {
            td:nth-of-type(1):before {
            content: "Tanggal";
            }
            td:nth-of-type(2):before {
            content: "Cabang Olahraga";
            }
            td:nth-of-type(3):before {
            content: "Nomor";
            }
            td:nth-of-type(3):before {
            content: "Atlet";
            }
            td:nth-of-type(4):before {
            content: "Babak";
            }
            td:nth-of-type(5):before {
            content: "Tempat";
            }
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="btn btn-primary mb-3" href="{{route('jadwalCreate')}}">Membuat</a> 

                    <table id="tableJadwal" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-searchable="true">Tanggal</th>
                                <th data-searchable="true">Cabang Olahraga</th>
                                <th data-searchable="true">Nomor</th>
                                <th data-searchable="true">Atlet</th>
                                <th data-searchable="true">Babak</th>
                                <th data-searchable="true">Tempat</th>
                                <th data-searchable="false">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
