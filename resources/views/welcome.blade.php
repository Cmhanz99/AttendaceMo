@extends('layout.homeLayout')

@section('section')
<main>
    <section id="home">
        <div class="hero" style="background-image: url('{{asset ('images/web1.jpg')}}')">
            <h3>Manage your attendance efficiently with AttendanceMO</h3>
            <p>AttendanceMO is a websystem where you can freely manage your attendance.</p>
            <div class="hero-btn">
                <a href="#about" class="btn-primary">See More</a>
                <a href="/" class="btn-class">Sign In</a>
            </div>
        </div>
        <div class="topic-hero">
                <div class="box">
                    <i class="fa-solid fa-list-check"></i>
                    <p>Efficiently organize and update attendances.</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-eye"></i>
                    <p>Gain insights into student participation.</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-file-invoice"></i>
                    <p>Safeguard attendance integrity effortlessly.</p>
                </div>
                <div class="box">
                    <i class="fa fa-sliders"></i>
                    <p>Customize attendance for your needs.</p>
                </div>
        </div>
    </section>


    <section id="about">
        <div class="about-hero">
            <h3>About</h3>
            <p>-Learn more about this websystem.-</p>
            <div class="about-hero-info">
                <div class="back-img">
                    <img src="{{asset ('images/illus3.png')}}" alt="">
                </div>
                <div class="details-about">
                    <h1>Details</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Tempore, autem!Illo distinctio earum neque corrupti eligendi
                        asperiores laborum soluta itaque!
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Tempore, autem!Illo distinctio earum neque corrupti eligendi
                        asperiores laborum soluta itaque!
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Tempore, autem!Illo distinctio earum neque corrupti eligendi
                        asperiores laborum soluta itaque!
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Tempore, autem!Illo distinctio earum neque corrupti eligendi
                        asperiores laborum soluta itaque!
                    </p>
                    <button class="btn-primary">More about</button>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="contact-hero">
            <h3>Contact</h3>
            <p>-Connect with us-</p>
            <div class="contact-form">
                <div class="contact-context">
                    <h2>Get in touch</h2>
                    <p>Have questions or need assistance? Feel free to get in touch with us — we’re here to help!</p>
                    <div class="social-links">
                        <p><i class="fa-solid fa-phone"></i> +639 698 698 93</p>
                        <p><i class="fa-solid fa-envelopes-bulk"></i> hanz@random.com</p>
                        <p><i class="fa-solid fa-location-dot"></i>Lahug Cebu City</p>
                        <p><i class="fa-solid fa-link"></i> facebook.com</p>
                    </div>
                </div>
                <div class="contact-submit-form">
                    <form action="">
                        <div class="form">
                            <label for="">Name</label>
                            <div class="form-group">
                                <input type="text" placeholder="First Name" autocomplete="off">
                                <input type="text" placeholder="Last Name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form form-next">
                            <label for="">Email</label>
                            <div class="form-class">
                                <input type="text" placeholder="Email@example.com" autocomplete="off">
                            </div>
                        </div>
                        <div class="form form-next">
                            <label for="">Message</label>
                            <div class="form-class">
                                <textarea placeholder="Type your message here.."></textarea>
                            </div>
                        </div>
                        <div class="form form-next">
                            <button class="btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="hero-footer">
            <div class="context-footer">
                <h2>AttendanceMO</h2>
                <p>Manage your attendance efficiently with AttendanceMO</p>
            </div>
            <div class="quick-links">
                <h2>Quick Links</h2>
                <ul>
                    <a href="#">• Home</a>
                    <a href="#">• About</a>
                    <a href="#">• Contact</a>
                </ul>
            </div>
            <div class="footer-social">
                <p><i class="fa-brands fa-facebook"></i>facebook.com</p>
                <p><i class="fa-brands fa-instagram"></i>insta.com</p>
                <p><i class="fa-brands fa-twitter"></i>twitter.com</p>
            </div>
        </div>
    </footer>
</main>
@endsection
