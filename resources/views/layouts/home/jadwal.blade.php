    <style>
        @media only screen and (max-width: 767px) {
            td:nth-of-type(1):before {
            content: "Tanggal dan Waktu";
            }
            td:nth-of-type(2):before {
            content: "Cabang Olahraga";
            }
            td:nth-of-type(3):before {
            content: "Nomor";
            }
            td:nth-of-type(4):before {
            content: "Tempat";
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
    <h2 class="mb-2 text-xl fw-bolder text-gray-900 dark:text-white">Jadwal</h2>
    <table id="tableJadwalHome" class="table" style="width: 100%">
        <thead>
            <tr>
                <th data-searchable="true">Tanggal dan Waktu</th>
                <th data-searchable="true">Cabor</th>
                <th data-searchable="true">Nomor</th>
                <th data-searchable="true">Babak</th>
                <th data-searchable="true">Tempat</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>