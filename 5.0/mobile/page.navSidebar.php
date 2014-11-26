<div class="content-secondary">
                        <ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
				            <li data-role="list-divider">Menu</li>
				            <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><li><a href="index.php?page=actions">Actions</a></li><?php } ?>
				            <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><li><a href="index.php?page=requests">Requests</a></li><?php } ?>
				           <?php if($_SESSION['roleSecurity']->maint_new_request == "Y") { ?><li><a href="index.php?page=newRequest&c=<?php echo $rand; ?>">New Request</a></li><?php } ?>
				            <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?><li><a href="index.php?page=search">Search</a></li><?php } ?>
                             <?php if(defined('CHANGE_PASSWORD') && CHANGE_PASSWORD == 1 && $_SESSION['roleSecurity']->allow_cpwd == "Y"){ ?><li><a href="index.php?page=changePassword">Change Password</a></li><?php } ?>
                             <li><a href="process.php?action=logout">Logout</a></li>
			            </ul>
                        
                    </div>