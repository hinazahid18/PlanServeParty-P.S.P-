  <title>Contact Us</title>
  <section class="bg-contact-banner">
 <div class="container">
     <div class="row">
         <h2 class="text-blue text-center fw-bold">"We create, you love"</h2>
         &emsp;
         
         <h3 class="text-black text-center fw-bold" >We love to hear from our precious users. </h6>
          &emsp;
         <h4 class="text-black text-center fw-bold">For any feedback or queries simply contact us.</h4>
         
     </div>
 </div>
  </section>
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Contact</h2>
    <p>Contact Us</p>
  </header>

  <div class="row gy-4">

    <div class="col-lg-6">

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <p>Soan Gardens, Pakistan <br>Block: H; Street no: 12</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-telephone"></i>
            <h3>Call Us</h3>
            <p>+92 3348993918<br>+92 3472582188</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-envelope"></i>
            <h3>Email Us</h3>
            <p>Umaira3773@gmail.com</p>
          </div>
        </div>
      
      </div>

    </div>

    <div class="col-lg-6">
      <form action="<?php echo base_url('user/contactus')?>" method="post" >
        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>

          <div class="col-md-6 ">
            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
          </div>

          <div class="col-md-12">
            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
          </div>

          <div class="col-md-12 text-center">
            <button class="btn btn-primary fw-bold text-white">Send Message</button>
          </div>

        </div>
      </form>

    </div>

  </div>

</div>

</section><!-- End Contact Section -->