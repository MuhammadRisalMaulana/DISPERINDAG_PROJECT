@extends('layouts.masyarakat')

@section('title')
MADUKONCER | Dashboard
@endsection
@section('content')
<main class="h-full pb-16 overflow-y-auto">
  {{-- @foreach($liat as $li)
 <li>{{ $li->nik }}</li>
  @endforeach --}}
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
      Silahkan Ajukan Pengaduan Anda!
    </h2>


    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }} </li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="{{ route('pengaduan.store')}} " method="POST" enctype="multipart/form-data">
      @csrf

      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Laporan</span>
          <select
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            name="description" required>
            <option value="" disabled selected>Jenis Pengaduan</option>
            <option value="Barang Kadaluarsa">Barang Kadaluarsa</option>
            <option value="Barang Tidak Ber SNI">Barang Tidak Ber SNI</option>
            <option value="Barang Tidak Sesuai Takaran">Barang Tidak Sesuai Takaran</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </label>

        <label for="image" class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Bukti Foto</span>
          <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="file" value="{{ old('image')}}" name="image" required/>
        </label>
        <button type="submit"
          class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Laporkan
        </button>

      </div>
    </form>
</main>
@endsection