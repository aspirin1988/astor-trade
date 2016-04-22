<!-- Футер -->
<footer>
	<div class="container">
		<div class="row">
			<?php $current_post=$GLOBALS['current_post']; $cur_t=get_the_title($current_post->ID); if ($cur_t!='Контакты'){ ?>
				<div class="col-md-8 map">
					<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=kF7YbUMeNb7RlfYJauR2PCjSSINhWzy3&width=100%&height=320&lang=ru_RU&sourceType=constructor"></script>
				</div>
			<?php }else {  ?>

				<form class="col-md-8 form-contacts blink-mailer">
					<input style="display: none" type="text" name="title" value="ОБРАТНАЯ СВЯЗЬ">
					<div class="row text-contact-form">
						<div class="col-md-12">СВЯЖИТЕСЬ С НАМИ!</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="text" class="text-field" name="Ф.И.О" placeholder="Ф.И.О">
							<input type="text" class="text-field right-field" name="телефон" placeholder="Телефон">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<textarea name="СООБЩЕНИЕ" placeholder="СООБЩЕНИЕ"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12"><input id="submit" type="submit" class="text-field" value="ОТПРАВИТЬ"></div>
					</div>
				</form>
			<?php }; ?>
			<div class="col-md-4 author-block">
				<div class="contact">
					Наши контакты:
				</div>
				<div class="contact-info">
					<?php the_field('address') ?>
					<br>
					<a href="tel:<?php the_field('phone1',8) ?>"><?php the_field('phone1',8) ?></a>
					<br>
					<a href="tel:<?php the_field('phone2',8) ?>"><?php the_field('phone2',8) ?></a>
					<br>
					<a href="tel:<?php the_field('phone3',8) ?>"><?php the_field('phone3',8) ?></a>
					<br>
					<a href="tel:<?php the_field('phone4',8) ?>"><?php the_field('phone4',8) ?></a>
					<br>
					<br>
					<a href="mailto:<?php the_field('email',8);?>"><?php the_field('email',8);?></a>
				</div>
				<div class="author">
					ТОО «Астор Трейд» Кирпичный завод
				</div>
			</div>
		</div>
	</div>
	<div class="text-center">
		<p class="copyright">© 2016 Астор Трейд (Казахстан)
			Разработано компанией <a href="https://b-link.kz"><br>«B-link.kz»</a></p>
	</div>
</footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/public/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory') ?>/public/carousel/owl.carousel.min.js"></script>
<script src="https://callback.blink.kz/resources/callback/js/mailer.js"></script>
<script>
	var submitSMG = new BMModule();
	submitSMG.submitForm(function(success) { $('.blink-mailer input[name=title]').val('ОБРАТНАЯ СВЯЗЬ'); console.log(success); }, function(error) {});
</script>
<script>
	$(document).ready(function(){
		$(".owl-carousel").owlCarousel({
			autoWidth: true,
			items:1,
			margin: 30,
			loop:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true,
					dots:true
				},
				600:{
					items:2,
					nav:false
				},
				1000:{
					items:3,
					loop:false
				}
			}
		});
	});
	var owl = $('.owl-carousel');
	owl.owlCarousel();
	$('#next').click(function() {
		owl.trigger('next.owl.carousel');
	});
	// Go to the previous item
	$('#prev').click(function() {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		owl.trigger('prev.owl.carousel', [300]);
	})
</script>

<script  src="<?php bloginfo('template_directory') ?>/js/app.js"></script>
</body>
</html>