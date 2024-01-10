<style>
    @media only screen and (max-width: 767px) {
        td:nth-of-type(1):before {
        content: "Kontingen";
        }
        td:nth-of-type(2):before {
        content: "Cabang Olahraga";
        }
        td:nth-of-type(3):before {
        content: "Nomor";
        }
        td:nth-of-type(4):before {
        content: "Atlet";
        }
        td:nth-of-type(5):before {
        content: "Medali";
        }
    }
    .dataTables_length{
        display: none;
    }
    .dataTables_filter{
        display: none;
    }
    .sorting{
        display: active;
    }
</style>
<h2 class="mb-2 text-xl fw-bolder text-gray-900 dark:text-white">Hasil</h2>
<table id="tableHasilHome" class="table" style="width: 100%">
    <thead>
        <tr>
            <th data-searchable="true">Kontingen</th>
            <th data-searchable="true">Cabang Olahraga</th>
            <th data-searchable="true">Nomor</th>
            <th data-searchable="true">Atlet</th>
            <th data-searchable="true">Medali</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>