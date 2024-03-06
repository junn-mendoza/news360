<div
      class='bg-black'
    >
      <div class='grid grid-cols-1 lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 gap-3'>
        <div class='grid grid-cols-1  text-white dark:text-gray-500'>
          <div class='hidden md:block text-xl'>Connect With Us</div>
          <div class='mt-1'>
            <SocialMediaIcons footer={true} />
          </div>
        </div>
        <div class='hidden md:block text-xl'>
          <FooterText text='About Us' href='/aboutus' />
          <FooterText text='Contact Us' href='/contactus' />
          <FooterText text='Privacy Policy' href='/privacy' />
        </div>
        <div class='hidden md:block text-xl'>
          <FooterText text='Contact Sales' href='/contactus' />
          <FooterText text='Job Application' href='mailto:careers@net25.com' />
        </div>
        <div class='hidden lg:block text-xl'>
          <FooterText text='Partners' href='#' />
          
        </div>
        <div>
          <img
            class='w-14 sm:w-24 md:w-28'
            src='/assets/logo.png'
            alt='NET25 Logo'
          />
          <div class='pb-1 font-montserrat mt-1 text-xs text-white dark:text-gray-500'>
            Copyright © 2024 All right reserved
          </div>
          <div class='pb-1 font-montserrat mt-1 text-xs text-white dark:text-gray-500'>
            {# {Intl.DateTimeFormat().resolvedOptions().timeZone} #}
          </div>
        </div>
      </div>
    </div>