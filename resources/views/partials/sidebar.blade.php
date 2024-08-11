<!-- Sidebar -->
<div class="flex">
    <aside class="w-64 bg-gray-800 min-h-screen">
        <div class="text-white text-lg font-bold p-4">E-Course</div>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="{{route('dashadmin')}}" class="flex items-center p-4 text-white  hover:bg-gray-700 {{ request()->is('dashadmin') ? 'bg-gray-900' : '' }}">
                        <span class="ml-3">Dashboard</span>
                    </a>
                    {{-- <a href="#" class="flex items-center p-4 text-white hover:bg-gray-700 {{ request()->is('kursus') ? 'bg-gray-900' : '' }}" >
                        <span class="ml-3">Kursus</span>
                    </a> --}}
                </li>
            </ul>
        </nav>
    </aside>