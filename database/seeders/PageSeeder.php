<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $homeHTML = '
            <div class="container topmargin-lg bottommargin-lg">
                <div class="row">
                    <div class="col-md-5">
                        <img data-animate="fadeInLeftBig" src="'.\URL::to('/').'/theme/images/philsaga-high-school-logo.png" style="height:350px;" alt="Imac" class="fadeInLeftBig animated">
                    </div>
                    
                    <div class="col-md-7 text-center">
                        <div class="heading-block">
                            <h2>Founding History</h2>
                            <span>Philsaga High School Foundation Inc.</span>
                        </div>

                        <p style="text-align: justify;text-justify: inter-word;">The school was established because of the request of barangay officials in Bayugan 3, who had seen the need of a school in the locality. For many years, the school made successful operations. It was one of the leading secondary schools of both Wasi-an and Bayugan 3 in Rosario, Agusan del Sur. In 2005, the management of the school was offered to Philsaga Mining Corporation, who owns the land where the school was located. The management immediately renovated the old and dilapidated school building and the equipment and facilities were improved. </p>

                        <a href="#" class="btn btn-outline-info btn-sm">Learn More <i class="icon-line-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="section p-0">
                <div class="section parallax parallax-bg m-0 border-top-0 dark" data-rellax-speed="2" style="background: url('.\URL::to('/').'/theme/images/misc/bg.png) center center; padding: 100px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -200px;">
                    <div class="container-fluid center clearfix">

                        <div class="heading-block">
                            <h2>Our Teachers and Students Achievements</h2>
                        </div>

                        <div class="row justify-content-center col-mb-30">
                            <div class="col-sm-6 col-md-3 col-lg-1-4" data-animate="bounceIn">
                                <div class="counter counter-large"><span data-from="100" data-to="1990" data-refresh-interval="20" data-speed="2000"></span></div>
                                <h5>Year Founded</h5>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-1-4" data-animate="bounceIn" data-delay="200">
                                <div class="counter counter-large"><span data-from="10" data-to="198" data-refresh-interval="10" data-speed="2000"></span></div>
                                <h5>Certified Teachers</h5>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-1-4" data-animate="bounceIn" data-delay="400">
                                <div class="counter counter-large"><span data-from="520" data-to="4173" data-refresh-interval="10" data-speed="10000"></span></div>
                                <h5>Graduated Students</h5>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-1-4" data-animate="bounceIn" data-delay="600">
                                <div class="counter counter-large"><span data-from="2" data-to="96" data-refresh-interval="3" data-speed="500"></span></div>
                                <h5>Awards Won</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container topmargin-lg bottommargin-lg">
                <div class="heading-block center">
                    <h2>Latest <span>News</span></h2>
                </div>
                
                <div id="posts" class="post-grid row gutter-40 clearfix" data-layout="fitRows">
                    {Featured Articles}
                </div>
                
                <div class="text-center m-auto w-75">                   
                    <a href="#" class="button button-border button-rounded ms-0 topmargin-sm button-small">Read More</a>
                </div>
            </div>

            <div class="section bg-warning m-0">
                <div class="container center">
                    <h2 class="mb-0 fw-light ls1">Want to access all our articles? <a href="#" data-scrollto="#template-contactform" data-offset="140" data-easing="easeInOutExpo" data-speed="1250" class="button button-border button-circle button-light button-large my-0" style="position: relative; top: -3px;">Click Here</a></h2>
                </div>
            </div>

            {Calendar Activities}';


        $aboutHTML = '
            <div class="heading-block">
                <h3>Founding History</h3>
                <span>Philsaga High School Foundation Inc.</span>
            </div>
            
            <img src="'.\URL::to('/').'/theme/images/philsaga-high-school-logo.png" alt="Imac">
            <p style="text-align: justify;text-justify: inter-word;">The school was established because of the request of barangay officials in Bayugan 3, who had seen the need of a school in the locality. For many years, the school made successful operations. It was one of the leading secondary schools of both Wasi-an and Bayugan 3 in Rosario, Agusan del Sur. In 2005, the management of the school was offered to Philsaga Mining Corporation, who owns the land where the school was located. The management immediately renovated the old and dilapidated school building and the equipment and facilities were improved. </p>';


        $contactUsHTML = '
            <h3>Contact Details</h3>

            <iframe class="mb-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6351879919657!2d121.0079802148399!3d14.562842589826564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97529aecac7%3A0xf575bfff50902c78!2s7708%20Saint%20Paul%20Road%2C%20Village%2C%20Makati%2C%201203%20Kalakhang%20Maynila!5e0!3m2!1sen!2sph!4v1605668109563!5m2!1sen!2sph" width="100%" height="70" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            <div class="row topmargin d-none">
                <div class="col-lg-6">
                    <address>
                        <abbr title="Address">Address:</abbr><br>
                        444a EDSA, Guadalupe Viejo, Makati City, Philippines 1211
                    </address>
                </div>
                <div class="col-lg-6">
                    <p><abbr title="Email Address">Email:</abbr><br>info@vanguard.edu.ph</p>
                </div>
                <div class="col-lg-6">
                    <p class="nomargin"><abbr title="Phone Number">Phone:</abbr><br>(632) 8-1234-4567</p>
                </div>
                <div class="col-lg-6">
                    <p class="nomargin"><abbr title="Phone Number">Fax:</abbr><br>(632) 8-1234-4567</p>
                </div>
            </div>';

        $footerHTML = '
            <footer id="footer" class="dark">
                <div id="copyrights">
                    <div class="container">

                        <div class="row justify-content-between col-mb-30">
                            <div class="col-12 col-lg-auto text-center text-lg-start order-last order-lg-first">
                                Copyrights &copy; 2020 All Rights Reserved by Canvas Inc.
                            </div>

                            <div class="col-12 col-lg-auto text-center text-lg-end">
                                <div class="copyrights-menu copyright-links">
                                    <a href="#">Home</a>/<a href="#">About</a>/<a href="#">Features</a>/<a href="#">Portfolio</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>';

      
        $pages = [
            [
                'parent_page_id' => 0,
                'album_id' => 1,
                'slug' => 'home',
                'name' => 'Home',
                'label' => 'Home',
                'contents' => $homeHTML,
                'status' => 'PUBLISHED',
                'page_type' => 'default',
                'image_url' => '',
                'meta_title' => 'Home',
                'meta_keyword' => 'home',
                'meta_description' => 'Home page',
                'user_id' => 1,
                'template' => 'home',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'about-us',
                'name' => 'About Us',
                'label' => 'About Us',
                'contents' => $aboutHTML,
                'status' => 'PUBLISHED',
                'page_type' => 'standard',
                'image_url' => \URL::to('/').'/theme/images/bg.jpg',
                'meta_title' => 'About Us',
                'meta_keyword' => 'About Us',
                'meta_description' => 'About Us page',
                'user_id' => 1,
                'template' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'contact-us',
                'name' => 'Contact Us',
                'label' => 'Contact Us',
                'contents' => $contactUsHTML,
                'status' => 'PUBLISHED',
                'page_type' => 'standard',
                'image_url' => '',
                'meta_title' => 'Contact Us',
                'meta_keyword' => 'Contact Us',
                'meta_description' => 'Contact Us page',
                'user_id' => 1,
                'template' => 'contact-us',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'news',
                'name' => 'News and Updates',
                'label' => 'News and Updates',
                'contents' => '',
                'status' => 'PUBLISHED',
                'page_type' => 'customize',
                'image_url' => '',
                'meta_title' => 'News',
                'meta_keyword' => 'news',
                'meta_description' => 'News page',
                'user_id' => 1,
                'template' => 'news',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'parent_page_id' => 0,
                'album_id' => 0,
                'slug' => 'footer',
                'name' => 'Footer',
                'label' => 'footer',
                'contents' => $footerHTML,
                'status' => 'PUBLISHED',
                'page_type' => 'default',
                'image_url' => '',
                'meta_title' => '',
                'meta_keyword' => '',
                'meta_description' => '',
                'user_id' => 1,
                'template' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ];

        DB::table('pages')->insert($pages);
    }
}
