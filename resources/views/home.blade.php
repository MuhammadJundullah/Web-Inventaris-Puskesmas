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

      <p class="hidden md:mt-4 md:block text-start">
        Website ini dirancang untuk memudahkan pengelolaan inventaris dan data staf di puskesmas. Dengan sistem yang terintegrasi, kami bertujuan untuk meningkatkan efisiensi dalam mengelola aset dan informasi tenaga kesehatan.
        <span>Fitur-fitur utama dalam website ini meliputi:</span>
        <ol class="text-start my-3">
          <li class="my-2">
            <b>Manajemen Inventaris:</b> Pencatatan dan pelacakan barang medis dan non-medis secara real-time.
          </li>
          <li>
            <b>Pengelolaan Data Staf:</b> Informasi lengkap tentang tenaga kesehatan yang mempermudah administrasi.
          </li>
          <li class="my-2">
            <b>Laporan Terintegrasi:</b> Kemudahan dalam menghasilkan laporan yang akurat dan terpercaya.
          </li>
        </ol>

        <div class="text-start">
          <span>Kami percaya bahwa teknologi dapat menjadi solusi untuk mendukung pelayanan kesehatan yang lebih baik dan terorganisir.</span>
          <span>Terima kasih telah menggunakan sistem ini. Semoga dapat memberikan manfaat bagi semua pihak yang terlibat dalam pelayanan kesehatan masyarakat.</span>
        </div>
      </p>

      <div class="flex gap-x-3">
        <div class="mt-4 md:mt-8">
          <a
            href="/inventaris/login"
            class="inline-block rounded bg-emerald-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-emerald-700 focus:outline-none focus:ring focus:ring-yellow-400"
          >
            Pengelolaan Inventaris
          </a>
        </div>
        <div class="mt-4 md:mt-8">
          <a
            href="#"
            class="inline-block rounded bg-emerald-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-emerald-700 focus:outline-none focus:ring focus:ring-yellow-400"
          >
            Pengelolaan Staff
          </a>
        </div>
        <div class="mt-4 md:mt-8">
          <a
            href="#"
            class="inline-block rounded bg-emerald-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-emerald-700 focus:outline-none focus:ring focus:ring-yellow-400"
          >
            Beri Masukan
          </a>
        </div>
      </div>

    </div>
  </div>

  <img
    alt=""
    src="{{asset('img/puskesmas.jpg')}}"
    class="h-full w-full object-cover sm:h-[calc(100%_-_2rem)] sm:self-end sm:rounded-ss-[30px] md:h-[calc(100%_-_4rem)] md:rounded-ss-[60px]"
  />
</section>

</div>
    
@vite('resources/js/app.js')
</body>
</html>