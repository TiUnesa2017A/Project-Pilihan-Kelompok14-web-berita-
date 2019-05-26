@extends('layouts.main')
@section('title','Frekuensi Ask Questions')

@push('css')
     <link rel="stylesheet" href="{{ asset('css/additional/FAQ-Frequentlly-Asked-Questions.css') }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">

<style type="text/css">
    .about-me{
        text-align: center;
        font-size: 27px;
    }
</style>

@endpush

@section('content')

<main class="page cv-page">
        <section class="portfolio-block block-intro border-bottom" style="padding-bottom:20px;">
            <div class="container">
                <div class="avatar text-center"><img src="{{asset('images/faqs.jpg')}}" width="200px;"></div><br>
                <div class="about-me">
                    <p>Selamat datang di menu "Frequensi Ask Questions", berbagai pertanyaan para member seputar Informatics.id dapat anda temukan dengan mudah di sini</p>
                </div>
            </div>
        </section>
        <section class="portfolio-block cv" style="padding-top:20px;padding-bottom:20px;"><div class="container" style="padding-top:40px;padding-bottom:40px;">
    <div class="container">
        <div class="panel-group" id="accordion">
            <div class="faqHeader">General questions</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Pertanyaan yang paling sering ditanyakan adalah?</a></h4></div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">Account registration at<strong>PrepBootstrap</strong>is only required if you will be selling or buying themes. This ensures a valid communication channel for all parties involved in any transactions.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Pertanyaan yang paling sering ditanyakan adalah?</a></h4></div>
                <div id="collapseTen" class="panel-collapse collapse">
                    <div class="panel-body">A lot of the content of the site has been submitted by the community. Whether it is a commercial element/template/theme or a free one, you are encouraged to contribute. All credits are published along with the resources.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">Pertanyaan yang paling sering ditanyakan adalah?</a></h4></div>
                <div id="collapseEleven" class="panel-collapse collapse">
                    <div class="panel-body">All prices for themes, templates and other items, including each seller&#39;s or buyer&#39;s account balance are in<strong>USD</strong></div>
                </div>
            </div>
            <div class="faqHeader">Users</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Pertanyaan user 1?</a></h4></div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">Any registed user, who presents a work, which is genuine and appealing, can post it on<strong>PrepBootstrap</strong>.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Pertanyaan user 2?</a></h4></div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">The steps involved in this process are really simple. All you need to do is:
                        <ul>
                            <li>Register an account</li>
                            <li>Activate your account</li>
                            <li>Go to the<strong>Themes</strong>section and upload your theme</li>
                            <li>The next step is the approval step, which usually takes about 72 hours.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Pertanyaan user 3?</a></h4></div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">Here, at<strong>PrepBootstrap</strong>, we offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc.
                        <br />
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Pertanyaan user 4?</a></h4></div>
                <div id="collapseSix" class="panel-collapse collapse">
                    <div class="panel-body">There are a number of reasons why you should join us:
                        <ul>
                            <li>A great 70% flat rate for your items.</li>
                            <li>Fast response/approval times. Many sites take weeks to process a theme or template. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours
                                for a template/theme to get reviewed.</li>
                            <li>We are not an exclusive marketplace. This means that you can sell your items on<strong>PrepBootstrap</strong>, as well as on any other marketplate, and thus increase your earning potential.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Pertanyaan user 5?</a></h4></div>
                <div id="collapseEight" class="panel-collapse collapse">
                    <div class="panel-body">The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Pertanyaan user 6?</a></h4></div>
                <div id="collapseNine" class="panel-collapse collapse">
                    <div class="panel-body">Our standard payment plan provides for monthly payments. At the end of each month, all accumulated funds are transfered to your account. The minimum amount of your balance should be at least 70 USD.</div>
                </div>
            </div>
            <div class="faqHeader">Guest</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Pertanyaan quest 1?</a></h4></div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">Buying a theme on<strong>PrepBootstrap</strong>is really simple. Each theme has a live preview. Once you have selected a theme or template, which is to your liking, you can quickly and securely pay via Paypal.
                        <br />Once the transaction is complete, you gain full access to the purchased product.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Pertanyaan quest 2?</a></h4></div>
                <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="panel-body">Each item in<strong>PrepBootstrap</strong>is maintained to its latest version. This ensures its smooth operation.</div>
                </div>
            </div>
        </div>
    </div>
</div></section>
    </main>

@endsection