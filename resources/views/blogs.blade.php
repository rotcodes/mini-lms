@extends('layouts.app')

@section('content')
<!-- Breadcrumb start -->
<div class="breadcrumb-area bg-img bg-cover" data-bg-image="assets/images/breadcrumb-bg.jpg">
    <div class="container">
        <div class="content text-center">
            <h2>Blogs</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb end -->

<!-- Blog-area start -->
<div class="blog-area pt-100 pb-75">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4" data-aos="fade-up">
                <article class="card mb-25 border radius-md">
                    <div class="card-img">
                        <a href="blog-single.html" target="_self" title="Link" class="lazy-container ratio ratio-2-3">
                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/blog/blog-1.jpg" alt="Blog Image">
                        </a>
                    </div>
                    <div class="card-content p-25">
                        <div class="card-info mb-10">
                            <span>App Development</span>
                            <span> 15 July 2023</span>
                        </div>
                        <h5 class="card-title lc-2 mb-15">
                            <a href="blog-single.html" target="_self" title="Link">
                                Discover 5 effective strategies to enhance your learning experience and excel in design studies.
                            </a>
                        </h5>
                        <p class="card-text lc-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reprehenderit possimus, nesciunt fuga deserunt ratione non adipisci assumenda dicta exercitationem quisquam sit et autem cumque illo quas, natus maxime tenetur?
                        </p>
                        <div class="cta-btn mt-15">
                            <a href="blogs.html" class="btn-text color-primary" target="_self" title="Read More">READ MORE</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-4" data-aos="fade-up">
                <article class="card mb-25 border radius-md">
                    <div class="card-img">
                        <a href="blog-single.html" target="_self" title="Link" class="lazy-container ratio ratio-2-3">
                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/blog/blog-2.jpg" alt="Blog Image">
                        </a>
                    </div>
                    <div class="card-content p-25">
                        <div class="card-info mb-10">
                            <span>ChatGPT</span>
                            <span>21 June 2023</span>
                        </div>
                        <h5 class="card-title lc-2 mb-15">
                            <a href="blog-single.html" target="_self" title="Link">
                                Explore ways to maintain balance and maximize your time while pursuing your AI studies.
                            </a>
                        </h5>
                        <p class="card-text lc-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reprehenderit possimus, nesciunt fuga deserunt ratione non adipisci assumenda dicta exercitationem quisquam sit et autem cumque illo quas, natus maxime tenetur?
                        </p>
                        <div class="cta-btn mt-15">
                            <a href="blogs.html" class="btn-text color-primary" target="_self" title="Read More">READ MORE</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-4" data-aos="fade-up">
                <article class="card mb-25 border radius-md">
                    <div class="card-img">
                        <a href="blog-single.html" target="_self" title="Link" class="lazy-container ratio ratio-2-3">
                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/blog/blog-3.jpg" alt="Blog Image">
                        </a>
                    </div>
                    <div class="card-content p-25">
                        <div class="card-info mb-10">
                            <span>Copywriting</span>
                            <span> 30 Dec 2023</span>
                        </div>
                        <h5 class="card-title lc-2 mb-15">
                            <a href="blog-single.html" target="_self" title="Link">
                                Gain an in-depth understanding of content writing and learn how it can help you excel in your industry or field of choice.
                            </a>
                        </h5>
                        <p class="card-text lc-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reprehenderit possimus, nesciunt fuga deserunt ratione non adipisci assumenda dicta exercitationem quisquam sit et autem cumque illo quas, natus maxime tenetur?
                        </p>
                        <div class="cta-btn mt-15">
                            <a href="blogs.html" class="btn-text color-primary" target="_self" title="Read More">READ MORE</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-4" data-aos="fade-up">
                <article class="card mb-25 border radius-md">
                    <div class="card-img">
                        <a href="blog-single.html" target="_self" title="Link" class="lazy-container ratio ratio-2-3">
                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/blog/blog-4.jpg" alt="Blog Image">
                        </a>
                    </div>
                    <div class="card-content p-25">
                        <div class="card-info mb-10">
                            <span>Marketing</span>
                            <span>17 Feb 2023</span>
                        </div>
                        <h5 class="card-title lc-2 mb-15">
                            <a href="blog-single.html" target="_self" title="Link">
                                Discover the top [Number] essential skills you'll gain from our comprehensive marketing program and stand out in your field.
                            </a>
                        </h5>
                        <p class="card-text lc-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reprehenderit possimus, nesciunt fuga deserunt ratione non adipisci assumenda dicta exercitationem quisquam sit et autem cumque illo quas, natus maxime tenetur?
                        </p>
                        <div class="cta-btn mt-15">
                            <a href="blogs.html" class="btn-text color-primary" target="_self" title="Read More">READ MORE</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-4" data-aos="fade-up">
                <article class="card mb-25 border radius-md">
                    <div class="card-img">
                        <a href="blog-single.html" target="_self" title="Link" class="lazy-container ratio ratio-2-3">
                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/blog/blog-5.jpg" alt="Blog Image">
                        </a>
                    </div>
                    <div class="card-content p-25">
                        <div class="card-info mb-10">
                            <span>Game Development</span>
                            <span>11 Jan 2023</span>
                        </div>
                        <h5 class="card-title lc-2 mb-15">
                            <a href="blog-single.html" target="_self" title="Link">
                                Find inspiration and stay focused with these motivational tips to help you succeed in your online Game Development course.
                            </a>
                        </h5>
                        <p class="card-text lc-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reprehenderit possimus, nesciunt fuga deserunt ratione non adipisci assumenda dicta exercitationem quisquam sit et autem cumque illo quas, natus maxime tenetur?
                        </p>
                        <div class="cta-btn mt-15">
                            <a href="blogs.html" class="btn-text color-primary" target="_self" title="Read More">READ MORE</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-4" data-aos="fade-up">
                <article class="card mb-25 border radius-md">
                    <div class="card-img">
                        <a href="blog-single.html" target="_self" title="Link" class="lazy-container ratio ratio-2-3">
                            <img class="lazyload" src="assets/images/placeholder.png" data-src="assets/images/blog/blog-6.jpg" alt="Blog Image">
                        </a>
                    </div>
                    <div class="card-content p-25">
                        <div class="card-info mb-10">
                            <span>Web Design</span>
                            <span>21 May 2023</span>
                        </div>
                        <h5 class="card-title lc-2 mb-15">
                            <a href="blog-single.html" target="_self" title="Link">
                                Unlock the potential of your career with the powerful skills and knowledge gained through our web-design course.
                            </a>
                        </h5>
                        <p class="card-text lc-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque reprehenderit possimus, nesciunt fuga deserunt ratione non adipisci assumenda dicta exercitationem quisquam sit et autem cumque illo quas, natus maxime tenetur?
                        </p>
                        <div class="cta-btn mt-15">
                            <a href="blogs.html" class="btn-text color-primary" target="_self" title="Read More">READ MORE</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <nav class="pagination-nav mt-15 mb-25" data-aos="fade-up">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="courses.html" aria-label="Previous">
                        <i class="far fa-angle-left"></i>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="courses.html">1</a></li>
                <li class="page-item"><a class="page-link" href="courses.html">2</a></li>
                <li class="page-item"><a class="page-link" href="courses.html">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="courses.html" aria-label="Next">
                        <i class="far fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Blog-area end -->

<!-- Newsletter-area start -->
<section class="newsletter-area newsletter-area_v1">
    <div class="container">
        <div class="newsletter-inner ptb-60 px-3 px-lg-5 radius-lg bg-img bg-cover" data-bg-image="assets/images/newsletter-bg-1.jpg" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content-title">
                        <h2 class="title mb-30">
                            Subscribe To Our
                            Newsletter
                        </h2>
                        <div class="newsletter-form">
                            <form id="newsletterForm">
                                <div class="input-inline bg-white rounded-pill">
                                    <input class="form-control border-0" placeholder="Enter email here..." type="text" name="EMAIL" required="">
                                    <button class="btn btn-lg btn-primary rounded-pill" type="button" aria-label="button">Subscribe Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter-area end -->
@endsection
