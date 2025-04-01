    <x-layout>
        <x-slot:title>{{$title}}</x-slot:title> 
        <x-slot:username>{{session('username')}}</x-slot:username>
    
    <div class="mt-10 mx-5 sm:mx-5 sm:px-20">
        
    {{-- form --}}
        <form class="mb-10" action="/bendahara/audit/edit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">

                {{-- modal success --}}
                  @if (session('info'))
                      <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4 mb-4">
                          <div class="flex items-start gap-4">
                            
                            @if (session('info.warna') == 'green')
                              <span class="text-{{session('info.warna')}}-600">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                              </span>
                            @endif
                            
                            @if (session('info.warna') == 'red')
                                <span class="text-{{session('info.warna')}}-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"/>
                                    </svg>
                                </span>
                            @endif
                  
                              <div class="flex-1 text-{{session('info.warna')}}-900">
                                  <strong class="block font-medium">{{session('info.pesan')}}</strong>
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
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Tambah Arsip</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                    {{-- container --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        
                        <input type="hidden" name="editor" value={{session("username")}}>
                        
                        <input type="hidden" name="id" value={{$data['id']}}>
                        
                        {{-- input Nama Pegawai --}}
                        <div class="sm:col-span-4">
                        <label for="nama_pegawai" class="block text-sm font-medium leading-6 text-gray-900">Kode Obat:</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                <input value="{{$data['nama_pegawai']}}" type="text" name="nama_pegawai" id="nama_pegawai" autocomplete="nama_pegawai" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan Nama Pegawai" required>
                                </div>
                            </div>
                        </div>

                        {{-- input Nama Pegawai --}}
                        <div class="sm:col-span-4">
                        <label for="id_pegawai" class="block text-sm font-medium leading-6 text-gray-900">Nama Obat :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                <input value={{$data['id_pegawai']}} type="text" name="id_pegawai" id="nama_pegawai" autocomplete="nip_pegawai" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan NIP Pegawai" required>
                                </div>
                            </div>
                        </div>

                        {{-- input Kegiatan --}}
                        <div class="sm:col-span-4">
                            <label for="kegiatan" class="block text-sm font-medium leading-6 text-gray-900">Jenis Obat :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input value="{{$data['kegiatan']}}" type="text" name="kegiatan" id="kegiatan" autocomplete="kegiatan" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan Kegiatan" required>
                                </div>
                            </div>
                        </div>

                        {{-- input Data yang digunakan --}}
                        <div class="sm:col-span-4">
                            <label for="dana_yang_digunakan" class="block text-sm font-medium leading-6 text-gray-900">Harga :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input value={{$data['dana_yang_digunakan']}} type="text" name="dana_yang_digunakan" id="dana_yang_digunakan" autocomplete="dana_yang_digunakan" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan Kegiatan" required>
                                </div>
                            </div>
                        </div>
                        
                        {{-- input tanggal masuk--}}
                        <div class="sm:col-span-4">
                            <label for="tanggal" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Keluar :</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input value={{$data['tanggal']}} type="date" name="tanggal" id="tanggal" autocomplete="tanggal" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" required>
                                </div>
                            </div>
                        </div>

                        {{-- input Data stok --}}
                        <div class="sm:col-span-4">
                            <label for="jumlah" class="block text-sm font-medium leading-6 text-gray-900">Stok obat:</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-green-600 sm:max-w-md">
                                    <input value={{$data['jumlah']}} type="text" name="jumlah" id="jumlah" autocomplete="jumlah" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan stok obat" required>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="javascript:history.back()">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                </a>
                <button type="submit" class="group inline-flex items-center gap-1 text-sm font-medium text-blue-600">
                    Simpan
                    <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                    &rarr;
                    </span>
                </button>
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

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                preview.style.display = "block"; 
                uploadFile.innerHTML = "Ganti File"
                uploadFile.style = "margin-auto"
                thumbnail.style.display = "none";
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
