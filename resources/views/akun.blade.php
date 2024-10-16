<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

{{-- modal --}}
<div class="relative z-10 hidden" id="deleteModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

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
                <p class="text-sm text-gray-500">Are you sure you want to delete your account? All of your data will be permanently removed. This action cannot be undone.</p>
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

<div class="flex min-h-full flex-col justify-center px-6  lg:p">
    <div class="my-10 sm:mx-auto sm:w-full">
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
                                <button 
                                    class="text-red-500 hover:underline" 
                                    onclick="openDeleteModal({{ $account->id }})">
                                    Hapus akun
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
        document.getElementById('confirmDeleteButton').setAttribute('href', '/hapus/' + accountId);
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

{{-- javascript untuk mengirimkan data id ke modal --}}

</x-layout>