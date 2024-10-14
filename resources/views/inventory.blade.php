<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:p">
    <div class="my-10 sm:mx-auto sm:w-full">
        <div class="mx-auto mt-11 text-center">
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b py-2">No</th>
                            <th class="border-b py-2">Barang</th>
                            <th class="border-b py-2">Jumlah</th>
                            <th class="border-b py-2">
                                Sumber Dana
                                <input
                                    type="text"
                                    id="sumberDanaInput"
                                    placeholder="Cari Sumber Dana"
                                    class="ml-2 border border-gray-300 rounded"
                                    onkeyup="filterBySumberDana()" />
                            </th>
                            <th class="border-b py-2">
                                <div class="relative inline-flex items-center justify-center">
                                    <span>Tanggal Masuk</span>
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
                            <th class="border-b py-2"></th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        
                        @php $i = 1; @endphp

                        @foreach ($posts as $post)
                        <tr class="border-b hover:bg-gray-100" data-date="{{ \Carbon\Carbon::parse($post->tanggal)->format('Y-m') }}">
                            <td class="py-2">{{$i}}</td>
                            <td class="py-2">{{$post->nama_barang}}</td>
                            <td class="py-2">1</td>
                            <td class="py-2">{{$post->sumber_dana}}</td>
                            <td class="py-2">{{$post->tanggal}}</td>
                            <td class="py-2"><a href="/inventory/tahun/{{ $post->id }}" class="text-blue-500 hover:underline">Details</a></td>
                        </tr>

                        @php $i++; @endphp
         
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</x-layout>