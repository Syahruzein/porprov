<x-app-layout>
    <style>
        @media only screen and (max-width: 767px) {
            td:nth-of-type(1):before {
            content: "Name";
            }
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontingen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="btn btn-primary mb-3" href="{{route('kontingenCreate')}}">Membuat</a>

                    <table id="tableKontingen" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-searchable="true">Name</th>
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
