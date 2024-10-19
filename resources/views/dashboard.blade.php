<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>
 
  {{-- isi --}}
    <div class="bg-white">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
          
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
  {{-- isi --}}

</x-layout>