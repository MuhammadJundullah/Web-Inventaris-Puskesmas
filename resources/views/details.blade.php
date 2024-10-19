<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>

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
        <div class="m-10 sm:mx-20 sm:px-5">

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

                            <div class="mt-6 flex items-center justify-between gap-x-2">

                                <a href="/inventory/{{$tahun}}">
                                    <button type="button" class="flex items-center text-sm font-semibold leading-6 text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left mr-2" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                                        </svg>
                                        Kembali
                                    </button>
                                </a>
            
                                <div class="flex gap-x-2 ml-auto">

                                    <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                        <a href="/audit/edit/{{$tahun}}/{{$inventory->id}}">
                                            <button class="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative" title="Edit Product">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                </svg>
                                            </button>
                                        </a>

                                        <button onclick="openDeleteModal('{{ $tahun }}', {{$inventory->id}})" class="inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative" title="Delete Product">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                            </svg>
                                        </button>
                                     </span>

                                </div>
                            </div>
                        </dd>
                </dl>
            </div>
        </div>
    {{-- isi --}}

    {{-- javascript untuk mengirimkan data id ke modal --}}
    <script>
        let id;
        let tahun;

        function openDeleteModal(tahun, id) {            
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmDeleteButton').setAttribute('href', '/audit/hapus/' + tahun + '/' + id);
        }


        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
    {{-- javascript untuk mengirimkan data id ke modal --}}

</x-layout>
