<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo $wrap_before;
 
	foreach ( $breadcrumb as $key => $crumb ) {
 
	   echo $before;
 
	   if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
		  echo '<a class="mr-1" href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
	   } else {
			 if(!is_singular()){
				 echo esc_html( $crumb[0] );
			 }
	   }
 
	   echo $after;
		 if(sizeof( $breadcrumb ) -2 == $key && (is_singular())){
			 continue;
		 }
 
	   if ( sizeof( $breadcrumb ) !== $key + 1 ) {
		  echo $delimiter;
	   }
	}
 
	echo $wrap_after;
 
 }