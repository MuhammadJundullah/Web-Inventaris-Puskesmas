<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>

    <div class="m-10 mx-20 px-8">
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
                    <dt class="font-medium leading-6 text-gray-900">Jumlah barang</dt>
                    <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$inventory->jumlah}}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="font-medium leading-6 text-gray-900">Editor</dt>
                    <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$inventory->editor}}</dd>
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
                        $tahun = \Carbon\Carbon::parse($inventory->tanggal)->format('Y');
                        @endphp
                        {{-- parse tanggal untuk mengambil tahun --}}

                        <div class="mt-6 flex items-center justify-end gap-x-2">
                            <a href="/inventory/{{$tahun}}">
                                <button type="button" class="flex items-center text-sm font-semibold leading-6 text-gray-900 mr-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left mr-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                                    </svg>
                                    Kembali
                                </button>
                            </a>

                            <form action="/audit/hapus/{{$tahun}}/{{$inventory->id}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                @csrf
                                <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Hapus</button>
                            </form>

                            <a href="/audit/edit/{{$tahun}}/{{$inventory->id}}"><button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Edit</button></a>
                        </div>
                    </dd>
            </dl>
        </div>
    </div>

</x-layout>