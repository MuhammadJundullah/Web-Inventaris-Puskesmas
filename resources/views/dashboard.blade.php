<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>
 
  {{-- isi --}}
    <div class="bg-white">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
          
      {{-- data inventaris pertahun --}}
        <div class="mx-auto mt-10 mb-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-5 pt-10 sm:mt-5 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
          @foreach ($years as $year)
            <article
              class="rounded-lg border border-gray-100 bg-white p-4 shadow-sm transition hover:shadow-lg sm:p-6">
              <a href="inventory/{{$year}}">
                <h3 class="mt-0.5 text-lg font-medium text-gray-900">
                  Inventaris tahun {{$year}}
                </h3>
              </a>
              <a href="inventory/{{$year}}" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
                Details
                <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                  &rarr;
                </span>
              </a>
            </article>
          @endforeach  
        </div>
      {{-- data inventaris pertahun --}}    

      </div>
    </div>
  {{-- isi --}}

</x-layout>