@extends('layouts.admin')

@section('title')
    MADUKONCER | Data Masyarakat
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Data Masyarakat
            </h2>

            @if (session('success'))
                <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Alamat</th>
                                <th class="px-4 py-3">No. Hp</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($data as $masyarakat)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $masyarakat->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $masyarakat->alamat }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $masyarakat->phone }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $masyarakat->email }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <button onclick="hapusData({{ $masyarakat->id }})"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-gray-400">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </main>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.all.min.js"></script>
    <!-- jQuery Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function hapusData(id) {
            // Konfirmasi penghapusan menggunakan SweetAlert2
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengirim permintaan AJAX untuk menghapus data
                    $.ajax({
                        url: 'masyarakat/{id}' + id, // Sesuaikan dengan route destroy Anda
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}', // Menyertakan CSRF Token
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Terhapus!',
                                    response.message,
                                    'success'
                                );
                                // Menghapus baris tabel yang bersangkutan
                                $('tr').filter(function() {
                                    return $(this).find('td').eq(0).text() == response.name;
                                }).remove();
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan, coba lagi!',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endsection
