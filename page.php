<?php 


if( !defined( 'CUSTOMER_PAGE' ) )

  exit;



require_once DIR_SKIN.'_header.php';

?>

<div id="page">

<?php

if( isset( $aData['sName'] ) ){ 



  echo '<h1>'.$aData['sName'].'</h1>'; 



  if( isset( $aData['sPagesTree'] ) )

    echo '<div class="breadcrumb">'.$aData['sPagesTree'].'</div>'; 
  

  echo $oFile->listImagesByTypes( $aData['iPage'], 1 ); 

  

  echo $oFile->listImagesByTypes( $aData['iPage'], 2 ); 

  

  if( isset( $aData['sDescriptionFull'] ) )

    echo '<div class="content" id="pageDescription">'.$aData['sDescriptionFull'].'</div>'; 



  if( isset( $aData['sPages'] ) )

    echo '<div class="pages">'.$lang['Pages'].': <ul>'.$aData['sPages'].'</ul></div>'; 

  

  echo $oFile->listFiles( $aData['iPage'] ); 

  

  if( $aData['iSubpagesShow'] > 0 )

    echo $oPage->listSubpages( $aData['iPage'], $aData['iSubpagesShow'] ); 



  if( isset( $aData['iProducts'] ) ){

    $oProduct = Products::getInstance( );

    $_SESSION['sLastProductsPageUrl'] = $_SERVER['REQUEST_URI'];

    $_SERVER['REQUEST_URI'] = str_replace( '&', '&amp;', $_SERVER['REQUEST_URI'] );

    echo $oProduct->listProducts( $aData['iPage'], isset( $bViewAll ) ? 999 : null ); 

  }

}

else{

  echo '<div class="message" id="error"><h2>'.$lang['Data_not_found'].'</h2></div>'; 

}

?>

</div>

<?php

require_once DIR_SKIN.'_footer.php'; 
?>

