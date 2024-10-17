<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>

{{-- custom css --}}
    <style>
        /* Table Styling */
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 90%;
            border: 1px solid #bdc3c7;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            min-width: 100px;
        }

        /* Set Minimum Widths */
        th:nth-child(1),
        td:nth-child(1) {
            min-width: 50px;
        }

        th:nth-child(2),
        td:nth-child(2) {
            min-width: 200px;
        }

        th:nth-child(3),
        td:nth-child(3) {
            min-width: 150px;
        }

        th:nth-child(4),
        td:nth-child(4) {
            min-width: 100px;
        }

        th:nth-child(5),
        td:nth-child(5) {
            min-width: 150px;
        }

        /* Row Hover Effect */
        tr:hover {
            background-color: #f5f5f5;
            transform: scale(1.02);
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
        }

        thead tr:hover {
            background-color: unset;
            transform: unset;
            box-shadow: unset;
        }

        th:first-child {
            border-top-left-radius: 10px;
        }

        th:last-child {
            border-top-right-radius: 10px;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }

        #header {
            background-color: #16a085;
            color: #fff;
        }

        .tombol {
            background-color: #16a085;

        }

        /* Dropdown Styling */
        select#monthDropdown {
            margin-left: 10px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            min-width: 150px;
            color: black;
        }

        @media only screen and (max-width: 768px) {
            select#monthDropdown {
                margin-left: 5px;
                padding: 5px;
            }
        }

        /* Ubah warna teks input pencarian menjadi hitam */
        #searchInput {
            color: black;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
{{-- custom css --}}

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:p">

    {{-- tombol tambah edit data --}}
        <div class="items-baseline ml-11 pl-11">
            <div class="flex items-center space-x-4">
                <a href="/audit/tambah" class="flex items-center">
                    <button class="button p-2 rounded-lg flex items-center tombol text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add mr-2" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1" />
                            <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905" />
                        </svg>
                        <b>Tambah Data</b>
                </a>
                {{-- <button class="button p-2 rounded-lg flex items-center tombol text-white"><b>Cetak Data</b></button> --}}
            </div>
        </div>
    {{-- tombol tambah edit data --}}

{{-- table --}}
    <div class=" sm:mx-auto sm:w-full">
            <div class="flex min-h-full flex-col justify-center mx-6 py-12 lg:p">
                <div class="my-5 sm:mx-auto sm:w-full">
                    <div class="mx-auto mt-11 text-center">
                        <div class="overflow-x-auto">
                            <table>
                                <thead>
                                    <tr id="header" class="bg-green-700">
                                        <th class="border-b text-center py-2">No</th>
                                        <th class="border-b text-center py-2">Barang</th>
                                        <th class="border-b py-2">
                                            <div class="items-center text-center">
                                                <span class="mr-2">Sumber Dana</span>
                                                <input type="text" id="searchInput" class="border border-gray-300 rounded p-1 w-32" placeholder="Cari" onkeyup="filterTable()">
                                            </div>
                                        </th>
                                        <th class="border-b py-2 text-center">Jumlah</th>
                                        <th class="border-b py-2">
                                            <div class="relative inline-flex items-center justify-center">
                                                <span class="ml-2">Tanggal Masuk</span>
                                                <select id="monthDropdown" class="ml-2 border border-gray-300 rounded">
                                                    <option value="">--Pilih Bulan--</option>
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    @php $i = 1; @endphp
                                    @foreach ($posts as $post)
                                    @php
                                    $tahun = \Carbon\Carbon::parse($post->tanggal)->format('Y');
                                    @endphp
                                    <tr class="border-b hover:bg-gray-100" data-date="{{ \Carbon\Carbon::parse($post->tanggal)->format('Y-m') }}">
                                        <td class="py-2 text-center">{{$i}}</td>
                                        <td class="py-2">{{$post->nama_barang}}</td>
                                        <td class="py-2 text-center">{{$post->sumber_dana}}</td>
                                        <td class="py-2 text-center">{{$post->jumlah}}</td>
                                        <td class="py-2 text-left pl-9">{{$post->tanggal}}</td>
                                        <td class="py-2"><a href="/inventory/{{$tahun}}/{{ $post->id }}" class="text-blue-500 hover:underline">Details</a></td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- table --}}
    </div>

{{-- custom js untuk filtering data  --}}
    <script>
        function filterTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toUpperCase();
            const monthValue = document.getElementById("monthDropdown").value;
            const table = document.querySelector("tbody");
            const tr = table.getElementsByTagName("tr");

            let visibleCount = 0;

            for (let i = 0; i < tr.length; i++) {
                const tdSource = tr[i].getElementsByTagName("td")[2]; // Column for Sumber Dana
                const dateCell = tr[i].getElementsByTagName("td")[4]; // Column for Tanggal
                let displayRow = true;

                // Filter based on Sumber Dana
                if (tdSource) {
                    const txtValue = tdSource.textContent || tdSource.innerText;
                    if (filter && !txtValue.toUpperCase().includes(filter)) {
                        displayRow = false;
                    }
                }

                // Filter based on month selection
                if (dateCell) {
                    const dateValue = dateCell.textContent || dateCell.innerText;
                    if (monthValue !== "") {
                        const monthFromDate = dateValue.substring(5, 7);
                        if (monthFromDate !== monthValue) {
                            displayRow = false;
                        }
                    }
                }

                // Display or hide the row
                if (displayRow) {
                    tr[i].style.display = "";
                    visibleCount++;
                    tr[i].getElementsByTagName("td")[0].innerText = visibleCount; // Update row number
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        // Event listeners for input and dropdown changes
        document.getElementById("searchInput").addEventListener("keyup", filterTable);
        document.getElementById("monthDropdown").addEventListener("change", filterTable);
    </script>
{{-- custom js untuk filtering data  --}}
</x-layout>