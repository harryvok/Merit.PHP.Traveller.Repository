<div data-role="page" id="default">
	<form method="post" id="changePassword" action="process.php">
      <div data-role="header" data-position="fixed">
      	<h1>Change Password</h1>
          <!--<a data-icon="check"  href="javascript: void(0)" data-role="button" data-theme="b" false data-iconpos="left" id="save" data-inline="true" data-role="button">Save</a>-->
      </div>
      <div data-role="content">
        <?php include("mobile/page.navSidebar.php"); ?>
        <div class="content-primary">
          <?php include("mobile/page.output.php"); ?>
          <script type="text/javascript">
			/*$("#default").bind("pageshow", function(e) {
			    $("#save").click(function () {
			       
						$("#changePassword").submit();
						
				});
				$("#changePassword").validate();
			});*/
		 </script>
          <label for="password">Current Password</label>
          <input type="password" name='current' class="required" maxlength='15'>
          <label for="password">New Password</label>
          <input type="password" name='new' class="required" maxlength='15'>
          <label for="password">Repeat Password</label>
          <input type="password" name='repeat' class="required" maxlength='15'>
          <input type="hidden" name="action" value="ChangePassword" />
            <input type="submit" value="submit"/>
          </div>
      </div>
  </form>
  </div>
 