<!-- NOTICE LIST PAGE : begin -->
<?php if (!empty($blog)): ?>
<?php foreach ($blog as $post): ?>
	 <div class="notice-list-page notice-page">

									<!-- NOTICE : begin -->
									<article class="notice">
										<div class="notice-inner c-content-box m-no-padding">

											<!-- NOTICE CORE : begin -->
											<div class="notice-core">

												<!-- NOTICE TITLE : begin -->
												<h2 class="notice-title"><?php echo  anchor('blog/' .date('Y/m', $post->created_on) .'/'. $post->slug, $post->title); ?></h2>
												<!-- NOTICE TITLE : end -->

												<!-- NOTICE CONTENT : begin -->
												<div class="notice-content">
													<?php echo $post->intro; ?>
													</div>
												<!-- NOTICE CONTENT : end -->

											</div>
											<!-- NOTICE CORE : end -->

											<!-- NOTICE FOOTER : begin -->
											<div class="notice-footer">
												<div class="notice-footer-inner">

													<!-- NOTICE DATE : begin -->
													<div class="notice-date">
														<i class="ico tp tp-clock2"></i><?php echo format_date($post->created_on,'d-m-Y'); ?> in <?php echo anchor('blog/category/'.$post->category_slug, $post->category_title);?>
													</div>
													<!-- NOTICE DATE : end -->

												</div>
											</div>
											<!-- NOTICE FOOTER : end -->

										</div>
									</article>
									<!-- NOTICE : end -->


								</div>
<?php endforeach; ?>

 <?php echo $pagination['links']; ?>
<?php else: ?>
	<p><?php echo lang('blog_currently_no_posts');?></p>
<?php endif; ?>
								
			 					<!-- NOTICE LIST PAGE : begin -->
								
								
								 
