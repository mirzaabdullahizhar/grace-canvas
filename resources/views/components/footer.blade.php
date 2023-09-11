<!-- footer section -->
<footer style="background-color:#FF6600; ">
    <div class="container pt-5 pb-5 pl-2 ">
        <div class="row footers-section ">
            <div class="mt-5 col-lg-4 col-md-6 col-sm-12">
                <h2>
                    <a class="navbar-brand text-light" href="#"> {{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'Grace Canvas']) }} </a>
                </h2>
                <br>
                <p class="w-75 p1 ">
                    {{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit nulla ipsum iste maiores, ducimus hic iure vitae consequatur esse sed.']) }}
                </p>
                <br>
            </div>
            <div class="mt-5 col-lg-4 col-md-6 col-sm-12 learn-more">
                <h2>{{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'Learn']) }}</h2><br>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'Career Blog']) }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> {{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'How to write a Resume']) }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> {{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'How to write a Cover Letter']) }} </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"> {{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'Resume Example']) }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> {{ GoogleTranslate::trans('Cover Letter Example', app()->getLocale())}}</a>
                    </li> --}}
                </ul>
            </div>
            <div class="mt-5 col-lg-4 col-md-6 col-sm-12 other">
                <h2>{{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'Others']) }}</h2><br>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'Pricing']) }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'About Us']) }}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">{{ GoogleTranslate::trans('E-book: How to Get a job in 2023', app()->getLocale())}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ GoogleTranslate::trans('Media Ki', app()->getLocale())}}t</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ GoogleTranslate::trans('Help Center', app()->getLocale())}}</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid social-media-icons">
        <div class="row">
            <div class="bg-white col-lg-4 col-md-3 col-sm-12"></div>
            <div class="bg-white col-lg-4 col-md-6 col-sm-12 float-center ">
                <a href="#" class="bx bxl-facebook"></a>
                <a href="#" class="bx bxl-linkedin"></a>
                <a href="#" class="bx bxl-instagram"></a>
            </div>
            <div class="bg-white col-lg-4 col-md-3 col-sm-12"></div>
        </div>
    </div>
    <div class="p-3 px-5 container-fluid footer-copy-right">
        <p class="m-0 text-center text-white">{{ app('googleTranslator', ['lang' => app()->getLocale(), 'string' => 'copyright@gracetechnoglogiespk']) }}</p>
    </div>
</footer>

