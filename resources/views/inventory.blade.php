<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>

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

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:p">
        <div class="my-10 sm:mx-auto sm:w-full">

            <div class="flex min-h-full flex-col justify-center px-20 mx-8 py-12 lg:p">
                {{-- tombol tambah edit data --}}
                <div class="items-baseline">
                    <div>
                        <a href="/audit/tambah" class="py-2 w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-700">+ Tambah Data</a>
                        <a href="#" class="ml-5 py-2 w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-700">Cetak Data</a>
                    </div>
                </div>
                {{-- tombol tambah edit data --}}

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
                                        <td class="py-2 text-center">1</td>
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

    <script>
        function filterTable() {
            var input, filter, monthValue, table, tr, td, dateCell, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            monthValue = document.getElementById("monthDropdown").value;
            table = document.querySelector("tbody");
            tr = table.getElementsByTagName("tr");
        }


    // Fungsi untuk menampilkan atau menyembunyikan dropdown bulan
    document.getElementById("dropdownButton").addEventListener("click", function() {
        const dropdown = document.getElementById("monthDropdown");
        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
    });

    // Script untuk filter berdasarkan input
    function filterTable() {
        var input, filter, monthValue, table, tr, td, dateCell, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        monthValue = document.getElementById("monthDropdown").value;
        table = document.querySelector("tbody");
        tr = table.getElementsByTagName("tr");

        let visibleCount = 0;

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2]; // Kolom Sumber Dana
            dateCell = tr[i].getElementsByTagName("td")[4]; // Kolom Tanggal

            let displayRow = true;

            // Filter berdasarkan Sumber Dana
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (filter && !txtValue.toUpperCase().includes(filter)) {
                    displayRow = false;
                }
            }

            // Filter berdasarkan bulan
            if (dateCell) {
                let dateValue = dateCell.textContent || dateCell.innerText;
                if (monthValue !== "") {
                    let monthFromDate = dateValue.substring(5, 7);
                    if (monthFromDate !== monthValue) {
                        displayRow = false;
                    }
                }
            }

            // Tampilkan atau sembunyikan baris
            if (displayRow) {
                tr[i].style.display = "";
                visibleCount++;
                tr[i].getElementsByTagName("td")[0].innerText = visibleCount; // Update nomor urut
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    // Event listeners
    document.getElementById("searchInput").addEventListener("keyup", filterTable);
    document.getElementById("monthDropdown").addEventListener("change", filterTable);
</script>



</x-layout>
