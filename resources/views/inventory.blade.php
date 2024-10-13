<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
<div class="mx-auto max-w-7xl px-6 lg:px-8 mt-11 text-center">
    <table class="table-fixed w-full">
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Sumber Dana</th>
                <th>Tanggal Masuk</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Komputer</td>
                <td>Pemerintah</td>
                <td>10 Januari 2024</td>
                <td>Komputer.jpg</td>
                <td>
                    <a href="/auditData"><button class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded">Ubah</button></a>
                    <a href=""><button class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded">Hapus</button></a>
                </td>
            </tr>
       
        </tbody>
    </table>
</div>

</x-layout>