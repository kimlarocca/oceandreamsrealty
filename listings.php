<?php require_once('Connections/cms.php'); ?>
<?php
$pageID = $listingsPage;
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysqli_select_db($cms, $database_cms);
$query_Recordset1 = "SELECT * FROM listings  LEFT JOIN (SELECT photoAlbums.albumID,photoAlbums.coverPhotoID,photoAlbums.albumName,photos.id,photos.file_name FROM photoAlbums,photos WHERE photoAlbums.coverPhotoID=photos.id)  AS a ON listings.albumID=a.albumID  WHERE displayOnSite=1 AND listings.websiteID = ".$websiteID;
$Recordset1 = mysqli_query($cms, $query_Recordset1) or die(mysqli_error($cms));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_select_db($cms, $database_cms);
$query_currentPage = "SELECT * FROM cmsPages WHERE pageID = ".$pageID;
$currentPage = mysqli_query($cms, $query_currentPage) or die(mysqli_error($cms));
$row_currentPage = mysqli_fetch_assoc($currentPage);
$totalRows_currentPage = mysqli_num_rows($currentPage);

mysqli_select_db($cms, $database_cms);
$query_websiteInfo = "SELECT * FROM cmsWebsites WHERE websiteID = ".$websiteID;
$websiteInfo = mysqli_query($cms, $query_websiteInfo) or die(mysqli_error($cms));
$row_websiteInfo = mysqli_fetch_assoc($websiteInfo);
$totalRows_websiteInfo = mysqli_num_rows($websiteInfo);
?>
<?php
$pageTitle = $row_currentPage['pageTitle'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $row_websiteInfo['companyName']; ?>|<?php echo $row_currentPage['pageTitle']; ?></title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="styles/WickedNav.css"/>
<link rel="stylesheet" type="text/css" href="styles/Wicked.css"/>
<!-- InstanceBeginEditable name="head" -->
<link rel="stylesheet" type="text/css" href="styles/masonry.css"/>
<!-- InstanceEndEditable -->
</head>

<body>
<div class="wn_containerWrapper">
  <!-- navigation -->
  <div class="wn_container">
    <div class="wn_menu">MENU
      <div id="wn_hamburger"><span></span><span></span><span></span></div>
    </div>
    <div class="wn_title"><?php echo $row_websiteInfo['companyName']; ?></div>
  </div>
  <!-- slide out menu -->
  <div class="wn_expandedMenu" style="display:none">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="listings.php">Listings</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="meet-our-team.php">Meet Our Team</a></li>
      <li><a href="resources.php">Resources</a></li>
      <li><a href="search.php">Search The MLS</a></li>
      <li><a href="careers.php">Careers With Us</a></li>
      <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <div class="wn_social">
      <div class="wn_socialTitle">CONNECT</div>
      <div class="wn_socialIconWrapper">
        <?php if($row_websiteInfo['facebook']!=''){ ?><div class="wn_socialIcon"><a href="<?php echo $row_websiteInfo['facebook']; ?>"><img src="images/facebook.png" width="32" height="32" /></a></div><?php } ?>
        <?php if($row_websiteInfo['twitter']!=''){ ?><div class="wn_socialIcon"><a href="<?php echo $row_websiteInfo['twitter']; ?>"><img src="images/twitter.png" width="32" height="32" /></a></div><?php } ?>
        <?php if($row_websiteInfo['pinterest']!=''){ ?><div class="wn_socialIcon"><a href="<?php echo $row_websiteInfo['pinterest']; ?>"><img src="images/pinterest.png" width="32" height="32" /></a></div><?php } ?>
        <?php if($row_websiteInfo['linkedin']!=''){ ?><div class="wn_socialIcon"><a href="<?php echo $row_websiteInfo['linkedin']; ?>"><img src="images/linked-in.png" width="32" height="32" /></a></div><?php } ?>
        <?php if($row_websiteInfo['youtube']!=''){ ?><div class="wn_socialIcon"><a href="<?php echo $row_websiteInfo['youtube']; ?>"><img src="images/you-tube.png" width="32" height="32" /></a></div><?php } ?>
        <?php if($row_websiteInfo['vimeo']!=''){ ?><div class="wn_socialIcon"><a href="<?php echo $row_websiteInfo['vimeo']; ?>"><img src="images/vimeo.png" width="32" height="32" /></a></div><?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- main content -->
<div class="content">
<!-- InstanceBeginEditable name="mainContent" -->
  <div class="header">
    <h1><?php echo $row_currentPage['pageTitle']; ?></h1>
  </div>
  <div class="triangle"> <svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
    <path style="fill:#4b8db1;" d="M0 0 L50 100 L100 0 Z" />
    </svg> </div>
  <div class="main">

    <!-- listings grid -->
    <!-- grid -->
    <div class="masonry js-masonry"  data-masonry-options='{ "isFitWidth": true }'>
      <?php do { ?>
        <div class="item"><a href="listing-details.php?listingID=<?php echo $row_Recordset1['listingID']; ?>">
          <div class="overlay-item">
            <div class="item-image">
              <?php
		if ($row_Recordset1['coverPhotoID'] == NULL){
		?>
              <img src="http://4siteusa.com/uploads/comingsoon.jpg">
              <?php
		} else {
		?>
              <img src="http://4siteusa.com/uploads/thumb-<?php echo $row_Recordset1['file_name']; ?>">
              <?php
		}
		?>
            </div>
            <div class="item-title">
              <h2><?php echo $row_Recordset1['propertyStatus']; ?></h2>
            </div>
            <p><?php echo $row_Recordset1['shortDescription']; ?></p>
            <hr />
            <p>Price: <?php echo "$".number_format($row_Recordset1['propertyPrice'],0); ?><br />
              Beds: <?php echo $row_Recordset1['beds']; ?>, Baths: <?php echo $row_Recordset1['baths']; ?></p>
            <div class="wf_centered" class="wf_margin20"><a class="button" href="listing-details.php?listingID=<?php echo $row_Recordset1['listingID']; ?>">view details</a></div>
          </div>
          </a> </div>
        <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </div>
  </div>
  <!-- InstanceEndEditable -->

  <!-- footer -->
  <div class="footer">
    <div class="wf_row">
      <div class="wf_column wf_two">
        <h2><a href="index.php">Home</a> | <a href="about.php">About Us</a> | <a href="meet-our-team.php">Meet Our Team</a> | <a href="listings.php">Listings</a> | <a href="search.php">Property Search</a> | <a href="contact.php">Contact Us</a></h2>
        <p>Copyright &copy; <?php echo $row_websiteInfo['firstName']; ?> <?php echo $row_websiteInfo['lastName']; ?> <?php echo date("Y"); ?>, All Rights Reserved.</p>
        <p>Web Design by <a href="http://www.4siteusa.com">4 Site</a>.</p>
      </div>
      <div class="wf_column wf_two wf_text_right">
        <h2><?php echo $row_websiteInfo['companyName']; ?></h2>
        <p><?php echo $row_websiteInfo['iaddress']; ?></p>
        <?php if ($row_websiteInfo['iaddress2'] <> ''){ ?>
        <p><?php echo $row_websiteInfo['iaddress2']; ?></p>
        <?php } ?>
        <p><?php echo $row_websiteInfo['phoneNumber']; ?></p>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- InstanceBeginEditable name="scripts" -->
<script type="text/javascript" src="scripts/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="scripts/imagesloaded.pkgd.min.js"></script>
<script>
$(document).ready(function() {
  // initiallize masonry
  var $container = $('.masonry').masonry();
  $container.imagesLoaded( function() {
    $container.masonry();
  $container.masonry('bindResize');
  });
  $container.masonry('bindResize');
});
</script>
<!-- InstanceEndEditable -->
<script type="text/javascript" src="scripts/WickedNav.js"></script>
</body>
<!-- InstanceEnd --></html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($currentPage);

mysqli_free_result($websiteInfo);
?>
