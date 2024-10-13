<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    {{-- <h1 class="text-3xl font-bold tracking-tight text-gray-500 mx-20 my-5">Tahun 2024</h1> --}}
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 sm:mt-5 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="flex items-center gap-x-4 text-xs">
                </div>
                <div class="group relative">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <a href="/inventory"><span class="absolute inset-0"></span>Inventaris Bulan Januari 2024</a>
                </h3>
                <p class=" line-clamp-3 text-sm leading-6 text-gray-600">Deskripsi.</p>
                </div>
                <div class="relative mt-8 flex items-center gap-x-4">
                </div>
            </article>
   
    </div>
  </div>
</div>

</x-layout>