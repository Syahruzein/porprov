<x-app-layout>
    <style>
        @media only screen and (max-width: 767px) {
            td:nth-of-type(1):before {
            content: "Name";
            }
            td:nth-of-type(2):before {
            content: "Kontingen";
            }
            td:nth-of-type(3):before {
            content: "Cabang Olahraga";
            }
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atlet Kontingen Cabang Olahraga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="btn btn-primary mb-3" href="{{route('atletKontingenNomorCreate')}}">Create</a> 

                    <table id="tableAtletKontingenNomor" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-searchable="true">Nama Atlet</th>
                                <th data-searchable="true">Kontingen</th>
                                <th data-searchable="true">Cabang Olahraga</th>
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
