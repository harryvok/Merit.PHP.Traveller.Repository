<div id="topbar">
    <div id="title">Change Password</div>
    <div id="leftnav"><a href="index.php?" href="#"><img alt="home" src="images/home.png" /></a></div>
</div>
<div id="wrapper">
    <div id="scroller">
        <div id="content">
            <?php include("mobile/page.output.php"); ?>
            <form method="post" action="process.php">
            
                <span class="graytitle">Current Password</span>
                <ul class="pageitem">
                    <li class="bigfield"><input name='current' maxlength='15'></li>
                </ul>
                <span class="graytitle">New Password</span>
                <ul class="pageitem">
                    <li class="bigfield"><input name='new' maxlength='15'></li>
                </ul>
                <span class="graytitle">Repeat New Password</span>
                <ul class="pageitem">
                    <li class="bigfield"><input name='repeat' maxlength='15'></li>
                </ul>
                <input type="hidden" name="action" value="ChangePassword" />
                <ul class="pageitem">
                    <li class="button"><input name="Submit input" type="submit"  value="Submit" /></li>
                </ul>
            
            </form>
        </div>
    </div>
</div>