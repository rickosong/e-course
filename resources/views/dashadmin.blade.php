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
            <div class="p-6">
                <!-- Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="bg-gray-900 text-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Jumlah Pengguna</h3>
                        <p class="text-2xl">{{ $usersCount }}</p>
                    </div>
                    <div class="bg-gray-900 text-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Jumlah Kursus</h3>
                        <p class="text-2xl">{{ $coursesCount }}</p>
                    </div>
                    <div class="bg-gray-900 text-white p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">Jumlah Materi</h3>
                        <p class="text-2xl">{{ $materiCount }}</p>
                    </div>
                </div>

                <!-- Sections -->
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                    <div class="sm:col-span-12">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Semua Kursus</h3>
                                <button data-modal-target="crud-modal-create" data-modal-toggle="crud-modal-create" class="bg-blue-500 text-sm hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Tambah Kursus</button>
                            </div>
                            <!-- Kursus Card -->
                            <div class="grid grid-cols-1 gap-4 max-h-[350px] overflow-y-auto">
                                @foreach ($courses as $course)
                                <div class="bg-gray-100 p-4 rounded-lg flex">
                                    <img src="{{asset('/img')}}/{{$course->image }}" class="w-30 h-20 rounded-lg mr-4" alt="Kursus">     
                                    <div>
                                        <h4 class="text-lg font-semibold">{{ $course->judul }}</h4>
                                        <p class="text-gray-600">{{ Str::limit($course->deskripsi, 100) }}</p>
                                        <div class="flex space-x-2 pt-4">
                                            <a href="{{ route('materi', $course->id) }} " class="bg-blue-500 hover:bg-blue-600 text-white text-sm py-2 px-4 rounded">Tampilkan Materi</a>
                                            <a href="{{ route('kursus.edit', $course->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm py-2 px-4 rounded">Edit</a>
                                            <form action="{{ route('kursus.destroy', $course->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm py-2 px-4 rounded">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Tambahkan kursus lainnya di sini -->
                            </div>
                        </div>
                    </div>
                </div>

                    {{-- modal --}}
                    @include('partials.modal-course')
                

            </div>
        </div>
    </div>
</body>
</html>
