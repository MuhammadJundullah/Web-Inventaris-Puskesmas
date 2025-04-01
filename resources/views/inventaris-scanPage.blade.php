<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">
    <x-header>Informasi {{$postById['nama_barang']}}</x-header>
    <main class="flex-grow">

            {{-- isi --}}
        <div class="m-10 sm:mx-20 sm:px-5">
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Detail informasi data inventaris</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Nama</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$postById['nama_barang']}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Sumber dana</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$postById['sumber_dana']}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Merek barang</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$postById['merek']}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Tanggal masuk</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$postById['tanggal']}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Jumlah barang</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$postById['jumlah']}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Kondisi barang</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$postById['kondisi']}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Tempat barang</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$postById['kondisi']}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Tanggal di input</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{\Carbon\Carbon::parse($postById['created_at'])->format('d-m-Y')}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="font-medium leading-6 text-gray-900">Terakhir di ubah</dt>
                        <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{\Carbon\Carbon::parse($postById['updated_at'])->diffForHumans()}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="font-medium leading-6 text-gray-900">Foto Inventaris</dt>
                    <dd class="mt-2 text-gray-900 sm:col-span-2 sm:mt-0">
                        <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                            <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                <img class="rounded" src="{{ asset('storage/' . $postById['gambar']) }}" alt="gambar inventaris">
                            </li>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
    {{-- isi --}}

    </main>
    <x-footer></x-footer>
    <script src="//unpkg.com/alpinejs" defer></script> 

        {{-- javascript untuk mengirimkan data id ke modal --}}
    <script>
        let id;
        let tahun;

        function openDeleteModal(tahun, id) {            
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmDeleteButton').setAttribute('href', '/inventaris/audit/hapus/' + tahun + '/' + id);
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
    {{-- javascript untuk mengirimkan data id ke modal --}}

</body>
</html>











