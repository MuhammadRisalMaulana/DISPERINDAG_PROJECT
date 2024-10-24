  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MADUKONCER | DISPERINDAG PAMEKASAN</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logoicon.png')}}">
    <style>
      html {
        scroll-behavior: smooth;
      }
    </style>
  </head>

  <body class="leading-normal tracking-normal" style="font-family: 'Montserrat', sans-serif">

    <nav class="flex items-center justify-between flex-wrap bg-green-200 p-7 px-20">
      <div class="flex items-center flex-shrink-0 text-black mr-6"> 
        <img src="{{ asset('img/logodisperindag.png')}}" alt="" class="w-12 h-12 mr-2 transform transition hover:scale-125 duration-300 ease-in-out" /> 
        <span class="font-bold tracking-wider text-xl"> &nbsp MADUKONCER</span> 
    </div>
    
      <div class="block lg:hidden">
        <button
          class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
          <div class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </div>
        </button>
      </div>
      <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-center">
        <div class="text-md lg:flex-grow">
          <a href="/" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
            Home
          </a>
          <a href="#tatacara" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
            Tata Cara
          </a>
        </div>
        <div>
          <button
            class="text-black font-normal rounded-md py-3 border-black px-4 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a href="{{ url('login')}}">Masuk</a>
          </button>
          <button
            class="text-black-500 font-medium rounded-md py-3 px-4 border-2 border-white focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a href="{{ url('register')}}">Daftar</a>
          </button>
        </div>
      </div>
    </nav>

    <!-- Header -->

    <!--Hero-->
    <div class="pt-24 px-16 bg-green-200">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left text-gray-800">
          <h1 class="my-4 text-4xl font-bold leading-tight">
            Layanan Pengawasan Barang / Jasa Beredar
          </h1>
          <p class="leading-normal text-1xl mb-8">
            LAPORKAN !!!<br><br>
            Apabila Barang Kadaluarsa, Barang tidak sesuai SNI, Barang dalam kondisi rusak, 
            Barang tidak mencantumkan tanggal produksi dan tanggal kadaluarsa, Barang tidak sesuai takaran.
            <br><br>
            Sampaikan laporan masalah Anda di sini, kami akan memprosesnya
            dengan cepat.
          </p>
          <button
            class="mx-auto lg:mx-0 bg-green-600 text-white font-bold rounded-md my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a href="{{ url('login')}}">LAPORKAN!!!</a>
          </button>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 text-center">
          <img class="object-fill mx-60 transform transition hover:scale-110 duration-300 ease-in-out"
            src="{{ asset('img/pamekasan.png')}}" />
        </div>
      </div>
    </div>

    <!-- tata cara -->
    <div id="tatacara" class="container my-20 mx-auto px-4 md:px-12">
      <div class="flex flex-wrap -mx-1 lg:-mx-4">
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
          <!-- Article -->
          <article class="overflow-hidden rounded-lg shadow-lg  text-gray-800">
            <img alt="Tulis"
              class="block h-auto w-full lg:w-28 mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
              src="{{ asset('img/tulis.svg')}}" />
            <header class="leading-tight p-2 md:p-4 text-center ">
              <h1 class="text-lg font-bold">1. Tulis Laporan</h1>
              <p class="text-grey-darker text-sm py-4">
                Tulis laporan keluhan Anda dengan jelas.
              </p>
            </header>
          </article>
          <!-- END Article -->
        </div>
        <!-- END Column -->
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
          <!-- Article -->
          <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
            <img alt="Proses"
              class="block h-auto w-full lg:w-28 mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
              src="{{ asset('img/processing.svg')}}" />
            <header class="leading-tight p-2 md:p-4 text-center">
              <h1 class="text-lg font-bold">2. Proses Verifikasi</h1>
              <p class="text-grey-darker text-sm py-4">
                Tunggu sampai laporan Anda di verifikasi.
              </p>
            </header>
          </article>
          <!-- END Article -->
        </div>
        <!-- END Column -->
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
          <!-- Article -->
          <article class="overflow-hidden rounded-lg shadow-lg  text-gray-800">
            <img alt="Ditindak"
              class="block h-auto w-full lg:w-28 mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
              src="{{ asset('img/act.svg')}}" />
            <header class="leading-tight p-2 md:p-4 text-center">
              <h1 class="text-lg font-bold">3. Tindak Lanjut</h1>
              <p class="text-grey-darker text-sm py-4">
                Laporan Anda sedang dalam tindak lanjut.
              </p>
            </header>
          </article>
          <!-- END Article -->
        </div>
        <!-- END Column -->
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
          <!-- Article -->
          <article class="overflow-hidden rounded-lg shadow-lg  text-gray-800">
            <img alt="Selesai"
              class="block h-auto w-full lg:w-28 mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
              src="{{ asset('img/verification.svg')}}" />
            <header class="leading-tight p-2 md:p-4 text-center">
              <h1 class="text-lg font-bold">4. Selesai</h1>
              <p class="text-grey-darker text-sm py-4">
                Laporan pengaduan telah selesai ditindak.
              </p>
            </header>
          </article>
          <!-- END Article -->
        </div>
        <!-- END Column -->
      </div>
    </div>
    <!-- Footer -->
    <footer class="text-center font-medium bg-green-200 py-5">
      © {{ now()->year }} MADUKONCER | By
      <a href="/" class="text-black-500" target="_blank">DISPERINDAG PAMEKASAN</a>
    </footer>
    @include('sweetalert::alert')
  </body>

  </html>