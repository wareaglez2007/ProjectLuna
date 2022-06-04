<div x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-white">
    <!-- Mobile menu -->

    <div x-show="open" class="fixed inset-0 z-40 flex lg:hidden"
        x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
        aria-modal="true" style="display: none;">

        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
            class="fixed inset-0 bg-black bg-opacity-25" @click="open = false" aria-hidden="true"
            style="display: none;">
        </div>



        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            x-description="Off-canvas menu, show/hide based on off-canvas menu state."
            class="relative flex flex-col w-full max-w-xs pb-12 overflow-y-auto bg-white shadow-xl"
            style="display: none;">
            <div class="flex px-4 pt-5 pb-2">
                <button type="button" class="inline-flex items-center justify-center p-2 -m-2 text-gray-400 rounded-md"
                    @click="open = false">
                    <span class="sr-only">Close menu</span>
                    <svg class="w-6 h-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Links -->
            <div class="mt-2" x-data="Components.tabs()" @tab-click.window="onTabClick"
                @tab-keydown.window="onTabKeydown">
                <div class="border-b border-gray-200">
                    <div class="flex px-4 -mb-px space-x-8" aria-orientation="horizontal" role="tablist">

                        <button id="tabs-1-tab-1"
                            class="flex-1 px-1 py-4 text-base font-medium text-indigo-600 border-b-2 border-indigo-600 whitespace-nowrap"
                            x-state:on="Selected" x-state:off="Not Selected"
                            :class="{ 'text-indigo-600 border-indigo-600': selected, 'text-gray-900 border-transparent': !(selected) }"
                            x-data="Components.tab(0)" aria-controls="tabs-1-panel-1" role="tab" x-init="init()"
                            @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect"
                            :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button"
                            tabindex="0" aria-selected="true">
                            Women
                        </button>

                        <button id="tabs-1-tab-2"
                            class="flex-1 px-1 py-4 text-base font-medium text-gray-900 border-b-2 border-transparent whitespace-nowrap"
                            x-state:on="Selected" x-state:off="Not Selected"
                            :class="{ 'text-indigo-600 border-indigo-600': selected, 'text-gray-900 border-transparent': !(selected) }"
                            x-data="Components.tab(0)" aria-controls="tabs-1-panel-2" role="tab" x-init="init()"
                            @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect"
                            :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button"
                            tabindex="-1" aria-selected="false">
                            Men
                        </button>

                    </div>
                </div>


                <div id="tabs-1-panel-1" class="px-4 pt-10 pb-8 space-y-10"
                    x-description="'Women' tab panel, show/hide based on tab state." x-data="Components.tabPanel(0)"
                    aria-labelledby="tabs-1-tab-1" x-init="init()" x-show="selected" @tab-select.window="onTabSelect"
                    role="tabpanel" tabindex="0">
                    <div class="grid grid-cols-2 gap-x-4">

                        <div class="relative text-sm group">
                            <div
                                class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                                    alt="Models sitting back to back, wearing Basic Tee in black and bone."
                                    class="object-cover object-center">
                            </div>
                            <a href="#" class="block mt-6 font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                New Arrivals
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                        </div>

                        <div class="relative text-sm group">
                            <div
                                class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                                    alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                                    class="object-cover object-center">
                            </div>
                            <a href="#" class="block mt-6 font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                Basic Tees
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                        </div>

                    </div>

                    <div>
                        <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">
                            Clothing
                        </p>
                        <ul role="list" aria-labelledby="women-clothing-heading-mobile"
                            class="flex flex-col mt-6 space-y-6">

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Tops
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Dresses
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Pants
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Denim
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Sweaters
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    T-Shirts
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Jackets
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Activewear
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Browse All
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div>
                        <p id="women-accessories-heading-mobile" class="font-medium text-gray-900">
                            Accessories
                        </p>
                        <ul role="list" aria-labelledby="women-accessories-heading-mobile"
                            class="flex flex-col mt-6 space-y-6">

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Watches
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Wallets
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Bags
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Sunglasses
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Hats
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Belts
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div>
                        <p id="women-brands-heading-mobile" class="font-medium text-gray-900">
                            Brands
                        </p>
                        <ul role="list" aria-labelledby="women-brands-heading-mobile"
                            class="flex flex-col mt-6 space-y-6">

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Full Nelson
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    My Way
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Re-Arranged
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Counterfeit
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Significant Other
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>

                <div id="tabs-1-panel-2" class="px-4 pt-10 pb-8 space-y-10"
                    x-description="'Men' tab panel, show/hide based on tab state." x-data="Components.tabPanel(0)"
                    aria-labelledby="tabs-1-tab-2" x-init="init()" x-show="selected" @tab-select.window="onTabSelect"
                    role="tabpanel" tabindex="0" style="display: none;">
                    <div class="grid grid-cols-2 gap-x-4">

                        <div class="relative text-sm group">
                            <div
                                class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg"
                                    alt="Drawstring top with elastic loop closure and textured interior padding."
                                    class="object-cover object-center">
                            </div>
                            <a href="#" class="block mt-6 font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                New Arrivals
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                        </div>

                        <div class="relative text-sm group">
                            <div
                                class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg"
                                    alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt."
                                    class="object-cover object-center">
                            </div>
                            <a href="#" class="block mt-6 font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                Artwork Tees
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                        </div>

                    </div>

                    <div>
                        <p id="men-clothing-heading-mobile" class="font-medium text-gray-900">
                            Clothing
                        </p>
                        <ul role="list" aria-labelledby="men-clothing-heading-mobile"
                            class="flex flex-col mt-6 space-y-6">

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Tops
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Pants
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Sweaters
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    T-Shirts
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Jackets
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Activewear
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Browse All
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div>
                        <p id="men-accessories-heading-mobile" class="font-medium text-gray-900">
                            Accessories
                        </p>
                        <ul role="list" aria-labelledby="men-accessories-heading-mobile"
                            class="flex flex-col mt-6 space-y-6">

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Watches
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Wallets
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Bags
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Sunglasses
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Hats
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Belts
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div>
                        <p id="men-brands-heading-mobile" class="font-medium text-gray-900">
                            Brands
                        </p>
                        <ul role="list" aria-labelledby="men-brands-heading-mobile"
                            class="flex flex-col mt-6 space-y-6">

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Re-Arranged
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Counterfeit
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    Full Nelson
                                </a>
                            </li>

                            <li class="flow-root">
                                <a href="#" class="block p-2 -m-2 text-gray-500">
                                    My Way
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>


            </div>

            <div class="px-4 py-6 space-y-6 border-t border-gray-200">

                <div class="flow-root">
                    <a href="#" class="block p-2 -m-2 font-medium text-gray-900">Company</a>
                </div>

                <div class="flow-root">
                    <a href="#" class="block p-2 -m-2 font-medium text-gray-900">Stores</a>
                </div>

            </div>

            <!---Mobile login and register-->
            @if (Route::has('login'))
            <div class="px-4 py-6 space-y-6 border-t border-gray-200">
                @if (Route::has('login'))
                {{-- <div> --}}
                    @auth
                    <div class="flow-root">
                        <a href="{{ route('dashboard') }}" class="block p-2 -m-2 font-medium text-gray-900">{{
                            __('Dashboard') }}</a>
                    </div>
                    @else
                    <div class="flow-root">
                        <a href="{{ route('login') }}" class="block p-2 -m-2 font-medium text-gray-900">Sign
                            in</a>

                    </div>
                    @if (Route::has('register'))
                    <div class="flow-root">
                        <span class="w-px h-6 bg-gray-200" aria-hidden="true"></span>
                        <a href="{{ route('register') }}" class="block p-2 -m-2 font-medium text-gray-900">Create
                            account</a>
                    </div>
                    @endif
                    @endauth
                    {{--
                </div> --}}
                @endif
            </div>
            @endif
            <!-- End mobile login and register-->



            <div class="px-4 py-6 border-t border-gray-200">
                <a href="#" class="flex items-center p-2 -m-2">
                    <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt=""
                        class="flex-shrink-0 block w-5 h-auto">
                    <span class="block ml-3 text-base font-medium text-gray-900">
                        CAD
                    </span>
                    <span class="sr-only">, change currency</span>
                </a>
            </div>
        </div>

    </div>
    <!-- END of Mobile menu -->

    <header class="relative z-10 bg-white">
        <p
            class="flex items-center justify-center h-10 px-4 text-sm font-medium text-white bg-indigo-600 sm:px-6 lg:px-8">
            Get free delivery on orders over $100
        </p>

        <nav aria-label="Top" class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="border-b border-gray-200">
                <div class="flex items-center h-16">
                    <button type="button" x-description="Mobile menu toggle, controls the 'mobileMenuOpen' state."
                        class="p-2 text-gray-400 bg-white rounded-md lg:hidden" @click="open = true">
                        <span class="sr-only">Open menu</span>
                        <svg class="w-6 h-6" x-description="Heroicon name: outline/menu"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Logo -->
                    <div class="flex ml-4 lg:ml-0">
                        <a href="#">
                            <span class="sr-only">Workflow</span>
                            <img class="w-auto h-8"
                                src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&amp;shade=600"
                                alt="">
                        </a>
                    </div>

                    <!-- Flyout menus -->
                    <div class="hidden lg:ml-8 lg:block lg:self-stretch" x-init="init()">
                        <div class="flex h-full space-x-8">

                            <div class="flex" x-data="{ open: false, focus: false }" x-init="init()">
                                <div class="relative flex">
                                    <button type="button" x-state:on="Item active" x-state:off="Item inactive"
                                        class="relative z-10 flex items-center pt-px -mb-px text-sm font-medium text-gray-700 transition-colors duration-200 ease-out border-b-2 border-transparent hover:text-gray-800"
                                        :class="{ 'border-indigo-600 text-indigo-600': open, 'border-transparent text-gray-700 hover:text-gray-800': !(open) }"
                                        x-on:click="open = ! open" aria-expanded="false"
                                        :aria-expanded="open.toString()">
                                        Women
                                    </button>
                                </div>


                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    x-description="'Women' flyout menu, show/hide based on flyout menu state."
                                    class="absolute inset-x-0 text-sm text-gray-500 top-full" x-ref="panel"
                                    @click.away="open = false" style="display: none;">
                                    <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                    <div class="absolute inset-0 bg-white shadow top-1/2" aria-hidden="true"></div>

                                    <div class="relative bg-white">
                                        <div class="px-8 mx-auto max-w-7xl">
                                            <div class="grid grid-cols-2 py-16 gap-y-10 gap-x-8">
                                                <div class="grid grid-cols-2 col-start-2 gap-x-8">

                                                    <div class="relative text-base group sm:text-sm">
                                                        <div
                                                            class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                                                                alt="Models sitting back to back, wearing Basic Tee in black and bone."
                                                                class="object-cover object-center">
                                                        </div>
                                                        <a href="#" class="block mt-6 font-medium text-gray-900">
                                                            <span class="absolute inset-0 z-10"
                                                                aria-hidden="true"></span>
                                                            New Arrivals
                                                        </a>
                                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                                    </div>

                                                    <div class="relative text-base group sm:text-sm">
                                                        <div
                                                            class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                                                                alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                                                                class="object-cover object-center">
                                                        </div>
                                                        <a href="#" class="block mt-6 font-medium text-gray-900">
                                                            <span class="absolute inset-0 z-10"
                                                                aria-hidden="true"></span>
                                                            Basic Tees
                                                        </a>
                                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                                    </div>

                                                </div>
                                                <div class="grid grid-cols-3 row-start-1 text-sm gap-y-10 gap-x-8">

                                                    <div>
                                                        <p id="Clothing-heading" class="font-medium text-gray-900">
                                                            Clothing
                                                        </p>
                                                        <ul role="list" aria-labelledby="Clothing-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Tops
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Dresses
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Pants
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Denim
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Sweaters
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    T-Shirts
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Jackets
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Activewear
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Browse All
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <div>
                                                        <p id="Accessories-heading" class="font-medium text-gray-900">
                                                            Accessories
                                                        </p>
                                                        <ul role="list" aria-labelledby="Accessories-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Watches
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Wallets
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Bags
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Sunglasses
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Hats
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Belts
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <div>
                                                        <p id="Brands-heading" class="font-medium text-gray-900">
                                                            Brands
                                                        </p>
                                                        <ul role="list" aria-labelledby="Brands-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Full Nelson
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    My Way
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Re-Arranged
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Counterfeit
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Significant Other
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="flex" x-data="{ open: false, focus: false }" x-init="init()">
                                <div class="relative flex">
                                    <button type="button" x-state:on="Item active" x-state:off="Item inactive"
                                        class="relative z-10 flex items-center pt-px -mb-px text-sm font-medium text-gray-700 transition-colors duration-200 ease-out border-b-2 border-transparent hover:text-gray-800"
                                        :class="{ 'border-indigo-600 text-indigo-600': open, 'border-transparent text-gray-700 hover:text-gray-800': !(open) }"
                                        x-on:click="open = ! open" aria-expanded="false"
                                        :aria-expanded="open.toString()">
                                        Men
                                    </button>
                                </div>


                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    x-description="'Men' flyout menu, show/hide based on flyout menu state."
                                    class="absolute inset-x-0 text-sm text-gray-500 top-full" x-ref="panel"
                                    @click.away="open = false" style="display: none;">
                                    <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                    <div class="absolute inset-0 bg-white shadow top-1/2" aria-hidden="true"></div>

                                    <div class="relative bg-white">
                                        <div class="px-8 mx-auto max-w-7xl">
                                            <div class="grid grid-cols-2 py-16 gap-y-10 gap-x-8">
                                                <div class="grid grid-cols-2 col-start-2 gap-x-8">

                                                    <div class="relative text-base group sm:text-sm">
                                                        <div
                                                            class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg"
                                                                alt="Drawstring top with elastic loop closure and textured interior padding."
                                                                class="object-cover object-center">
                                                        </div>
                                                        <a href="#" class="block mt-6 font-medium text-gray-900">
                                                            <span class="absolute inset-0 z-10"
                                                                aria-hidden="true"></span>
                                                            New Arrivals
                                                        </a>
                                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                                    </div>

                                                    <div class="relative text-base group sm:text-sm">
                                                        <div
                                                            class="overflow-hidden bg-gray-100 rounded-lg aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg"
                                                                alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt."
                                                                class="object-cover object-center">
                                                        </div>
                                                        <a href="#" class="block mt-6 font-medium text-gray-900">
                                                            <span class="absolute inset-0 z-10"
                                                                aria-hidden="true"></span>
                                                            Artwork Tees
                                                        </a>
                                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                                    </div>

                                                </div>
                                                <div class="grid grid-cols-3 row-start-1 text-sm gap-y-10 gap-x-8">

                                                    <div>
                                                        <p id="Clothing-heading" class="font-medium text-gray-900">
                                                            Clothing
                                                        </p>
                                                        <ul role="list" aria-labelledby="Clothing-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Tops
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Pants
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Sweaters
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    T-Shirts
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Jackets
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Activewear
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Browse All
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <div>
                                                        <p id="Accessories-heading" class="font-medium text-gray-900">
                                                            Accessories
                                                        </p>
                                                        <ul role="list" aria-labelledby="Accessories-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Watches
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Wallets
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Bags
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Sunglasses
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Hats
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Belts
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                    <div>
                                                        <p id="Brands-heading" class="font-medium text-gray-900">
                                                            Brands
                                                        </p>
                                                        <ul role="list" aria-labelledby="Brands-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Re-Arranged
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Counterfeit
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    Full Nelson
                                                                </a>
                                                            </li>

                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">
                                                                    My Way
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a href="#"
                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Company</a>

                            <a href="#"
                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Stores</a>

                        </div>
                    </div>
                    @if (Route::has('login'))
                    <div class="flex items-center ml-auto">
                        @if (Route::has('login'))
                        <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                            @auth
                            <a href="{{ route('dashboard') }}"
                                class="text-sm font-medium text-gray-700 hover:text-gray-800">{{ __('Dashboard') }}</a>
                            @else
                            <a href="{{ route('login') }}"
                                class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
                            @if (Route::has('register'))
                            <span class="w-px h-6 bg-gray-200" aria-hidden="true"></span>
                            <a href="{{ route('register') }}"
                                class="text-sm font-medium text-gray-700 hover:text-gray-800">Create
                                account</a>
                            @endif
                            @endauth


                        </div>
                        @endif
                    </div>
                    @endif

                    <div class="hidden lg:ml-8 lg:flex">
                        <a href="#" class="flex items-center text-gray-700 hover:text-gray-800">
                            <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt=""
                                class="flex-shrink-0 block w-5 h-auto">
                            <span class="block ml-3 text-sm font-medium">
                                CAD
                            </span>
                            <span class="sr-only">, change currency</span>
                        </a>
                    </div>

                    <!-- Search -->
                    <div class="flex lg:ml-6">
                        <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Search</span>
                            <svg class="w-6 h-6" x-description="Heroicon name: outline/search"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- Cart -->
                    <div class="flow-root ml-4 lg:ml-6">
                        <a href="#" class="flex items-center p-2 -m-2 group">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-400 group-hover:text-gray-500"
                                x-description="Heroicon name: outline/shopping-bag" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                            <span class="sr-only">items in cart, view bag</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
