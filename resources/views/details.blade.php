<x-layout>
     <x-slot:title>{{$title}}</x-slot:title>
<div class="m-10">
    <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Detail informasi data inventaris</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
    </div>
    <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Nama</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$inventory->nama_barang}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Sumber dana</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$inventory->sumber_dana}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Tanggal masuk</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$inventory->tanggal}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Tanggal di input</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$inventory->created_at}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Terakhir di ubah</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$inventory->updated_at}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Foto Inventaris</dt>
            <dd class="mt-2 text-gray-900 sm:col-span-2 sm:mt-0">
            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                    <img class="rounded" src="{{ asset('storage/' . $inventory->gambar) }}" alt="gambar inventaris">
                </li>
            </ul>

            {{-- parse tanggal untuk mengambil tahun --}}
            @php
                $tahun = \Carbon\Carbon::parse($inventory->tanggal)->format('Y'); // Ambil tahun
            @endphp
            {{-- parse tanggal untuk mengambil tahun --}}

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/inventory/{{$tahun}}"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
                <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Edit</button>
            </div>
            </dd>


        </dl>
    </div>
</div>

</x-layout>