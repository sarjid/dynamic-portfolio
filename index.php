 <?php include 'inc/header.php'; ?>

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                            <?php 
						$qeury = "SELECT * FROM tbl_self WHERE id='1'";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $row['title']; ?></h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?php echo $row['name']; ?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?php echo $row['descp']; ?></p>
                            <?php }}?>
                            
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                    <?php 
						$qeury = "SELECT * FROM tbl_socials WHERE id='1'";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                                        <li><a href="<?php echo $row['facebook']; ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $row['instagram']; ?>"target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="<?php echo $row['pinterest']; ?>"target="_blank"><i class="fab fa-pinterest"></i></a></li>
                                    </ul>
                                    <?php }}?>
                                </div>
                                <a href="" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                            <class="navbar-brand logo-sticky-none">
                                    <?php 
		
                $query = "SELECT * FROM banners ";
               $result = $db->select($query);
        if ($result) {
            while ($getResult = mysqli_fetch_assoc($result)) {

        ?>
               <img src="admin/<?php echo $getResult ['banner']; ?>" alt="logo"/>
        <?php 			
       }
   }else {
       echo "No Data Found";
   }
   ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="assets/img/banner/banner_img2.png" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                            <?php 
						$qeury = "SELECT * FROM about_me WHERE id='1'";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                         
                                <span><?php echo $row['sub_title']; ?></span>
                                <h2><?php echo $row['title']; ?></h2>
                            </div>
                            <div class="about-content">
                                <p><?php echo $row['descp']; ?></p>
                           
                                <h3><?php echo $row['education'];?> :</h3>
                                <?php }} ?>
                            </div>
                             <!-- Education Item -->
                            
                            <!-- Education Item -->
                            <?php
                            $qeury = "SELECT * FROM education WHERE status = '1' LIMIT 4";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                           
                            <div class="education">
                             
                               <div class="year"><?php echo $row['title'];?></div>
                                <div class="line">  </div>
                                <div class="location">
                                    <span><?php echo $row['sub_title'];?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width:<?php echo $row['skill'];?>%" aria-valuenow="<?php echo $row['skill'];?>" aria-valuemin="0" aria-valuemax="100">
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            </div>
                            <?php }} ?></div>
                           
                           
                           
                            <!-- End Education Item -->
                            
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                    <?php
                            $qeury = "SELECT * FROM services WHERE status = '1' LIMIT 6";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?php echo $row['icon'];?>"></i>
								<h3><?php echo $row['title'];?></h3>
								<p>
                                <?php echo $row['descp'];?>
								</p>
							</div>
                        </div>
                        
                            <?php }}?>
						
					
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- pagination  -->
		<?php 
				$perpage = 6;

				if (isset($_GET['page'])) {
					$page = $_GET['page'];
					
				}else {
					$page = 1;
				}

				$start_form = ($page-1)* $perpage;

		?>
		<!-- pagination End -->
                    <?php 
		
		    $sql = "SELECT * FROM works ORDER BY date DESC limit $start_form, $perpage ";
		    $post = $db->select($sql);

		if ($post) {
			while ($result =$post->fetch_assoc()) {
						
		?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="admin/<?php echo $result['image']; ?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?php echo $result['cat_name']; ?></span>
									<h4><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title'] ?></a></h4>
									<a href="post.php?id=<?php echo $result['id']; ?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>

                        <?php 
				}
            }
			
			?>
	
                       
                      
                    </div>
                </div>
                		<!-- pagination  -->
			<?php 

$query = "SELECT * FROM works";
$result  = $db->select($query);
$total_rows = mysqli_num_rows($result);
$total_pages = ceil($total_rows/$perpage);

?>


  <ul class="pagination text-center">
      <li class="page-item">
          <a class="page-link" href="index.php?page=1">First</a>
      </li>
      
      <?php
          for ($i=1; $i <= $total_pages; $i++) { 
              echo ' <li class="pag-item">
              <a class="page-link" href="index.php?page='.$i.'">'.$i.'</a>
          </li>
          ';
          }
     
     ?>

     
    <li class="page-item">
        <a class="page-link" href="index.php?page=<?php echo $total_pages ?>">Next</a>
    </li>
    
  </ul>


<!-- pagination End -->
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                        <?php
                            $qeury = "SELECT * FROM facts WHERE status = '1' LIMIT 4 ";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?php echo $row['icon']; ?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?php echo $row['count']; ?></span></h2>
                                        <span><?php echo $row['fact_name']; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php }}?>
                            
                           
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                            <?php
                            $qeury = "SELECT * FROM testimonial";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="admin/<?php echo $row['image']; ?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span><?php echo $row['comment']; ?><span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?php echo $row['name']; ?></h5>
                                            <span><?php echo $row['title']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php }}?>
                       
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                    <?php
                            $qeury = "SELECT * FROM brand";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="admin/<?php echo $row['image']; ?>" alt="img">
                            </div>
                        </div>
                        <?php }} ?>
                       
                        
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <?php 
						$qeury = "SELECT * FROM contact WHERE id='1'";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                                <h5><?php echo $row['lives_in']; ?></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?php echo $row['address']; ?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?php echo $row['phone']; ?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?php echo $row['email']; ?></li>
                                    </ul>
                            <?php }} ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <?php
                                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    if (isset($_POST['name']) && !empty($_POST['name'])) {
                                        if (preg_match('/^[a-zA-Z\s]*$/', $_POST['name'])) {
                                          $name = $_POST['name'];
                                        }else {
                                        $nameError = '<strong style="color: red;">Use Only Lowercase Uppercaser And space..!</strong>';
                                        }
                                      }else {
                                      $nameError = '<strong style="color: red;">Please Input Your Name..!</strong>';
                                      }

                                                            
                    // email validation 

                    if (isset($_POST['email']) && !empty($_POST['email'])) {
                    
                        $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                        if (preg_match($pattern, $_POST['email'])) {
                        $email = $_POST['email'];
                        
                        
                        }else{
                        $emailError ='<strong style="color: red;">Invalid Email..!</strong>';
                        
                        }

                    }else{
                        $emailError =  '<strong style="color: red;">Please Input Your Email..!</strong>';
                        
                    } //===Email ENd=======

                    // first name 

    if (isset($_POST['message']) && !empty($_POST['message'])) {

        if (strlen($_POST['message']) >=8) {
           $message = $_POST['message'];
         }else {
         $messageError = '<strong style="color: red;">Message Al lest 8 Characters</strong>';
         }
       }else {
       $messageError = '<strong style="color: red;">Write Your Message</strong>';
       }

       // insert Data into datbase 

				if (isset($name) && isset($email) && isset($message)) {
					$name	= mysqli_real_escape_string($db->link, $name);
					$email		= mysqli_real_escape_string($db->link, $email);
					$message = mysqli_real_escape_string($db->link, $message);

					$sql = "INSERT INTO messages(name, email, message) VALUES('$name','$email','$message')";
					$insert = $db->insert($sql);
					if ($insert) {
						$subsucc = '<h3 style="color: green;">Your Message send successfully..</h3>';  
					}else {
						$subsucc = '<h3 style="color: red;">Your Message Not send..!</h3>';  
					}
				}
						


    } ?>
    
    <?php if (isset($subsucc)) {echo $subsucc; }?>
                           
                                <form action="#" method="POST">
                                    <input type="text" name="name" placeholder="your name *" >
                                    <?php if (isset($nameError)) {
                                     echo $nameError;
                                      }?>
                                    <input type="email" name="email" placeholder="your email *"  >
                                    <?php if (isset($emailError)) {
                                     echo $emailError;
                                      }?>
                                    <textarea id="myInputarea" name="message" id="message" placeholder="your message *" ></textarea>
                                    <?php if (isset($messageError)) {
                                     echo $messageError;
                                      }?>
                                    <div>
                                    <p class="text-white"><span id="remainingCharacters"></span> characters remaining.</p> 
                                    </div>
                                  
                                    <button type="submit" class="btn btn-success" >Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

       <?php include 'inc/footer.php'; ?>