
<?php

$categories = get_category_by_slug('catalog');
$args = array(
	'type'         => 'post',
	'child_of'     => $categories->term_id,
	'parent'       => '',
	'orderby'      => 'name',
	'order'        => 'ASC',
	'hide_empty'   => 1,
	'hierarchical' => 1,
	'exclude'      => '',
	'include'      => '',
	'number'       => 0,
	'taxonomy'     => 'category',
	'pad_counts'   => false,
	// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
);

$categories = get_categories( $args );
$current_cat =$wp_query->query_vars['page'];
if ($current_cat==0) : $current_cat=$categories[0]->term_id; endif;
?>

<div class="container-fluid breadcrumb-background">
	<div class="container">
		<ol class = "breadcrumb">

			<?php if (!is_front_page()):?><li><a href = "/">Главная</a></li><?php endif; ?>
			<?php if (!is_front_page()&&!is_single()&&!is_category()):?><li><a href = "<?php the_permalink() ?>"><?php the_title() ?></a></li><?php endif; ?>
			<?php if (is_category()||is_single()):?><li><a href = "<?php $cat=get_the_category(); echo get_term_link($cat[0]->term_id) ?>"><?php echo $cat[0]->name ?></a></li><?php endif; ?>
			<?php if (is_single()):?><li><a href = "<?php the_permalink() ?>"><?php the_title() ?></a></li><?php endif; ?>

		</ol>
	</div>
</div>
<!-- Под-меню -->

<div class="center-block text-contact">
	<?php the_title(); ?>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12 catalog-menu">
			<nav class="navbar navbar-default menu center-block sub-menu">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
						<ul class="nav navbar-nav sub-nav">

							<?php  $menu=wp_get_nav_menu_items('catalog');   foreach($menu as $key=>$value): ?>
							<li <?php if ($current_cat==$value->object_id): echo 'class="active"'; endif; ?> ><a href="/catalog/<?=$value->object_id?>">
							<img src="<?=get_the_post_thumbnail_url($value->ID)?>" class="sub-menu-image" alt="камень">
							<br>
									<?=$value->title?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
</div>

<!-- Продукция -->

<div class="container">
	<div class="row row-production">
		<?php $categories=get_posts([ 'cat'=>$current_cat ,'numberposts'=>20, ]); ?>
		<?php   foreach($categories as $value) : ?>
		<div class="col-md-4">
			<div class="thumbnail recomendation-block center-block">
				<div style="background-image: url(<?php echo get_the_post_thumbnail_url($value->ID);?>)" class="img-recom-slider"></div>
				<div class="caption">
					<h3 class="head-rec"><?php echo $value->post_title; ?></h3>
					<p class="text-rec"><?php echo mb_substr($value->post_content,0,50); ?>...</p>
					<p class="text-center"><a class="link-rec" href="<?php the_permalink($value->ID); ?>" class="" >Подробней></a></p>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

</div>