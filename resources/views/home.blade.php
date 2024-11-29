<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Information System - Puskesmas Muara Satu</title>
    @vite('resources/css/app.css')
</head>
<body>

<div>

<section class="overflow-hidden bg-gray-50 sm:grid sm:grid-cols-2 sm:items-center">
  <div class="p-8 md:p-12 lg:px-16 lg:py-24 text-gray-700">
    <div class="mx-auto max-w-xl max-h text-center ltr:sm:text-left rtl:sm:text-right">
      <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
        Website Information System Puskesmas Muara Satu.
      </h2>

      <div class="hidden md:mt-4 md:block text-justify leading-10">
        Website ini dirancang untuk memudahkan pengelolaan inventaris dan data staf di puskesmas. Dengan sistem yang terintegrasi, kami bertujuan untuk meningkatkan efisiensi dalam mengelola aset dan informasi tenaga kesehatan.
        <span>Fitur-fitur utama dalam website ini meliputi:</span>
        <ol class="text-start my-3">
          <li class="my-2">
            <b class="bg-emerald-600 hover:bg-emerald-700 text-white transition p-1 px-2 rounded shadow-sm"><a href="/inventaris/login">Manajemen Inventaris</a></b> Pencatatan dan pelacakan barang medis dan non-medis secara real-time.
          </li>
          <li>
            <b class="bg-emerald-600 hover:bg-emerald-700 text-white transition p-1 px-2 rounded shadow-sm"><a href="#">Pengelolaan Data Staff</a></b> Informasi lengkap tentang tenaga kesehatan yang mempermudah administrasi.
          </li>
          <li class="my-2">
            <b class="bg-emerald-600 hover:bg-emerald-700 text-white transition p-1 px-2 rounded shadow-sm"><a href="#">Laporan Terintegrasi</a></b> Kemudahan dalam menghasilkan laporan yang akurat dan terpercaya.
          </li>
        </ol>

        <div>
          <span>Kami percaya bahwa teknologi dapat menjadi solusi untuk mendukung pelayanan kesehatan yang lebih baik dan terorganisir.</span>
          <span>Terima kasih telah menggunakan sistem ini. Semoga dapat memberikan manfaat bagi semua pihak yang terlibat dalam pelayanan kesehatan masyarakat.</span>
        </div>
      </div>

    </div>
  </div>

  <img
    alt=""
    src="{{asset('img/puskesmas.jpg')}}"
    class="h-full w-full object-cover sm:h-[calc(100%_-_2rem)] sm:self-end sm:rounded-ss-[30px] md:h-[calc(100%_-_4rem)] md:rounded-ss-[60px] shadow-lg"
  />
</section>

<x-footer></x-footer>
</div>
    
@vite('resources/js/app.js')
</body>
</html>