<?php
$post = file_get_contents('php://input');

preg_match('/(?<=path":").+?(?=")/',$post,$path);

$contents=file_get_contents($path[0]);

switch (true) {
	case stristr($path[0],"png"):
		$myfile = "img/testfile.png";		
		break;
		case stristr($path[0],"PNG"):
		$myfile = "img/testfile.png";
		break;
	case stristr($path[0],"Png"):
		$myfile = "img/testfile.png";
		break;
		case stristr($path[0],"jpg"):
		$myfile = "img/testfile.jpg";
		break;
		case stristr($path[0],"JPG"):
		$myfile = "img/testfile.jpg";
		break;
	case stristr($path[0],"Jpg"):
		$myfile = "img/testfile.jpg";
		
		break;
		case stristr($path[0],"gif"):
		$myfile = "img/testfile.gif";
		
		break;
		case stristr($path[0],"GIF"):
		$myfile = "img/testfile.gif";
		
		break;
	case stristr($path[0],"Gif"):
		$myfile = "img/testfile.gif";
		
		break;
		case stristr($path[0],"TIFF"):
		$myfile = "img/testfile.tiff";
		break;
		case stristr($path[0],"tiff"):
		$myfile = "img/testfile.tiff";
		
		break;
	case stristr($path[0],"Tiff"):
		$myfile = "img/testfile.tiff";
		
		break;
	default:
		echo "file is not an image";
		break;
}
file_put_contents($myfile,$contents);

?>