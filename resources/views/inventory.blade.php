<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

<div class="mx-auto mt-11 text-center">
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse">
            <thead>
                <tr>
                    <th class="border-b py-2">No</th>
                    <th class="border-b py-2">Barang</th>
                    <th class="border-b py-2">Sumber Dana</th>
                    <th class="border-b py-2">Tanggal Masuk</th>
                    <th class="border-b py-2"></th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($posts as $post)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2">{{$i}}</td>
                    <td class="py-2">{{$post->nama_barang}}</td>
                    <td class="py-2">{{$post->sumber_dana}}</td>
                    <td class="py-2">{{$post->tanggal}}</td>
                    <td class="py-2"><a href="#" class="text-blue-500 hover:underline">Details</a></td>
                </tr>
                @php $i++; @endphp
                @endforeach 
            </tbody>
        </table>
    </div>
</div>



</x-layout>