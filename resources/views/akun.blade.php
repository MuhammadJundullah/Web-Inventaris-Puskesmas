<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
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
                            <td class="py-2"><a href="#" class="text-red-500 hover:underline">Hapus akun</a></td>
                        </tr>

                        @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</x-layout>