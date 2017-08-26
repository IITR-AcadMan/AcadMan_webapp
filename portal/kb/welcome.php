<?php
require_once(dirname(dirname(__FILE__)).'/plugins/session.php');
require_once(dirname(dirname(__FILE__)).'/config.php');
if (!chk_tok()){
header('Location: '.DOMAIN.PATH.'/register.php?msg=1');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>AcadMan | Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;}
  #section2 {padding-top:50px;height:500px;}
  #section3 {padding-top:50px;height:500px;}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">AcadMan</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">Section 1</a></li>
          <li><a href="#section2">Section 2</a></li>
          <li><a href="#section3">Section 3</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container-fluid" style="min-height: inherit;">
  <h1>Section 1</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque sapien, feugiat in sem aliquet, vestibulum rutrum nisi. Cras vitae porttitor arcu. Etiam a dictum orci, ac convallis enim. Etiam ullamcorper luctus ligula, ut cursus massa. Maecenas vitae venenatis justo, id tempus neque. Sed blandit nibh eget magna porta, vitae dignissim nisl fringilla. Aenean nec diam tincidunt, sodales sem vel, condimentum nisl. Etiam quam turpis, luctus sit amet auctor a, varius nec ligula. Etiam condimentum lacinia tellus, sit amet egestas elit accumsan hendrerit. Pellentesque vestibulum diam eu mauris rhoncus, at maximus velit interdum. Proin id augue libero. Interdum et malesuada fames ac ante ipsum primis in faucibus.

Cras in justo vel mauris feugiat placerat. Duis dignissim eget diam in scelerisque. Cras finibus suscipit aliquam. Ut volutpat tortor sed lectus lobortis maximus. Fusce luctus ante odio, vitae malesuada neque maximus malesuada. Fusce vestibulum tellus est, nec tempus mi rutrum non. Cras eget lorem quis urna cursus vestibulum. Vestibulum convallis iaculis nisi et luctus. Sed euismod lectus vel luctus porttitor. Aliquam pulvinar metus et eros dictum, vitae posuere eros molestie. In ac dui id ipsum molestie consequat. Praesent maximus fringilla risus at sagittis. Sed id iaculis nunc, et tincidunt justo.

Integer viverra, leo a varius tempor, nisl metus tristique arcu, viverra pulvinar dolor nisl ac massa. Nulla orci dolor, posuere eu malesuada non, sollicitudin nec magna. Integer pretium turpis nunc, in tincidunt quam gravida non. Nulla odio nibh, tristique ac felis vel, lacinia tincidunt enim. Sed lacus lorem, tristique id elit eu, sodales efficitur libero. Fusce eu turpis rutrum, iaculis lectus dictum, vulputate leo. Praesent ligula velit, accumsan vel felis eu, condimentum pharetra libero. Sed laoreet urna ex, a auctor nibh lacinia pretium. Nulla blandit, purus volutpat euismod vulputate, leo justo blandit mauris, sodales vestibulum ipsum arcu a ligula. Praesent id nisl eu nisl venenatis dictum laoreet quis dolor. Duis iaculis dolor eros, aliquet lobortis quam accumsan ut. Pellentesque feugiat ex ante, a posuere nunc interdum eget. Nam diam dui, tincidunt vel tellus quis, scelerisque ullamcorper turpis. Ut tincidunt nisl in venenatis condimentum.

Integer pretium mi et varius dictum. Maecenas tempus eleifend ipsum ac venenatis. Cras mollis leo sit amet lectus malesuada scelerisque. Nullam ultrices eleifend feugiat. Vestibulum convallis elit quis pulvinar ornare. Mauris maximus felis nec dui iaculis fermentum id sed mi. Phasellus quis orci non quam vestibulum porttitor. Morbi eu vestibulum augue. Donec mattis dictum elementum. Etiam orci lacus, pharetra fermentum libero quis, vestibulum mollis metus. Duis sed tincidunt ipsum. Nunc hendrerit, tortor sed placerat mollis, nulla metus facilisis nisi, a egestas eros diam et nibh. Ut mollis, risus a laoreet accumsan, enim erat dapibus tellus, ut pellentesque leo felis eget eros. Sed quis tortor augue. Maecenas blandit condimentum diam, a pellentesque eros auctor nec.

Phasellus vitae consectetur ex. Nam leo massa, scelerisque eget felis ac, condimentum tincidunt quam. Aliquam sed lacus efficitur, imperdiet libero ac, pharetra ipsum. Pellentesque iaculis nibh ac ultricies fermentum. In mi leo, sodales at convallis vitae, convallis a nunc. Duis rhoncus nibh nec nisi porttitor, sit amet dapibus nibh pulvinar. Vestibulum ac leo non massa commodo cursus. Nunc nec consectetur metus, at pulvinar nulla. Vestibulum luctus tincidunt elit vitae malesuada.</p>
</div>
<div id="section2" class="container-fluid" style="min-height: inherit;">
  <h1>Section 2</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque sapien, feugiat in sem aliquet, vestibulum rutrum nisi. Cras vitae porttitor arcu. Etiam a dictum orci, ac convallis enim. Etiam ullamcorper luctus ligula, ut cursus massa. Maecenas vitae venenatis justo, id tempus neque. Sed blandit nibh eget magna porta, vitae dignissim nisl fringilla. Aenean nec diam tincidunt, sodales sem vel, condimentum nisl. Etiam quam turpis, luctus sit amet auctor a, varius nec ligula. Etiam condimentum lacinia tellus, sit amet egestas elit accumsan hendrerit. Pellentesque vestibulum diam eu mauris rhoncus, at maximus velit interdum. Proin id augue libero. Interdum et malesuada fames ac ante ipsum primis in faucibus.

Cras in justo vel mauris feugiat placerat. Duis dignissim eget diam in scelerisque. Cras finibus suscipit aliquam. Ut volutpat tortor sed lectus lobortis maximus. Fusce luctus ante odio, vitae malesuada neque maximus malesuada. Fusce vestibulum tellus est, nec tempus mi rutrum non. Cras eget lorem quis urna cursus vestibulum. Vestibulum convallis iaculis nisi et luctus. Sed euismod lectus vel luctus porttitor. Aliquam pulvinar metus et eros dictum, vitae posuere eros molestie. In ac dui id ipsum molestie consequat. Praesent maximus fringilla risus at sagittis. Sed id iaculis nunc, et tincidunt justo.

Integer viverra, leo a varius tempor, nisl metus tristique arcu, viverra pulvinar dolor nisl ac massa. Nulla orci dolor, posuere eu malesuada non, sollicitudin nec magna. Integer pretium turpis nunc, in tincidunt quam gravida non. Nulla odio nibh, tristique ac felis vel, lacinia tincidunt enim. Sed lacus lorem, tristique id elit eu, sodales efficitur libero. Fusce eu turpis rutrum, iaculis lectus dictum, vulputate leo. Praesent ligula velit, accumsan vel felis eu, condimentum pharetra libero. Sed laoreet urna ex, a auctor nibh lacinia pretium. Nulla blandit, purus volutpat euismod vulputate, leo justo blandit mauris, sodales vestibulum ipsum arcu a ligula. Praesent id nisl eu nisl venenatis dictum laoreet quis dolor. Duis iaculis dolor eros, aliquet lobortis quam accumsan ut. Pellentesque feugiat ex ante, a posuere nunc interdum eget. Nam diam dui, tincidunt vel tellus quis, scelerisque ullamcorper turpis. Ut tincidunt nisl in venenatis condimentum.

Integer pretium mi et varius dictum. Maecenas tempus eleifend ipsum ac venenatis. Cras mollis leo sit amet lectus malesuada scelerisque. Nullam ultrices eleifend feugiat. Vestibulum convallis elit quis pulvinar ornare. Mauris maximus felis nec dui iaculis fermentum id sed mi. Phasellus quis orci non quam vestibulum porttitor. Morbi eu vestibulum augue. Donec mattis dictum elementum. Etiam orci lacus, pharetra fermentum libero quis, vestibulum mollis metus. Duis sed tincidunt ipsum. Nunc hendrerit, tortor sed placerat mollis, nulla metus facilisis nisi, a egestas eros diam et nibh. Ut mollis, risus a laoreet accumsan, enim erat dapibus tellus, ut pellentesque leo felis eget eros. Sed quis tortor augue. Maecenas blandit condimentum diam, a pellentesque eros auctor nec.

Phasellus vitae consectetur ex. Nam leo massa, scelerisque eget felis ac, condimentum tincidunt quam. Aliquam sed lacus efficitur, imperdiet libero ac, pharetra ipsum. Pellentesque iaculis nibh ac ultricies fermentum. In mi leo, sodales at convallis vitae, convallis a nunc. Duis rhoncus nibh nec nisi porttitor, sit amet dapibus nibh pulvinar. Vestibulum ac leo non massa commodo cursus. Nunc nec consectetur metus, at pulvinar nulla. Vestibulum luctus tincidunt elit vitae malesuada.</p>
</div>
<div id="section3" class="container-fluid" style="min-height: inherit;">
  <h1>Section 3</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam neque sapien, feugiat in sem aliquet, vestibulum rutrum nisi. Cras vitae porttitor arcu. Etiam a dictum orci, ac convallis enim. Etiam ullamcorper luctus ligula, ut cursus massa. Maecenas vitae venenatis justo, id tempus neque. Sed blandit nibh eget magna porta, vitae dignissim nisl fringilla. Aenean nec diam tincidunt, sodales sem vel, condimentum nisl. Etiam quam turpis, luctus sit amet auctor a, varius nec ligula. Etiam condimentum lacinia tellus, sit amet egestas elit accumsan hendrerit. Pellentesque vestibulum diam eu mauris rhoncus, at maximus velit interdum. Proin id augue libero. Interdum et malesuada fames ac ante ipsum primis in faucibus.

Cras in justo vel mauris feugiat placerat. Duis dignissim eget diam in scelerisque. Cras finibus suscipit aliquam. Ut volutpat tortor sed lectus lobortis maximus. Fusce luctus ante odio, vitae malesuada neque maximus malesuada. Fusce vestibulum tellus est, nec tempus mi rutrum non. Cras eget lorem quis urna cursus vestibulum. Vestibulum convallis iaculis nisi et luctus. Sed euismod lectus vel luctus porttitor. Aliquam pulvinar metus et eros dictum, vitae posuere eros molestie. In ac dui id ipsum molestie consequat. Praesent maximus fringilla risus at sagittis. Sed id iaculis nunc, et tincidunt justo.

Integer viverra, leo a varius tempor, nisl metus tristique arcu, viverra pulvinar dolor nisl ac massa. Nulla orci dolor, posuere eu malesuada non, sollicitudin nec magna. Integer pretium turpis nunc, in tincidunt quam gravida non. Nulla odio nibh, tristique ac felis vel, lacinia tincidunt enim. Sed lacus lorem, tristique id elit eu, sodales efficitur libero. Fusce eu turpis rutrum, iaculis lectus dictum, vulputate leo. Praesent ligula velit, accumsan vel felis eu, condimentum pharetra libero. Sed laoreet urna ex, a auctor nibh lacinia pretium. Nulla blandit, purus volutpat euismod vulputate, leo justo blandit mauris, sodales vestibulum ipsum arcu a ligula. Praesent id nisl eu nisl venenatis dictum laoreet quis dolor. Duis iaculis dolor eros, aliquet lobortis quam accumsan ut. Pellentesque feugiat ex ante, a posuere nunc interdum eget. Nam diam dui, tincidunt vel tellus quis, scelerisque ullamcorper turpis. Ut tincidunt nisl in venenatis condimentum.

Integer pretium mi et varius dictum. Maecenas tempus eleifend ipsum ac venenatis. Cras mollis leo sit amet lectus malesuada scelerisque. Nullam ultrices eleifend feugiat. Vestibulum convallis elit quis pulvinar ornare. Mauris maximus felis nec dui iaculis fermentum id sed mi. Phasellus quis orci non quam vestibulum porttitor. Morbi eu vestibulum augue. Donec mattis dictum elementum. Etiam orci lacus, pharetra fermentum libero quis, vestibulum mollis metus. Duis sed tincidunt ipsum. Nunc hendrerit, tortor sed placerat mollis, nulla metus facilisis nisi, a egestas eros diam et nibh. Ut mollis, risus a laoreet accumsan, enim erat dapibus tellus, ut pellentesque leo felis eget eros. Sed quis tortor augue. Maecenas blandit condimentum diam, a pellentesque eros auctor nec.

Phasellus vitae consectetur ex. Nam leo massa, scelerisque eget felis ac, condimentum tincidunt quam. Aliquam sed lacus efficitur, imperdiet libero ac, pharetra ipsum. Pellentesque iaculis nibh ac ultricies fermentum. In mi leo, sodales at convallis vitae, convallis a nunc. Duis rhoncus nibh nec nisi porttitor, sit amet dapibus nibh pulvinar. Vestibulum ac leo non massa commodo cursus. Nunc nec consectetur metus, at pulvinar nulla. Vestibulum luctus tincidunt elit vitae malesuada.</p>
</div>
<p align="right"><input class="btn btn-primary" onClick="window.location = '../dashboard.php';" type="submit" value="Continue to dashboard >>"></p>
</body>
</html>