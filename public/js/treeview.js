$(document).ready(function () {
    $.fn.extend({
        treed: function (o) {
          
          var openedClass = 'glyphicon-minus-sign';
          var closedClass = 'glyphicon-plus-sign';
          
          if (typeof o != 'undefined'){
            if (typeof o.openedClass != 'undefined'){
                openedClass = o.openedClass;
            }
            if (typeof o.closedClass != 'undefined'){
                closedClass = o.closedClass;
            }
          };
          
            /* initialize each of the top levels */
            var tree = $(this);
            tree.addClass("tree");
            tree.find('li').has("ul").each(function () {
                var branch = $(this);
                branch.prepend("");
                branch.addClass('branch');
                branch.on('click', function (e) {
                    if (this == e.target) {
                        var icon = $(this).children('i:first');
                        icon.toggleClass(openedClass + " " + closedClass);
                        $(this).children('div.tree-header').toggleClass("clicked");
                        $(this).children().children('div').toggleClass('d-block');
                        $(this).children().children('div').toggleClass('d-none');
                        $(this).children().children().toggle();
                    }
                })
                // branch.children().children().toggle();
            });
    
            tree.find('.branch .indicator').each(function(){
                $(this).on('click', function () {
                    $(this).closest('li').click();
                });
            });
    
            tree.find('.branch>div').each(function () {
                $(this).on('click', function (e) {
                    $(this).closest('li').click();
                    e.preventDefault();
                });
            });
        }
    });
    /* Initialization of treeviews */
    $('#ul-category-tree').treed();
});