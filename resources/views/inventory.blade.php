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

{{-- isi --}}
    <div class="flex min-h-full flex-col justify-center px-6 lg:p">

        {{-- table --}}
            <div class=" sm:mx-auto sm:w-full">
                    <div class="flex min-h-full flex-col justify-center mx-6 py-12 lg:p">

                {{-- modal berhasil --}}
                    @if (session("success"))
                        <div role="alert" class="rounded border-s-4 border-green-500 bg-green-50 p-4 mb-5">
                            <span class="text-green-600 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <strong class="block font-medium text-green-600 ml-2">{{session('success')}}</strong>
                            </span>
                        </div>
                    @endif
                {{-- modal berhasil --}}

                {{-- data filter --}}
                    <div class="flex sm:ml-20">
                        <div class="relative">
                            <details class="group [&_summary::-webkit-details-marker]:hidden">
                                <summary class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
                                    <span class="text-sm font-medium"> Filter </span>
                                    <span class="transition group-open:-rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </summary>

                                <div class="z-50 group-open:absolute group-open:start-0 group-open:top-auto group-open:mt-2">
                                    <div class="w-96 rounded border border-gray-200 bg-white">
                                        <header class="items-center justify-between p-4">
                                            <span class="">Filter Bulan</span>
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
                                        </header>
                                        <header class="flex items-center justify-between p-4">
                                            <div class="items-center text-center">
                                                <span class="mr-2">Sumber Dana</span>
                                                <input type="text" id="searchInput" class="border border-gray-300 rounded p-1 w-32" placeholder="Cari" onkeyup="filterTable()">
                                            </div>
                                        </header>
                                        <div class="flex justify-end p-4">
                                            <button id="resetButton" class="bg-gray-200 p-2 rounded hover:bg-gray-300" onclick="resetFilters()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                                                    </svg>
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                {{-- data filter --}}
                
                        <div class="my-5 sm:mx-auto sm:w-full">
                            <div class="mx-auto mt-11 text-center">
                                <div class="overflow-x-auto">
                                    <table>
                                        <thead>
                                            <tr id="header" class="bg-green-700">
                                                <th class="border-b text-center py-2">No</th>
                                                <th class="border-b text-center py-2">Barang</th>
                                                <th class="border-b text-center py-2">Sumber Dana</th>
                                                <th class="border-b text-center py-2">Jumlah</th>
                                                <th class="border-b text-center py-2">
                                                    <div class="relative inline-flex items-center justify-center">
                                                        <span class="ml-2">Tanggal Masuk</span>
                                                        
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
                                                <td class="py-2 text-center">{{$post->nama_barang}}</td>
                                                <td class="py-2 text-center">{{$post->sumber_dana}}</td>
                                                <td class="py-2 text-center">{{$post->jumlah}}</td>
                                                <td class="py-2 text-center">{{$post->tanggal}}</td>
                                                <td class="py-2">
                                                    <a href="/inventory/{{$tahun}}/{{$post->id}}" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
                                                        Details
                                                        <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                                                        &rarr;
                                                        </span>
                                                    </a>
                                                </td>
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
{{-- isi --}}

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
            // reset filter data 
            function resetFilters() {
            
                document.getElementById('monthDropdown').selectedIndex = 0;

                document.getElementById('searchInput').value = '';

                filterTable();
            }

        // Event listeners for input and dropdown changes
        document.getElementById("searchInput").addEventListener("keyup", filterTable);
        document.getElementById("monthDropdown").addEventListener("change", filterTable);
    </script>
{{-- custom js untuk filtering data  --}}
</x-layout>
