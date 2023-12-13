    <footer class="bg-slate-800 rounded-t-lg shadow">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="{{ url('/') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-white text-2xl font-semibold whitespace-nowrap">Menteng Shop</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-200 sm:mb-0">
                    <li>
                        <a href="{{ route('product') }}" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 sm:mx-auto border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-200 sm:text-center">© 2023 <a href="{{ url('/') }}" class="hover:underline">Menteng Shop™</a>. All Rights Reserved.</span>
        </div>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>