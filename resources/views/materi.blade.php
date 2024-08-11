<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('partials.sidebar')

        <!-- Content Area -->
        <div class="flex-1">
            @include('partials.navadmin')

            <!-- Main Content -->
            <div class="mt-4 p-6">
                <!-- Sections -->
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                    <div class="sm:col-span-12">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-bold text-gray-800 mb-4">Judul Kursus : {{ $courseName }}</h2>
                                <button data-modal-target="crud-modal-create-materi" data-modal-toggle="crud-modal-create-materi" class="bg-blue-500 text-sm hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Tambah Materi</button>
                            </div>
                                <!-- materi Card -->
                                <div class="grid grid-cols-1 gap-4 max-h-[395px] overflow-y-auto">
                                    @forelse ($materis as $materi)
                                    <div class="bg-gray-100 p-4 rounded-lg flex">
                                        <img src="{{asset('/img')}}/{{$materi->image }}" class="w-30 h-20 rounded-lg mr-4" alt="Kursus">     
                                        <div>
                                            <h4 class="text-lg font-semibold">{{ $materi->judul }}</h4>
                                            <p class="text-gray-600">{{ Str::limit($materi->deskripsi, 100) }}</p>
                                            <div class="flex space-x-2 pt-4">
                                                <a href="{{route('materi.edit', $materi->id)}}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm py-2 px-4 rounded">Edit</a>
                                                <form action="{{ route('materi.destroy', $materi->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="course_id" value="{{ $courseId }}">
                                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Materi Ini?')" class="bg-red-500 hover:bg-red-600 text-white text-sm py-2 px-4 rounded">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="bg-gray-100 p-4 rounded-lg flex">
                                        <h4 class="text-sm font-regular">Belum ada Materi di Kursus ini</h4>
                                    </div>
                                    @endforelse
                                    <!-- Tambahkan kursus lainnya di sini -->
                                </div>
                                <div class="flex space-x-2 pt-4">
                                    <a href="{{route('dashadmin')}}"  class="bg-red-500 hover:bg-red-600 text-white text-sm py-2 px-4 rounded">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    {{-- modal --}}
                    @include('partials.modal-materi')
                

            </div>
        </div>
    </div>
</body>
</html>
