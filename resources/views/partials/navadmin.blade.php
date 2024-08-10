<!-- Navbar -->
<nav class="bg-gray-700 text-white p-4 flex justify-between items-center">
    <span class="text-md font-regular">Selamat datang, {{ auth()->user()->name }}</span>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2 px-4 rounded">Logout</button>
    </form>
</nav>