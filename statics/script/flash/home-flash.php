  <?php
  if(!isset($_GET['images'])|| !isset($_GET['width']) || !isset($_GET['height'])){
      echo "document.write('没有指定图片');";
      exit(0);
  }
  $width = $_GET['width'];
  $height = $_GET['height'];
  $imglist = array();
  $imgtext = array();
  $imglink = array();
  foreach ($_GET['images'] as $imgone) {
      array_push($imglink,urlencode($imgone));
      array_push($imgtext,"images");
      array_push($imglist,$imgone);

  }

  $imgurls  = implode("|",$imglist);
  $imglabel = implode("|",$imgtext);
  $imghref  = implode("|",$imglink);

    		echo <<<JSCODE


    		    
    		    var focus_width=$width;
    		     var focus_height=$height;
    		     var text_height=0;
    		     var swf_height = focus_height+text_height;
    		     
    		     var pics="$imgurls";
    		     var links="$imghref";
    		     var texts="$imglabel";
    		     var flashCode = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/hotdeploy/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">';
    		     flashCode = flashCode + '<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="statics/script/flash/focus2.swf"><param name="quality" value="high"><param name="bgcolor" value="#F0F0F0">';
    		     flashCode = flashCode + '<param name="menu" value="false"><param name=wmode value="opaque">';
    		     flashCode = flashCode + '<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">';
    		     flashCode = flashCode + '<embed src="statics/script/flash/focus2.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+ focus_width +'" height="'+ swf_height +'" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'"></embed>';
    		     flashCode = flashCode + '</object>';
    		     document.write(flashCode);
JSCODE;
    		     
?>  