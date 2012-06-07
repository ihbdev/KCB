
                        <ul>
		                    <?php 
							foreach ($list_menus as $id=>$menu){
								//var_dump($menu);
								if($menu['havechild']){
									echo '<li class="'.$menu['class'].'">';
									echo '<a class="bg-menu-items" id="'.$id.'" href="'.$menu['url'].'">'.Language::t($menu['name']).'</a>';
									echo '<ul>';
									}
								else {
									echo '<li class="'.$menu['class'].'">';
									echo '<a class="bg-menu-items" id="'.$id.'" href="'.$menu['url'].'">'.Language::t($menu['name']).'</a>';
									echo '</li>';
								}
								if($menu['close']) {
									for ($i=0;$i<$menu['close'];$i++) {
											echo '</ul>';
											echo '</li>';
									}
								}
							}
							?>
                        </ul>