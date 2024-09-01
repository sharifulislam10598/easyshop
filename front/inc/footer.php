<?php 
  $offers = new Offer();
  $footer = new Footer();
?>
<div class="steps-block steps-block-red">
      <div class="container">
        <div class="row">
        <?php foreach($offers -> offer as $index => $value){?>
          <div class="col-md-4 steps-block-col">
            <i class="<?php echo $value["icon"] ?>"></i>
            <div>
              <h2><?php echo $value["offer_title"] ?></h2>
              <em><?php echo $value["sub_title"] ?></em>
            </div>
            <span style='<?php if($index == 0 || $index == 1 ){echo "background-image:url(".SITE_URL. "/front/assets/pages/img/step3-angle-right.png".")";} ?>'></span>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <?php $about_title = $footer -> about_us ?>
            <h2><?php echo $about_title["title"] ?> </h2>
            <p><?php echo $about_title["article_1"] ?> </p>
            <p><?php echo $about_title["article_2"] ?></p>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->
          <!-- BEGIN BOTTOM INFO BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2><?php echo $footer -> info_title ?></h2>
            <ul class="list-unstyled">
              <?php foreach($footer -> information as $value){?>
              <li><i class="fa fa-angle-right"></i> <a href="<?php echo $value["link"] ?>"> <?php echo $value["subject"] ?></a></li>
              <?php } ?>
              </ul>
          </div>
          <!-- END INFO BLOCK -->

          <!-- BEGIN TWITTER BLOCK --> 
          
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0"><?php echo $footer -> tweets["tweets_title"] ?></h2>
            <a class="twitter-timeline" href="<?php echo $footer -> tweets["tweet_link"] ?>" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961" data-chrome="noheader nofooter noscrollbar noborders transparent"><?php echo $footer -> tweets["tweet_name"] ?></a>      
          </div>
          <!-- END TWITTER BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
            <?php echo $footer -> contacts["address"] ?><br>
            <?php echo $footer -> contacts["phone"] ?><br>
            <?php echo $footer -> contacts["fax"] ?><br>
            Email: <a href="<?php echo $footer -> contacts["email"] ?>"><?php echo $footer -> contacts["email"] ?></a><br>
            Skype: <a href="<?php echo $footer -> contacts["skype"] ?>"><?php echo $footer -> contacts["skype"] ?></a>
            </address>
          </div>
          <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
        <div class="row">
          <!-- BEGIN SOCIAL ICONS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-icons">
            <?php foreach($footer->social_icon as $icon){?> 
              <li><a class="<?php echo $icon['icon'] ?>" data-original-title="<?php echo $icon['icon'] ?>" href="<?php echo $icon['link'] ?>"></a></li>
            <?php } ?>
            </ul>
          </div>
          <!-- END SOCIAL ICONS -->
          <!-- BEGIN NEWLETTER -->
          <div class="col-md-6 col-sm-6">
            <div class="pre-footer-subscribe-box pull-right">
              <h2>Newsletter</h2>
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="youremail@mail.com" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                </div>
              </form>
            </div> 
          </div>
          <!-- END NEWLETTER -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-4 col-sm-4 padding-top-10">
            2015 © Keenthemes. ALL Rights Reserved. and developed by shoriful
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-4 col-sm-4">
            <ul class="list-unstyled list-inline pull-right">
            <?php foreach($footer->payment as $payment){?> 
              <li><img src="<?php echo $payment['icon'] ?>" alt="We accept Western Union" title="<?php echo $payment['title'] ?>"></li>
            <?php } ?>
            </ul>
          </div>
          <!-- END PAYMENTS -->
          <!-- BEGIN POWERED -->
          <div class="col-md-4 col-sm-4 text-right">
            <p class="powered">Powered by: <a href="http://www.keenthemes.com/">shorifulislam.com</a></p>
          </div>
          <!-- END POWERED -->
        </div>
      </div>
    </div>
    <?php 
    ob_end_flush();
    ?>