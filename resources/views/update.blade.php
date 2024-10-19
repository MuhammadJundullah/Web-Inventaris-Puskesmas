    <x-layout>
        <x-slot:title>{{$title}}</x-slot:title> 
        <x-slot:username>{{$username}}</x-slot:username>

    
    <div class="mt-10 mx-5 sm:mx-5 sm:px-20">
    
    {{-- parse tanggal untuk mengambil tahun --}}
        @php
        $tahun = \Carbon\Carbon::parse($inventory->tanggal)->format('Y');
        @endphp
    {{-- parse tanggal untuk mengambil tahun --}}
        
    {{-- form --}}
        <form class="mb-10" action="/audit/edit/{{$tahun}}/{{$inventory->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">

                {{-- modal success --}}
                  @if (session('success'))
                      <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4 mb-4">
                          <div class="flex items-start gap-4">
                              <div class="flex-1">
                                  <strong class="block font-medium text-{{session('success.warna')}}-600">{{session('success.pesan')}}</strong>
                                  {{-- <p class="mt-1 text-sm text-gray-700">{{ session('success') }}</p> --}}
                              </div>
                              <button class="text-gray-500 transition hover:text-gray-600" onclick="this.closest('div[role=\'alert\']').style.display='none'">
                                  <span class="sr-only">Dismiss popup</span>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                  </svg>
                              </button>
                          </div>
                      </div>
                  @endif
                {{-- modal success --}}

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Data Inventaris</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                    {{-- container --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        
                    <input type="hidden" name="gambarLama" value="{{$inventory->gambar}}">

                        {{-- input nama barang --}}
                        <div class="sm:col-span-4">
                        <label for="nama_barang" class="block text-sm font-medium leading-6 text-gray-900">Nama barang :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                <input type="text" name="nama_barang" id="nama_barang" autocomplete="nama_barang" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan nama barang" value="{{$inventory->nama_barang}}" required>
                                </div>
                            </div>
                        </div>

                        {{-- input sumber dana --}}
                        <div class="sm:col-span-4">
                            <label for="sumber_dana" class="block text-sm font-medium leading-6 text-gray-900">Sumber Dana :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input type="text" name="sumber_dana" id="sumber_dana" autocomplete="sumber_dana" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan sumber dana ", value="{{$inventory->sumber_dana}}" required>
                                </div>
                            </div>
                        </div>

                        {{-- input jumlah barang --}}
                        <div class="sm:col-span-4">
                            <label for="jumlah" class="block text-sm font-medium leading-6 text-gray-900">Jumlah :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input type="text" name="jumlah" id="jumlah" autocomplete="jumlah" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan jumlah barang " value="{{$inventory->jumlah}}" required>
                                </div>
                            </div>
                        </div>
                        
                        {{-- input tanggal masuk--}}
                        <div class="sm:col-span-4">
                            <label for="tanggal" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Masuk :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input type="date" name="tanggal" id="tanggal" autocomplete="tanggal" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{$inventory->tanggal}}" required>
                                </div>
                            </div>
                        </div>
                        
                        {{-- upload foto barang--}}
                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Upload Foto Inventaris :</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10" id="drop-area">
                                <div class="text-center">
                                    <svg id ="thumbnail" class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                    </svg>
                                    <div id="preview" class="mt-4">
                                        <img id="preview-image" class="rounded-md" src="" alt="Preview">
                                    </div>
                                    <div class="mt-4 text-sm leading-6 text-gray-600" id="upload-area">
                                        <label for="gambar" class="relative cursor-pointer rounded-md bg-white font-semibold text-green-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-green-600 focus-within:ring-offset-2 hover:text-green-500">
                                            <img id='gambarLama' src="{{ asset('storage/' . $inventory->gambar) }}" alt="" width="500px">
                                            <span id="uploadFile" >Ganti file</span>
                                            <input id="gambar" name="gambar" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)" value="{{$inventory->gambar}}">
                                        </label>
                                        {{-- <p class="pl-1">or drag and drop</p> --}}
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/dashboard"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
                <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Simpan</button>
            </div>
        </form>
    {{-- form --}}
    
    </div>


{{--  custom js untuk menampilkan preview pada saat upload gambar --}}
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("gambar").addEventListener("change", previewImage);
    });

    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById("preview");
        const previewImage = document.getElementById("preview-image");
        const uploadArea = document.getElementById("upload-area");
        const uploadFile = document.getElementById("uploadFile");
        const thumbnail = document.getElementById("thumbnail");
        const gambarLama = document.getElementById('gambarLama')

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                preview.style.display = "block"; 
                uploadFile.innerHTML = "Ganti File"
                uploadFile.style = "margin-auto"
                thumbnail.style.display = "none";
                gambarLama.style.display = "none";
                uploadArea.text= "center";
            };

            reader.onerror = function () {
                alert("Error reading file. Please try again.");
            };

            reader.readAsDataURL(file); 
        } else {
            previewImage.src = "";
            preview.style.display = "none"; 
            uploadArea.style.display = "block";
        }
    }
    </script>
{{--  custom js untuk menampilkan preview pada saat upload gambar --}}

    </x-layout>