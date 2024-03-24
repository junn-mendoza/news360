<header class=' z-[100] bg-transparent'>
    <div class='max-w-hd mx-auto container flex justify-between'>
        <div class="flex items-center space-x-2 md:space-x-10">
            <a href="/">
                <img src="{{asset('assets/images/logo.svg') }}" width='200px' height='40' class="cursor-pointer object-contain py-3 my-3" alt="NET25 Logo" />
            </a>
            <ul class="hidden space-x-4 md:flex">
                <li class="px-2 py-2 text-gray-300 dark:text-gray-900 font-semibold  font-montserrat">
                    <a  href="/news" class='hover:text-gray-500'>NEWS</a>
                </li>
                <li class="px-2 py-2 text-gray-300 dark:text-gray-900 font-semibold font-montserrat">
                    <a href="/entertainment" class='hover:text-gray-500'>ENTERTAINMENT</a>
                </li>
            </ul>
            <a href="/eaglefm955" class='hover:font-semibold flex items-center bg-gray-300 border-opacity-40 border-gray-500 border-solid border-2 py-1 px-5 rounded-full'>
                <image src="{{ asset('assets/images/eaglefm-menu1.png') }}" height="50" width="130" alt="Eagle FM" class='align-center relative' />
            </a>
        </div>

        <div class="flex items-center space-x-4 text-sm font-light">
            <div class='hidden md:flex items-center '>
                <div class="flex space-x-4 items-center">
                    <div class='invisible lg:visible flex space-x-2'>
                        <a href="#" class="text-underline font-size-sm" target="_blank">
                            <img src="{{ asset('assets/ref/facebook.png') }}" width="32" height="32" />
                        </a>
                        <a href="#" class="text-underline font-size-sm" target="_blank">
                            <img src="{{ asset('assets/ref/instagram.png') }}" width="32" height="32" />
                        </a>
                        <a href="#" class="text-underline font-size-sm" target="_blank">
                            <img src="{{ asset('assets/ref/twitter.png') }}" width="32" height="32" />
                        </a>
                        <a href="#" class="text-underline font-size-sm" target="_blank">
                            <img src="{{ asset('assets/ref/youtube.png') }}" width="32" height="32" />
                        </a>
                        <a href="#" class="text-underline font-size-sm" target="_blank">
                            <img src="{{ asset('assets/ref/linkedin.png') }}" width="32" height="32" />
                        </a>
                        <a href="#" class="text-underline font-size-sm" target="_blank">
                            <img src="{{ asset('assets/ref/tiktok.png') }}" width="32" height="32" />
                        </a>
                    </div>



                    <Link href="/" class="hidden lg:block">
                    <form method="GET" action="/search">
                        <div>
                            
                            <div class="relative mt-2 rounded-full shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    

                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email" class="block w-full rounded-full border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="search latest news">
                            </div>
                        </div>
                    </form>
                    </Link>
                    
                </div>
            </div>


        </div>
    </div>
</header>