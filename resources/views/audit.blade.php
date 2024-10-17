    <x-layout>
        <x-slot:title>{{$title}}</x-slot:title> 

        {{-- content --}}
    <div class="mt-10 mx-10">
        <form class="mb-10" action="/audit/tambah-data" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Tambah Data Inventaris</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                    {{-- container --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        
                        {{-- input nama barang --}}
                        <div class="sm:col-span-4">
                        <label for="nama_barang" class="block text-sm font-medium leading-6 text-gray-900">Nama barang :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                <input type="text" name="nama_barang" id="nama_barang" autocomplete="nama_barang" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan nama barang ">
                                </div>
                            </div>
                        </div>

                        {{-- input sumber dana --}}
                        <div class="sm:col-span-4">
                            <label for="sumber_dana" class="block text-sm font-medium leading-6 text-gray-900">Sumber Dana :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input type="text" name="sumber_dana" id="sumber_dana" autocomplete="sumber_dana" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan sumber dana ">
                                </div>
                            </div>
                        </div>
                        
                        {{-- input tanggal masuk--}}
                        <div class="sm:col-span-4">
                            <label for="tanggal" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Masuk :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input type="date" name="tanggal" id="tanggal" autocomplete="tanggal" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                        
                        {{-- upload foto barang--}}
                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Upload Foto Inventaris :</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10" id="drop-area">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600" id="upload-area">
                                        <label for="gambar" class="relative cursor-pointer rounded-md bg-white font-semibold text-green-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-green-600 focus-within:ring-offset-2 hover:text-green-500">
                                            <span>Upload a file</span>
                                            <input id="gambar" name="gambar" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 2MB</p>
                                    <div id="preview" class="mt-4">
                                        <img id="preview-image" class="rounded-md" src="" alt="Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/dashboard"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
                <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Tambah</button>
            </div>
        </form>

    </div>

    </x-layout>