<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>


    <div class="m-10 flex items-baseline">
      <x-nav-link href="/audit/tambah-data" :active="request()->is('dashboard')">+ Tambah Data</x-nav-link>
    </div>
    
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 sm:mt-5 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-5 ">
  
            @foreach ($years as $year)
            <article class="flex max-w-xl justify-center mt-5">
                <div class="group relative">
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-700 group-hover:text-gray-600"><a href="/inventory"><span class="absolute inset-0"></span>Inventaris Tahun {{$year}} &raquo;</a></h3>
                    {{-- <p class=" line-clamp-3 text-sm leading-6 text-gray-600">Deskripsi.</p> --}}
                </div>
            </article>
            @endforeach  

    </div>
  </div>
</div>

</x-layout>