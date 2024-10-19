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

{{-- modal --}}
    <div class="relative z-10 hidden" id="deleteModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity backdrop-filter backdrop-blur-sm" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Apakah Anda yakin untuk menghapus data ?</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Are you sure you want to delete your account? All of your data will be permanently removed. This action cannot be undone.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <a id="confirmDeleteButton" href="#" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Hapus</a>
                    <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" onclick="closeDeleteModal()">Batal</button>
                </div>
            </div>
        </div>
    </div>
    </div>
{{-- modal --}}

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
                                                    <div class="inline-flex rounded-lg border border-gray-100 bg-gray-100 p-1">
                                                        <a href="/audit/edit/{{$tahun}}/{{$post->id}}">
                                                            <button class="inline-flex items-left gap-2 rounded-md px-4 py-2 text-sm text-gray-500 hover:text-gray-700 focus:relative">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                                </svg>
                                                                Edit
                                                            </button>
                                                        </a>

                                                        <a href="/inventory/{{$tahun}}/{{$post->id}}">
                                                            <button class="inline-flex items-center gap-2 rounded-md px-4 py-2 text-sm text-gray-500 hover:text-gray-700 focus:relative">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                </svg>
                                                                View
                                                            </button>
                                                        </a>

                                                        <button
                                                            onclick="openDeleteModal('{{ $tahun }}', {{$post->id}})"
                                                            class="inline-flex items-center gap-2 rounded-md px-4 py-2 text-sm text-blue-500 focus:relative">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                            </svg>
                                                            Delete
                                                        </button>
                                                        </div>
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

{{-- custom js --}}
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

        // javascript untuk mengirimkan data id ke modal 
        let id;
        let tahun;

        function openDeleteModal(tahun, id) {            
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmDeleteButton').setAttribute('href', '/audit/hapus/' + tahun + '/' + id);
        }


        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
 
        // javascript untuk mengirimkan data id ke modal 
    </script>
{{-- custom js --}}
</x-layout>
