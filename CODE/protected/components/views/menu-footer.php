
		                    <?php 
							foreach ($list_menus as $id=>$menu){
								echo '<a class="font-weight" href="'.$menu['url'].'">'.Language::t($menu['name']).'</a>';
							}
							?>