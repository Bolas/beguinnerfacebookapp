<? include_once "header.php"; ?>
<!DOCTYPE html>
<html>
    <head></head>
    <style type="text/css">
        .table{
        width: 100%;
        height: 100px;
        border: 3px solid #133783;
        }
        .table .column:not(:last-child){
        border-right: 1px solid #4c66a4;
        height: 100px;
        width:15%;
        float:left;
        text-align: center;
        }
        .title{
        color:#4c66a4;
        margin-bottom: 15px;
        font-weight: bold;
        }
    </style>
    <body>
<div class='table'>
  <div class='column'>
      <div class='title'>id</div>
      <? echo $userdata['id']; ?>
  </div>
  <div class='column'>
      <div class='title'>gender</div>
      <img src="img/<? echo $userdata['gender']; ?>.jpg " width='30'>
  </div>
  <div class='column'>
      <div class='title'>profile pic</div>
      <? echo "<img src='http://graph.facebook.com/".$userdata['id']."/picture?width=50&height=50'  />" ?>
  </div>
  <div class='column'>
      <div class='title'>name</div>
      <? echo $userdata['name']; ?>
  </div>
  <div class='column'>
      <div class='title'>birthday</div>
      <? echo $userdata['birthday']; ?>
  </div>
  <div class='column'>
      <div class='title'>email</div>
      <? echo $userdata['email']; ?>
  </div>
        </div>
    </body>
</html>