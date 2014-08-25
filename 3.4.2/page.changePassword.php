<form method="post" action="process.php">
    <label >Current Password</label>
    <input type="password" name='current' maxlength='15' class='text'><br>
    <label >New Password</label>
    <input type="password" name='new' maxlength='15' class='text'><br>
    <label >Repeat New Password</label>
    <input type="password" name='repeat' maxlength='15' class='text'><br><br>
    <input type="hidden" name="action" value="ChangePassword" />
    <input type="submit"   value="Submit">
</form>
