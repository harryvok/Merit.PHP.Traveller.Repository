//>>excludeStart("jqmBuildExclude", pragmas.jqmBuildExclude);
//>>description: Extends the table widget to a column toggle menu and responsive column visibility
//>>label: Table: Column Toggle
//>>group: Widgets
//>>css.structure: ../css/structure/jquery.mobile.table.columntoggle.css


define( [ "jquery", "./table", "../jquery.mobile.buttonMarkup", "./popup", "../jquery.mobile.fieldContain", "widgets/controlgroup", "widgets/forms/checkboxradio" ], function( jQuery ) {
//>>excludeEnd("jqmBuildExclude");
(function( $, undefined ) {
// xxx tables - add stuff
$.mobile.table.prototype.options.mode = "columntoggle";
$.mobile.table.prototype.options.columnBtnTheme = null;
$.mobile.table.prototype.options.columnPopupTheme = null;
$.mobile.table.prototype.options.columnBtnText = "Columns";
$.mobile.table.prototype.options.slot = 3;
$.mobile.table.prototype.options.icon = "gear";
$.mobile.table.prototype.options.iconpos = "left";

$.mobile.table.prototype.options.classes = $.extend(
  $.mobile.table.prototype.options.classes,
  {
    popup: "ui-table-columntoggle-popup",
    columnBtn: "ui-table-columntoggle-btn",
    priorityPrefix: "ui-table-priority-",
    columnToggleTable: "ui-table-columntoggle"
  }
);

$.mobile.document.delegate( ":jqmData(role='table')", "tablecreate", function(e) {

  var $table = $( this ),
    event = e.type,
    self = $table.data( "mobile-table" ),
    o = self.options,
    ns = $.mobile.ns,
    id = ( $table.attr( "id" ) || o.classes.popup ) + "-popup"; //TODO BETTER FALLBACK ID HERE

  if( o.mode !== "columntoggle" ){
    return;
  }

  // xxx eventsonly
  if ( o.eventsOnly !== false ) {
    if ( event !== "tableupdate") {
      // xxx table - add themes
      o.columnPopupTheme = $table.jqmData("popup-theme") || o.themes.wrapper || "c";
      o.columnBtnTheme = $table.jqmData("popup-btn-theme") || o.themes.wrapper || "c";

      self.element.addClass( o.classes.columnToggleTable );

      var $menuButton = $( "<a href='#" + id + "' class='" + o.classes.columnBtn + "' data-" + ns + "rel='popup' data-" + ns + "mini='true'>" + o.columnBtnText + "</a>" ),
        $popup = $( "<div data-" + ns + "role='popup' data-" + ns + "theme='" + o.themes.wrapper +"' data-" + ns + "role='fieldcontain' class='" + o.classes.popup + "' id='" + id + "'></div>"),
        $menu = $("<fieldset data-" + ns + "role='controlgroup'></fieldset>"),
        // xxx tables - add sortables and multi row header handler
        $sortables = $table.find('th:jqmData(sortable="true")'),
        $headerRows = $table.find('thead tr'),
        $topCells,
        $bottomCells,
        $switchboard;
        
      // top/bottom cells
      if ($headerRows.length > 1) {
        $topCells = $table.find('thead tr:first-child th' ).not('[rowspan=2]');
      }
    }
  }

  // create the hide/show toggles
  self.headers.not( "td" ).each(function(i){

    var priority = $( this ).jqmData( "priority" ),
      $cells = $( this ).add( $( this ).jqmData( "cells" ) );

    if( priority ){
      $cells.addClass( o.classes.priorityPrefix + priority );

      if (event !== "tableupdate") {
        $("<label><input type='checkbox' checked />" + $( this ).text() + "</label>" )
          .appendTo( $menu )
          .children( 0 )
          .jqmData( "cells", $cells )
          .checkboxradio({
            theme: o.columnPopupTheme
          });
      } else {
        $('#'+id+ ' fieldset div:eq('+i+')').find('input').jqmData("cells", $cells)
      }
    }
  });
  if (event !== "tableupdate") {
    $menu.appendTo( $popup );
  }
  
  // bind change event listeners to inputs - TODO: move to a private method?
  if ($menu === undefined) { 
    $switchboard = $('#'+id+' fieldset');
  } else {
    $switchboard = $menu;
  }
  if (event !== "tableupdate") {
    $switchboard.on( "change", "input", function( e ){
      // xxx table multi header handler
      if( this.checked ){
        $( this ).jqmData( "cells" ).removeClass( "ui-table-cell-hidden" ).addClass( "ui-table-cell-visible" );
      }
      else {
        $( this ).jqmData( "cells" ).removeClass( "ui-table-cell-visible" ).addClass( "ui-table-cell-hidden" );
      }

      // xxx table multi header handler
      if ($headerRows.length > 1) {
        // xxx determine bottom cells now to see which ones are visible and which ones are not
        $bottomCells = $table.find('thead tr:last-child th').length - $table.find('thead tr:last-child th.ui-table-cell-hidden').length;
        if ($bottomCells === 0) {
          $topCells.addClass("ui-table-cell-hidden").removeClass("ui-table-cell-visible");
        } else {
          $topCells.attr('colspan',$bottomCells).addClass("ui-table-cell-visible");
        }
      }
    });

    // xxx eventsonly
    if ( o.eventsOnly != false ){
      // XXX tables - sortable header cells
      if ( $sortables.length > 0 ){
        for ( var l = 0; l < $sortables.length; l++){
          var currentHeader = $sortables.eq(l),
            sortTitle = currentHeader.text(),
            sortButton = 
              $( document.createElement( "a" ) )
                .text( sortTitle )
                .buttonMarkup({
                  shadow: false,
                  corners: false,
                  theme: o.themes.header,
                  iconpos: "right",
                  icon: currentHeader.is( '.ui-bottomUp' ) ? "arrow-u" : "arrow-d"
                  })
                .addClass("ui-sortable");
                
          currentHeader
            .addClass('ui-btn-up-'+o.headerTheme )
            .filter(':jqmData(sortable="true")')
            .html( sortButton )
        }
      }
      // xxx table - insert into wrapper or before table
      $menuButton[ o.containers.top ? "appendTo" : "insertBefore" ]
          ( o.containers.top ? $('.table-top-wrapper').children().eq(o.slot-1) : $table )
        .buttonMarkup({
          theme: o.columnBtnTheme,
          // xxx table - add icon/iconpos
          icon: $table.jqmData("popup-btn-icon") ||o.columnBtnIcon,
          iconpos: $table.jqmData("popup-btn-iconpos") || o.columnBtnIconPos
        });

      $popup
        .insertBefore( $table )
        .popup();
    }
  }
  // refresh method
  self.update = function(){
    $switchboard.find( "input" ).each( function(){
      if (this.checked) {
        this.checked = $( this ).jqmData( "cells" ).eq(0).css( "display" ) === "table-cell";
        if (event === "tableupdate") {
          $( this ).jqmData( "cells" ).addClass('ui-table-cell-visible');
        }
      } else {
        $( this ).jqmData( "cells" ).addClass('ui-table-cell-hidden');
      }
      $( this ).checkboxradio( "refresh" );
    });
  };

  $.mobile.window.on( "throttledresize", self.update );

  self.update();
});

})( jQuery );
//>>excludeStart("jqmBuildExclude", pragmas.jqmBuildExclude);
});
//>>excludeEnd("jqmBuildExclude");
