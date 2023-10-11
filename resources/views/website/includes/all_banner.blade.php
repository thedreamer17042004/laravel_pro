<section class="home-slider owl-carousel img" style="background-image: url(website/images/bg_1.jpg);">

    <div class="slider-item" style="background-image: url(website/images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                @switch($status)
                    @case('1')
                    <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
                        @break
                    @case('2')
                    <h1 class="mb-3 mt-5 bread">Services</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Services</span></p>
                        @break
                    @case('3')
                    <h1 class="mb-3 mt-5 bread">Read Our Blog</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
                    @break

                    @case('4')
                    <h1 class="mb-3 mt-5 bread">About</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
                    @break

                    @case('5')
                    <h1 class="mb-3 mt-5 bread">Contact us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
                    @break

                    @case('6')
                    <h1 class="mb-3 mt-5 bread">Read our Blog</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Blog</a></span> <span>Blog Single</span></p>
                    @break

                    @default
                        <span class="status">Trash</span>
                @endswitch
                 
                </div>

            </div>
        </div>
    </div>
</section>