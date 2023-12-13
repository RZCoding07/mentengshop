<aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="overflow-y-auto py-5 px-3 h-full bg-white">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg {{ request()->is('dashboard') ? 'bg-gray-100 text-blue-400' : '' }} group">
                        <ion-icon name="speedometer"
                            class="text-2xl text-gray-500 transition duration-75 group-hover:text-gray-900"></ion-icon>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard-products') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg {{ request()->is('dashboard/products*') ? 'bg-gray-100 text-blue-400' : '' }} group">
                        <ion-icon name="cube"
                            class="text-2xl text-gray-500 transition duration-75 group-hover:text-gray-900"></ion-icon>
                        <span class="ml-3">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard-orders') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg {{ request()->is('dashboard/orders*') ? 'bg-gray-100 text-blue-400' : '' }} group">
                        <ion-icon name="calendar"
                            class="text-2xl text-gray-500 transition duration-75 group-hover:text-gray-900"></ion-icon>
                        <span class="ml-3">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard-users') }}"
                        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg {{ request()->is('dashboard/users*') ? 'bg-gray-100 text-blue-400' : '' }} group">
                        <ion-icon name="people"
                            class="text-2xl text-gray-500 transition duration-75 group-hover:text-gray-900"></ion-icon>
                        <span class="ml-3">Users</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>