<div class="subheader" id="subheader" style="padding: 1.5rem 0rem;margin-bottom:0px;padding-bottom:0px">
                            <span class="subheader-title2">
							<div class="demo">
	 
	 <a href="<?php echo base_url()?>admin/<?php echo $module_details['slug']?>" class="btn btn-primary btn-icon waves-effect waves-themed">
														 <i class="fal fa-home"></i> 
													 </a>
  
	 <?php if ( ! empty($module_details['sections'][$active_section]['shortcuts']) ||  ! empty($module_details['shortcuts'])): ?>
  
		 <?php if ( ! empty($module_details['sections'][$active_section]['shortcuts'])): ?>
			 <?php foreach ($module_details['sections'][$active_section]['shortcuts'] as $shortcut):
				 $name 	= $shortcut['name'];
				 $uri	= $shortcut['uri'];
				 unset($shortcut['name']);
				 unset($shortcut['uri']); ?>
			  <a <?php foreach ($shortcut as $attr => $value) echo $attr.'="'.$value.'"'; echo 'href="' . site_url($uri) . '">' . lang($name) . '</a>'; ?> 
			 <?php endforeach; ?>
		 <?php endif; ?>
		 
		 <?php if ( ! empty($module_details['shortcuts'])): ?>
			 <?php foreach ($module_details['shortcuts'] as $shortcut):
				 $name 	= $shortcut['name'];
				 $uri	= $shortcut['uri'];
				 unset($shortcut['name']);
				 unset($shortcut['uri']); ?>
		  <a  <?php foreach ($shortcut as $attr => $value) echo $attr.'="'.$value.'" '; echo 'href="' . site_url($uri) . '"><span class="fal '.$shortcut['icon'].' mr-1"></span> ' . lang($name) . '</a>'; ?> 
			 <?php endforeach; ?>
		 <?php endif; ?>
	  
 <?php endif; ?>
			 </div>
             </span>
                            <div class="subheader-block d-lg-flex align-items-center">
                                <div class="d-inline-flex flex-column justify-content-center mr-3">
                                    <span class="fw-300 fs-xs d-block opacity-50">
                                        <small>TOTAL DATA</small>
                                    </span>
                                    <span class="fw-500 fs-xl d-block color-primary-500 text-center" id="totaldata">
                                        0
                                    </span>
                                </div>
                            </div>
                            <div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
                                <div class="d-inline-flex flex-column justify-content-center mr-3">
                                    <span class="fw-300 fs-xs d-block opacity-50">
                                        <small id="title_index"></small>
                                    </span>
                                    <span class="fw-500 fs-xl d-block color-danger-500" id="jumlah_index">
                                         
                                    </span>
                                </div>
                             </div>
                            
                        </div>
						

			 