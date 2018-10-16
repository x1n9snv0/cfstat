<?php
$id=chkstr($_GET["id"],2);

$sql="select * from cfstat_gbook where username='$username' and id=$id";
$result=$conn->query($sql);
$rs=mysqli_fetch_assoc($result);
?>
  <form name="form1" method="post" action="?action=gbookmodifysave&id=<?php echo $id;?>">   
<table class="tb_1">

    <tr class="tr_1"> 
      <td colspan="2">留言修改</td>
    </tr>
    <tr> 
      <td>留言内容：</td>
      <td><textarea name='content' id='content' cols='40' rows='8'><?php echo $rs["content"];?></textarea></td>
    </tr>
    <tr> 
      <td>联系方式：</td>
      <td> <textarea name='contact' id='contact' cols='40' rows='8'><?php echo $rs["contact"];?></textarea> </td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="修改">      </td>
    </tr>

</table>  </form>