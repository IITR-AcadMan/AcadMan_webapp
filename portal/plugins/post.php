<?php
function send_post($url,$post)
{
echo '<html>
    <body onload="post()">
        <script>function post(){';
                foreach ($post as $key => $value) {
                echo "document.getElementById('".$key."').value='".$value."';";
                }
echo '           document.getElementById("formpost").click();}</script>
        <form id="post" action="'.$url.'" method="post">';
	    foreach ($post as $key => $value) {
        echo '<input hidden id="'.$key.'" type="text" name="'.$key.'">';
        }
 echo ' <input hidden id="formpost" type="submit">
        </form>    
    </body>
</html>';
}