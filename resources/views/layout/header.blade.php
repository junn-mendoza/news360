<header class=' z-[100] bg-black'>
    <div class='max-w-hd mx-auto container flex justify-between'>
        <div class="flex items-center space-x-2 md:space-x-10">
            <a href="/">
            <img src="/assets/logo.png" width='100' height='100' class="cursor-pointer object-contain" alt="NET25 Logo" />
            </a>
            <ul class="hidden space-x-4 md:flex">
                <li class="px-2 py-2 text-gray-300 dark:text-gray-400  font-montserrat">
                    <Link href="/news" class='hover:font-semibold'>NEWS</Link>
                </li>
                <li class="px-2 py-2 text-gray-300 dark:text-gray-400  font-montserrat">
                    <Link href="/entertainment" class='hover:font-semibold'>ENTERTAINMENT</Link>
                </li>
            </ul>
            <a href="/eaglefm955" class='hover:font-semibold flex items-center border-white border-opacity-40 dark:border-gray-800 border-solid border-2 py-1 px-5 rounded-full'>
            <image src={'/assets/eaglefm-menu1.png'} height={50} width={130} alt="Eagle FM" class='align-center relative' />
</a>
        </div>

        <div class="flex items-center space-x-4 text-sm font-light">
            <div class='hidden md:flex items-center '>
                <div class="flex space-x-4 items-center">
                    <div class='invisible lg:visible'>
                        {# <SocialMediaIcons /> #}
                    </div>
                   

                    {/*
                    <Link href="/" class="hidden lg:block"> */}
                    <form method="GET" action="/search">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <FontAwesomeIcon icon={faSearch} class='text-gray-400 dark:text-gray-800' />
                                </button>
                            </span>
                            <input type="search" name="q" class="font-bold py-2 text-sm text-white fill-net25-darkblue dark:bg-gray-400 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-950" placeholder="Search..." />
                        </div>
                    </form>
                    {/* </Link> */}
                    {/* <div>
                        <Link href="/" class="px-2 py-2 text-gray-300 dark:text-gray-400  font-montserrat">SIGN-IN</Link>
                    </div> */}
                </div>
            </div>


        </div>
    </div>
</header>