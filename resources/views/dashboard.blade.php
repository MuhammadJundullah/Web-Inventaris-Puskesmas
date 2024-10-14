<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>


    
    <div class="bg-white">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">

        {{-- tombol tambah data --}}
        <div class="mt-10 flex items-baseline">
          <x-nav-link href="/audit/tambah-data" :active="request()->is('dashboard')">+ Tambah Data</x-nav-link>
        </div>
        {{-- tombol tambah data --}}
        
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 sm:mt-5 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-5 ">
  
            @foreach ($years as $year)
            <article class="flex max-w-xl justify-center border rounded-md hover:text-slate-300">
                <div class="group relative">
                    <h3 class="my-3 text-lg  leading-6 text-black group-hover:text-gray-600"><a href="/inventory"><span class="absolute inset-0"></span>Inventaris Tahun {{$year}} &raquo;</a></h3>
                    {{-- <p class="line-clamp-3 text-sm leading-6 text-gray-600">Deskripsi.</p> --}}
                </div>
            </article>
            @endforeach  

    </div>
  </div>
</div>

</x-layout>