<?php
session_start();
include("header.php");
?>
<p>&nbsp;</p>
<form>
 <p>
 &nbsp; Your Name: <input type="text" name="name"/>
   <br />
 &nbsp; Your E-mail: <input type="text" name="email"/>
   <br />
 &nbsp; Message: <input type="text" name="message"/></p>

<input type="submit" name="email" value="Send"/>
</form>
<?php
include("footer.php");
?>