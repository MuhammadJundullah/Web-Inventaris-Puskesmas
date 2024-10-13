    <x-layout>
        <x-slot:title>{{$title}}</x-slot:title>
        
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST">
            <div>
                <label for="barang" class="block text-sm font-medium leading-6 text-gray-900">Nama Barang :</label>
                <div class="mt-2">
                <input id="barang" name="barang" type="barang" autocomplete="barang" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Sumber Dana :</label>
                <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Masuk :</label>
                <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Foto barang :</label>
                <div class="mt-2">
                <input id="email" name="email" type="file"  required class="block w-full py-1.5">
                </div>
            </div>

        </form>
  </div>

    </x-layout>