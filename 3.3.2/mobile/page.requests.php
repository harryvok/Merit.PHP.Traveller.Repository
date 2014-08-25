<a name="top" title="top"></a>
<div id="topbar">
    <div id="title">Requests</div>
    <div id="leftnav"><a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a></div>
    <div id="rightbutton"><a class="iphoneplus" href="index.php?page=new-request">+</a></div>
</div>

<div id="wrapper">
    <div id="scroller">
        <div id="content">
            <span class="graytitle">Filter</span>
            <form name="jump">
                <ul class="pageitem">
                    <li class="select">
                        <?php
                        $controller->Dropdown("RequestFilters");
                        ?>
                        <span class="arrow"></span>
                    </li>
                </ul>
                
            </form>
            <ul class="pageitem">
                <li class="bigfield"><input class="text" type="button" value="Go to bottom" onclick="self.location.hash='bottom'" /></li>
            </ul>
            <?php
            $controller->Invoke("RequestIntray");
            ?>
            <ul class="pageitem">
                <li class="bigfield"><input class="text" type="button" value="Go to top" onclick="self.location.hash='top'" /></li>
            </ul>
        </div>
    </div>
</div>
<a name="bottom" title="bottom"></a>