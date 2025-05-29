@include('header')
    <main class="container mx-auto mt-20">        <section id="about" class="bg-white max-h-fit dark:bg-gray-900">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1
                        class="max-w-2xl mb-4 text-amber-400 text text-white-sm font-light font-paragraph uppercase md:text-sm xl:text-sm animate-fade-in-up delay-200">
                        Transforming Ideas
                        into Digital
                        Excellence </h1>
                    <h1
                        class="max-w-2xl mb-4 text-4xl text-gray-800 dark:text-white font-extrabold font-accent uppercase md:text-5xl xl:text-6xl animate-fade-in-up delay-300">
                        from design to <span class="gradient-text">development</span>
                    </h1>
                    <p
                        class="max-w-2xl mb-6 font-light font-paragraph text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400 animate-fade-in-up delay-400">
                        We offer you the services you need to elevate your business. Our
                        custom websites, marketing assets, and branding solutions ensure <br> <span id="roll"
                            class="text-amber-500 gradient-text animate-pulse-trust">speed,</span> turning ideas into impactful digital experiences. </p>
                    
                    <!-- Trust indicators -->
                    <div class="flex items-center space-x-8 mb-6 animate-fade-in-up delay-500">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-amber-500 gradient-text" id="projects-count">0</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Projects Completed</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-amber-500 gradient-text" id="clients-count">0</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Happy Clients</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-amber-500 gradient-text" id="years-count">0</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Years Experience</div>
                        </div>
                    </div>

                    <div class="animate-fade-in-up delay-600">
                        <a href="#services"
                            class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-900 trust-card glow-effect transition-all duration-300">
                            Explore Services
                            <svg class="w-5 h-5 ml-2 -mr-1 transition-transform duration-300 group-hover:translate-x-1" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#contact"
                            class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-amber-500 rounded-lg hover:bg-amber-100 focus:ring-4 focus:ring-amber-100 dark:text-white dark:border-amber-500 dark:hover:bg-amber-500 dark:focus:ring-amber-800 trust-card transition-all duration-300">
                            Speak to Sales
                        </a>
                    </div>
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex animate-fade-in-right delay-700">
                    <svg viewBox="0 0 50 70" class="liquid-svg">
                        <circle cx="25" cy="25" r="25" fill="#fbbf24" class="liquid-circle"></circle>
                        <circle cx="75" cy="75" r="25" fill="#f97316" class="liquid-circle"></circle>
                        <circle cx="50" cy="50" r="25" fill="#ffffff" class="liquid-circle"></circle>
                    </svg>
                </div>
            </div>
        </section>        <section id="projects" class="bg-white max-h-fit dark:bg-gray-900">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
                <div class="max-w-2xl mx-auto text-center animate-fade-in-up">
                    <h2
                        class="text-3xl font-accent uppercase font-extrabold leading-tight tracking-tight text-gray-900 sm:text-4xl dark:text-white gradient-text">
                        Our Recent <span class="text-amber-500">Projects</span>
                    </h2>
                    <p class="mt-4 text-base font-paragraph font-normal text-gray-500 sm:text-xl dark:text-gray-400 animate-fade-in-up delay-200">
                        Cheerio Studio has worked with a variety of clients to create custom websites, marketing assets,
                        and branding solutions. Here are some of our recent projects.
                    </p>
                </div>                <div class="mt-12 space-y-16 sm:mt-16">
                    <div class="flex flex-col lg:items-center lg:flex-row gap-y-8 sm:gap-y-12 lg:gap-x-16 xl:gap-x-24 trust-card animate-fade-in-left delay-300">
                        <div class="overflow-hidden rounded-lg animate-scale-in delay-400">
                            <img class="object-cover w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-500"
                                src="{{ asset('assets/projects/archovia/proj.thmbnl-archovia.webp') }}" alt="archovia website">

                        </div>

                        <div class="w-full space-y-6 lg:max-w-lg shrink-0 xl:max-w-2xl animate-fade-in-right delay-500">
                            <div class="space-y-3">
                                <h3
                                    class="text-3xl font-accent uppercase font-bold leading-tight text-gray-900 sm:text-4xl dark:text-white gradient-text">                                    Project <span class="text-amber-500">Archovia</span> <span class="normal-case text-amber-400 text-sm animate-pulse-trust"> (Ongoing
                                        Project) </span>
                                </h3>
                                <a href="https://www.archovia.com/" title="archovia"
                                    class="inline-flex items-center text-lg font-medium text-amber-500 hover:text-amber-600 hover:underline glow-effect transition-all duration-300">
                                    https://www.archovia.com/
                                    <svg aria-hidden="true" class="w-5 h-5 ml-2.5 transition-transform duration-300 hover:translate-x-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path
                                            d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>
                                </a>
                                <p
                                    class="text-base font-paragraph font-normal text-gray-500 sm:text-lg dark:text-gray-400">
                                    Archovia is an architecture and interior design company with over 20 years of
                                    experience. The company specializes in innovative, sustainable, and timeless designs
                                    for residential and commercial spaces.
                                </p>
                            </div>

                            <div class="flex items-center gap-2.5 animate-fade-in-up delay-600">
                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 trust-card">
                                    <img data-tooltip-target="tooltip-logo-html5" class="object-contain w-auto h-8"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/html5.svg"
                                        alt="">
                                </div>
                                <div id="tooltip-logo-html5" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    HTML5
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-css3" class="object-contain w-auto h-8"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/css-3.svg"
                                        alt="">
                                </div>
                                <div id="tooltip-logo-css3" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    CSS3
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-javascript" class="object-contain w-auto h-8"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/javascript.svg"
                                        alt="">
                                </div>
                                <div id="tooltip-logo-javascript" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    JavaScript
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-tailwind-css"
                                        class="object-contain w-auto h-8"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/tailwind-css.svg"
                                        alt="">
                                </div>
                                <div id="tooltip-logo-tailwind-css" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Tailwind CSS
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-adobe-cc" class="object-contain w-auto h-8"
                                        src="{{ asset('assets/svg/adobe-cc.svg') }}" alt="">
                                </div>
                                <div id="tooltip-logo-adobe-cc" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Adobe Creative Cloud
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>

                            <a href="#" title=""
                                class="text-white bg-primary-700 justify-center hover:bg-primary-800 inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                role="button">
                                View case study
                                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>                    <div class="flex flex-col lg:items-center lg:flex-row gap-y-8 sm:gap-y-12 lg:gap-x-16 xl:gap-x-24 trust-card animate-fade-in-right delay-700">                        <div class="lg:order-2 overflow-hidden rounded-lg animate-scale-in delay-800">
                            <img class="object-cover w-full rounded-lg shadow-lg hover:scale-105 transition-transform duration-500"
                                src="{{ asset('assets/projects/envanter/proj.thmbnl-envanter.webp') }}" alt="envanter">
                        </div>

                        <div class="w-full space-y-6 lg:max-w-lg shrink-0 xl:max-w-2xl lg:order-1 animate-fade-in-left delay-900">
                            <div class="space-y-3">
                                <h3
                                    class="text-3xl font-bold font-accent uppercase leading-tight text-gray-900 sm:text-4xl dark:text-white gradient-text">                                    <span class="text-amber-500">Envanter</span><span class="normal-case text-amber-400 text-sm animate-pulse-trust"> (Ongoing
                                        Project) </span>
                                </h3>
                                <a href="https://en-vanter.com" title=""
                                    class="inline-flex items-center text-lg font-medium text-amber-500 hover:text-amber-600 hover:underline glow-effect transition-all duration-300">
                                    https://en-vanter.com
                                    <svg aria-hidden="true" class="w-5 h-5 ml-2.5 transition-transform duration-300 hover:translate-x-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path
                                            d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>
                                </a>
                                <p
                                    class="text-base font-paragraph font-normal text-gray-500 sm:text-lg dark:text-gray-400">
                                    Envanter is a B2B and B2C platform designed to connect suppliers and consumers
                                    efficiently. It aims to streamline inventory management, contract handling, and
                                    supplier-consumer interactions by offering a transparent, high-quality, and reliable
                                    digital ecosystem.
                                </p>
                            </div>

                            <div class="flex items-center gap-2.5">
                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-html5" class="object-contain w-auto h-8"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/html5.svg"
                                        alt="">
                                </div>
                                <div id="tooltip-logo-html5" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    HTML5
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-css3" class="object-contain w-auto h-8"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/css-3.svg"
                                        alt="">
                                </div>
                                <div id="tooltip-logo-css3" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    CSS3
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-javascript" class="object-contain w-auto h-8"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/javascript.svg"
                                        alt="">
                                </div>
                                <div id="tooltip-logo-javascript" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    JavaScript
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-tailwind-css"
                                        class="object-contain w-auto h-8"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/tailwind-css.svg"
                                        alt="">
                                </div>
                                <div id="tooltip-logo-tailwind-css" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Tailwind CSS
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <div class="p-1 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <img data-tooltip-target="tooltip-logo-adobe-cc" class="object-contain w-auto h-8"
                                        src="{{ asset('assets/svg/adobe-cc.svg') }}" alt="">
                                </div>
                                <div id="tooltip-logo-adobe-cc" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Adobe Creative Cloud
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>

                            <a href="#" title=""
                                class="text-white bg-primary-700 justify-center hover:bg-primary-800 inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                role="button">
                                View case study
                                <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
        </section>        <section id="services" class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center sm:py-16 lg:px-6">
                <h2
                    class="mb-4 text-4xl tracking-tight uppercase font-accent font-extrabold text-gray-900 dark:text-white gradient-text animate-fade-in-up">
                    What we have to <span class="text-amber-500">offer</span></h2>
                <p class="text-gray-500 sm:text-xl font-paragraph dark:text-gray-400 animate-fade-in-up delay-200">Check out our services and see how
                    we can help you elevate your business.</p>
                <div class="mt-8 lg:mt-12 space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">                    <div id="branding-design" class="trust-card p-6 rounded-lg hover:shadow-lg transition-all duration-500 animate-fade-in-up delay-300 group">
                        <img src="{{ asset('assets/svg/branding-icon.svg') }}" alt="branding icon" class="mx-auto mb-4 w-16 h-16 group-hover:scale-110 transition-transform duration-300" />
                        <h3 class="mb-2 text-xl font-bold font-heading uppercase dark:text-white gradient-text">Branding <span class="text-amber-500">Design</span></h3>
                        <p class="mb-4 font-paragraph text-gray-500 dark:text-gray-400">Our branding design services
                            help you create a
                            strong and memorable brand identity that resonates with your target audience.</p>
                        <a href="https://www.cheeriostudios.com/services/#branding-design"
                            class="inline-flex items-center text-sm font-medium font-accent text-amber-500 hover:text-amber-600 dark:text-amber-300 dark:hover:text-amber-400 glow-effect transition-all duration-300 group-hover:translate-x-1">
                            Learn more about the process
                            <svg class="ml-1 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>                    <div id="web-design-development" class="trust-card p-6 rounded-lg hover:shadow-lg transition-all duration-500 animate-fade-in-up delay-400 group">
                        <img src="{{ asset('assets/svg/web-development-icon.svg') }}" alt="web development icon"
                            class="mx-auto mb-4 w-16 h-16 group-hover:scale-110 transition-transform duration-300" />
                        <h3 class="mb-2 text-xl font-bold font-heading uppercase dark:text-white gradient-text">Web Design &
                            <span class="text-amber-500">Development</span></h3>
                        <p class="mb-4 font-paragraph text-gray-500 dark:text-gray-400">Our web design and development
                            services ensure
                            your website is not only visually appealing but also optimized for search engines, providing
                            a seamless user experience and improving your online visibility.</p>
                        <a href="https://www.cheeriostudios.com/services/#web-design-development"
                            class="inline-flex items-center text-sm font-medium font-accent text-amber-500 hover:text-amber-600 dark:text-amber-300 dark:hover:text-amber-400 glow-effect transition-all duration-300 group-hover:translate-x-1">
                            Learn more about the process <svg class="ml-1 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>                    <div id="social-media-management" class="trust-card p-6 rounded-lg hover:shadow-lg transition-all duration-500 animate-fade-in-up delay-500 group">
                        <img src="{{ asset('assets/svg/social-media-icon.svg') }}" alt="social-media-icon"
                            class="mx-auto mb-4 w-16 h-16 group-hover:scale-110 transition-transform duration-300" />
                        <h3 class="mb-2 text-xl font-bold font-heading uppercase dark:text-white gradient-text">Social Media
                            <span class="text-amber-500">Management</span></h3>
                        <p class="mb-4 font-paragraph text-gray-500 dark:text-gray-400">Our social media management
                            services are
                            designed to enhance your online presence, engage your audience, and drive traffic to your
                            website.</p>
                        <a href="https://www.cheeriostudios.com/services/#social-media-management"
                            class="inline-flex items-center text-sm font-medium font-accent text-amber-500 hover:text-amber-600 dark:text-amber-300 dark:hover:text-amber-400 glow-effect transition-all duration-300 group-hover:translate-x-1">
                            Learn more about the process <svg class="ml-1 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>        <section id="contact" class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                <div class="max-w-screen-md animate-fade-in-up">
                    <h2
                        class="mb-4 text-4xl tracking-tight font-accent uppercase font-extrabold text-gray-900 dark:text-white gradient-text">
                        Let's find
                        more that brings us <span class="text-amber-500">together</span>.</h2>
                    <p class="mb-8 font-light font-paragraph text-gray-500 sm:text-xl dark:text-gray-400 animate-fade-in-up delay-200">At Cheerio
                        Studio, we specialize in creating stunning web and graphic design solutions that help businesses
                        thrive. Our team is dedicated to transforming your ideas into impactful digital experiences.
                        Contact us today to learn how we can elevate your brand.</p>                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 animate-fade-in-up delay-300">
                        <a href="{{ url('register') }}"
                            class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-white bg-gradient-to-r from-amber-500 to-orange-500 rounded-lg hover:from-amber-600 hover:to-orange-600 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-400 trust-card glow-effect transition-all duration-300">
                            Get started
                        </a>
                        <!-- <a href="#"
                            class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                </path>
                            </svg>
                            View more
                        </a> -->
                    </div>
                </div>
            </div>
        </section>
    </main>@include('footer')