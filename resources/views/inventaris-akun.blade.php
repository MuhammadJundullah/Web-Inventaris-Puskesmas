<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-slot:username>{{$username}}</x-slot:username>

  {{-- modal --}}
    <div class="relative z-10 hidden" id="deleteModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity backdrop-filter backdrop-blur-sm" aria-hidden="true"></div>
      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
          <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                  <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                  </svg>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Apakah Anda yakin untuk menghapus akun?</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">All about this account will be permanently removed. This action cannot be undone.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <a id="confirmDeleteButton" href="#" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Hapus</a>
              <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" onclick="closeDeleteModal()">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  {{-- modal --}}

  {{-- table --}}
    <div class="flex min-h-full flex-col justify-center sm:px-10 px-5 lg:p">      
      <div class="my-10 sm:mx-auto sm:w-full"> 

          {{-- modal alert --}}
            @if (session('failed')) 
              <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4 mt-5 ">
                <strong class="block font-medium text-red-800">{{Session('failed')}}</strong>
              </div>
            @endif
          {{-- modal alert --}}

          {{-- modal berhasil --}}
            @if (session("berhasil"))
            <div role="alert" class="rounded border-s-4 border-green-500 bg-green-50 p-4">
                  <span class="text-green-600 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <strong class="block font-medium text-green-600 ml-2">{{session('berhasil')}}</strong>
                  </span>
                </div>
            @endif
          {{-- modal berhasil --}}

            <div class="mx-auto mt-11 text-center">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b py-2">No</th>
                                <th class="border-b py-2">Username</th>
                                <th class="border-b py-2">Password</th>
                                <th class="border-b py-2"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @php $i = 1; @endphp
                            @foreach ($accounts as $account)
                            <tr>
                                <td class="py-2">{{$i}}</td>
                                <td class="py-2">{{$account->username}}</td>
                                <td class="py-2">*****</td>
                                <td class="py-2">
                                    <button onclick="openDeleteModal({{ $account->id }})"type="submit" class="group inline-flex items-center gap-1 text-sm font-medium text-red-600">
                                        Hapus
                                        <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                                        &rarr;
                                        </span>
                                    </button>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
  {{-- table --}}

  {{-- javascript untuk mengirimkan data id ke modal --}}
    <script>
        let accountIdToDelete;

        function openDeleteModal(accountId) {
            accountIdToDelete = accountId;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmDeleteButton').setAttribute('href', '/inventaris/hapus/' + accountId);
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
  {{-- javascript untuk mengirimkan data id ke modal --}}

</x-layout>