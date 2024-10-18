<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>

  {{-- custom css untuk tombol tambah/edit data--}}
    <style>
        .tombol {
            background-color: #16a085;
        }
    </style>
  {{-- custom css untuk tombol tambah/edit data--}}
 
    <div class="bg-white">
      <div class="mx-auto max-w-7xl px
      -6 lg:px-8">
        
      {{-- tombol tambah edit data --}}
        {{-- <div class="items-baseline mt-10 pt-2">
          <div class="flex items-center space-x-4">
            <a href="/audit/tambah" class="flex items-center">
              <button class="button p-2 rounded-lg flex items-center tombol text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add mr-2" viewBox="0 0 16 16">
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1" />
                  <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905" />
                </svg>
                <b>Tambah Data</b>
              </a> --}}
              {{-- <button class="button p-2 rounded-lg flex items-center tombol text-white"><b>Cetak Data</b></button> --}}
            {{-- </div>
          </div> --}}
      {{-- tombol tambah edit data --}}
          
      {{-- data inventaris pertahun --}}
        <div class="mx-auto mt-10 mb-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 sm:mt-5 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-5 ">
          @foreach ($years as $year)
          <article class="flex max-w-xl justify-center border rounded-md hover:text-slate-300">
            <div class="group relative">
              <h3 class="my-3 text-lg  leading-6 text-black group-hover:text-green-700"><a href="/inventory/{{ $year }}"><span class="absolute inset-0"></span>Inventaris Tahun {{$year}} &raquo;</a></h3>
              {{-- <p class="line-clamp-3 text-sm leading-6 text-gray-600">Deskripsi.</p> --}}
            </div>
          </article>
          @endforeach  
        </div>
      {{-- data inventaris pertahun --}}    
      </div>
    </div>

</x-layout>