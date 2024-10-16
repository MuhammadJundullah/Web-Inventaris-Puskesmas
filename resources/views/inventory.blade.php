<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <style>
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            /* Atur sesuai kebutuhan */
            border: 1px solid #bdc3c7;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            /* Membuat sudut tabel lebih bulat */
            overflow: hidden;
            /* Agar radius juga berlaku di bagian dalam */
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Membesarkan angka di kolom No lebih ke kanan */
        tr:hover td:first-child {
            transform-origin: 0% 50%;
            /* Mengatur titik asal transformasi lebih ke kiri */
            transform: scale(2);
            /* Membesarkan angka lebih besar */
            transition: transform 0.3s ease-in-out;
            /* Transisi untuk efek yang halus */
        }

        /* Efek hover untuk baris (kecuali header) */
        tr:hover {
            background-color: #f5f5f5;
            transform: scale(1.02);
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
        }

        /* Hapus efek hover pada header */
        thead tr:hover {
            background-color: unset;
            transform: unset;
            box-shadow: unset;
        }

        /* Agar header terlihat lebih baik dengan sudut bulat */
        th:first-child {
            border-top-left-radius: 10px;
            /* Sudut kiri atas */
        }

        th:last-child {
            border-top-right-radius: 10px;
            /* Sudut kanan atas */
        }

        tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
            /* Sudut kiri bawah */
        }

        tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
            /* Sudut kanan bawah */
        }

        /* Mengubah warna teks dropdown menjadi hitam */
        #monthDropdown {
            color: black;
            /* Ubah warna teks menjadi hitam */
        }


        #header {
            background-color: #16a085;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
            transform: scale(1.02);
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
        }

        /* Responsive table */
        @media only screen and (max-width: 768px) {
            table {
                width: 90%;
            }
        }
    </style>

    <!-- Tambahkan Header Tabel -->
    <h1 class="font-bold text-center bg-teal-600 text-white py-4">Inventaris Barang</h1>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:p">
        <div class="my-10 sm:mx-auto sm:w-full">
            <div class="mx-auto mt-11 text-center">
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr id="header">
                                <th class="border-b py-2">No</th>
                                <th class="border-b py-2">Barang</th>
                                <th class="border-b py-2">
                                    <div class="items-center">
                                        <span class="mr-2">Sumber Dana</span>
                                        <input type="text" id="searchInput" class="border border-gray-300 rounded p-1 w-32" placeholder="Cari" onkeyup="filterTable()">
                                    </div>
                                </th>
                                <th class="border-b py-2">Jumlah</th> <!-- Kolom Jumlah Baru -->
                                <th class="border-b py-2">
                                    <div class="relative inline-flex items-center justify-center">
                                        <span class="ml-2">Tanggal Masuk</span>
                                        <button id="dropdownButton" class="ml-2">▼</button>
                                        <select id="monthDropdown" class="ml-2 border border-gray-300 rounded absolute left-full top-0 transform translate-x-4/5 -translate-y-1/4 z-10 hidden">
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
                                <td class="py-2">{{$i}}</td>
                                <td class="py-2">{{$post->nama_barang}}</td>
                                <td class="py-2">{{$post->sumber_dana}}</td>
                                <td class="py-2">1</td> <!-- Kolom Jumlah Baru -->
                                <td class="py-2">{{$post->tanggal}}</td>
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

    <!-- Script untuk filter berdasarkan input -->
    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("tbody");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2]; // Kolom Sumber Dana
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</x-layout>