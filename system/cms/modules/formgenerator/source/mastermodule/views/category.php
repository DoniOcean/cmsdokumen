 
                        
                         
                        
						 
						 <?php if (!empty($blog)): ?>
<?php foreach ($blog as $post): ?>
 <article class="post">
                              <div class="post_header">
                                   <h3 class="post_title"><?php echo  anchor('blog/' .date('Y/m', $post->created_on) .'/'. $post->slug, $post->title); ?></h3>
                                   <div class="post_sub"><i class="fa-time"></i> <?php echo date('d-M-Y',$post->created_on); ?>  </div>
                              </div>
                              <div class="post_content">
                                   <figure><a href="<?php echo base_url().'blog/' .date('Y/m', $post->created_on) .'/'. $post->slug?>"><img alt="<?php echo $post->title?>" src="<?php echo trim_image($post->body); ?>" width="100%"></a></figure>
								   <?php echo $post->intro; ?>
								   <?php echo  anchor('blog/' .date('Y/m', $post->created_on) .'/'. $post->slug, 'Read More',' class="btn btn-primary"' ); ?>
                                    
							  </div>
                         </article>
	 
<?php endforeach; ?>
<br><br><p>&nbsp;</p>
<?php echo $pagination['links']; ?>

<?php else: ?>
	<p><?php echo lang('blog_currently_no_posts');?></p>
<?php endif; ?>