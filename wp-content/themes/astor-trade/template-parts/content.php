<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package astor-trade
 */
$current_post = get_post();
?>

<div class="container-fluid breadcrumb-background">
	<div class="container">
		<ol class = "breadcrumb">

			<?php if (!is_front_page()):?><li><a href = "/">Главная</a></li><?php endif; ?>
			<?php if (!is_front_page()&&!is_single()&&!is_category()):?><li><a href = "<?php the_permalink() ?>"><?php the_title() ?></a></li><?php endif; ?>
			<?php if (is_single()):?><li><a href = "/catalog/<?php $cat=get_the_category(); $parent=get_category($cat[0]->parent);  ?>"><?php echo $parent->name ?></a></li><?php endif; ?>
			<?php if (is_single()):?><li><a href = "<?php the_permalink() ?>"><?php the_title() ?></a></li><?php endif; ?>

		</ol>
	</div>
</div>

<div class="center-block text-contact">
	<?php  the_title();?>

</div>

<!-- Описание компании-->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="line center-block">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<img class="img-production" src="<?php echo get_the_post_thumbnail_url($current_post->ID) ?>" alt="">
			<?php for($i=0; $i<=9; $i++): if (get_field('img'.$i)):?>
				<img class="img-production" src="<?=get_field('img'.$i)?>" alt="">
			<?php endif; endfor; ?>
		</div>
		<div class="col-md-8 text-production">
			<?php the_content() ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="line center-block">
			</div>
		</div>
	</div>
</div>
