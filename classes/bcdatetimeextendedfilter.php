<?php
//
// Definition of BcDateTimeExtendedFilter class
//
// Created on: <28-Jan-2017 15:43:50 gb>
//
// Copyright (C) 2001-2017 Brookins Consulting. All rights reserved.
//
// This file may be distributed and/or modified under the terms of the
// "GNU General Public License" version 2 as published by the Free
// Software Foundation and appearing in the file LICENSE included in
// the packaging of this file.
//
// This file is provided AS IS with NO WARRANTY OF ANY KIND, INCLUDING
// THE WARRANTY OF DESIGN, MERCHANTABILITY AND FITNESS FOR A PARTICULAR
// PURPOSE.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//
// Contact licence@brookinsconsulting.com
// if any conditions of this licencing isn't clear to you.
//

/*! \file bcdatetimeextendedfilter.php
*/

/*!
  \class BcDateTimeExtendedFilter bcdatetimeextendedfilter.php
  \brief The class BcDateTimeExtendedFilter does the calculation of a sql part to limit results by datetime stamp

*/

class BcDateTimeExtendedFilter
{
    /*!
     Constructor
    */
    function BcDateTimeExtendedFilter()
    {
    }

    /*!
     Create SQL parts
    */
    function createSqlParts( $params )
    {
        $db = eZDB::instance();

        $attributes=array( array( 'published', "UNIX_TIMESTAMP(CONCAT(YEAR(CURDATE()),'-01-01'))" ),
                           array( 'modified', "UNIX_TIMESTAMP(CONCAT(YEAR(CURDATE()),'-01-01'))" ) );
        $sqlCondArray = array();
        $sqlTables = ' ';
        $sqlJoins = ' ';


        foreach( $attributes as $attribute )
        {
          $_name = $attribute[0];
          if ( isset( $params[$_name] ) )
          {
              // $_timestamp = $db->escapeString( $attribute[1] );
              $_attribute = $db->escapeString( $attribute[0] );
              $_timestamp = $db->escapeString( $params[$_name] );

              if ( $_timestamp != false )
              {
                  $sqlCondArray[] = "ezcontentobject." . $_attribute . " >= $_timestamp";
              }
          }
        }

        if( !empty( $sqlCondArray ) )
        {
            $sqlTables= '';
            $sqlJoins = '';

            $sqlCond = implode( ' AND ', $sqlCondArray );
            $sqlCond = ' ' . $sqlCond . ' AND ' . $sqlJoins . ' ';
            $sqlJoins = $sqlCond;

            /*
             print_r( $sqlJoins );
             print_r( "<hr />");
             */
        }

        return array( 'tables' => $sqlTables,
                      'joins'  => $sqlJoins );
    }
}

?>