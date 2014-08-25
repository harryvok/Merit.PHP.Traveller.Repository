<?php
if(isset($_COOKIE['user_id'])){
		?>
<a name="top" title="top"></a>
		<div id="topbar">
			<div id="title">
				Actions</div>
			<div id="leftnav">
	
				<a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a></div>
		</div>
        
		<div id="wrapper">
			<div id="scroller">
				<div id="content">
					<?php
                    include("mobile/page.output.php");
                    ?>
                    <span class="graytitle">Filter</span>
                    <form name="jump">
                       <ul class="pageitem">
                            <li class="select">
                                <?php
                                $controller->Dropdown("ActionFilters");
                                
                                ?>
                                <span class="arrow"></span>
                            </li>
                        </ul>                  
                    </form>
                    <ul class="pageitem">
                        <li class="bigfield"><input class="text" type="button" value="Go to bottom" onclick="self.location.hash='bottom'" /></li>
                    </ul>
					<?php
					$controller->Invoke("ActionIntray");
					?>
                    <ul class="pageitem">
                        <li class="bigfield"><input class="text" type="button" value="Go to top" onclick="self.location.hash='top'" /></li>
                    </ul>
                    
				  </div>
			</div>
		</div>
		
		<a name="bottom" title="bottom"></a>
		<?php
	
}
else{
	$_SESSION['error_not_logged_in'] = 1;
	header("Location: index.php");	
}
?>
