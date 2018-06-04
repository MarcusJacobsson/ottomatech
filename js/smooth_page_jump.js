/**
 * Created by Marcus Jacobsson on 2015-07-22.
 */
    //jQuery Smooth Page Jumps
$(function() {

    var theDestinations = $('a[name]');

    theDestinations.each(function(i){

        var thisDestination =  $(this),
            thisDestinationOffset = thisDestination.offset(),
            thisLink = $("a[href=#" + thisDestination.attr("name") + "]");

        if(thisLink.length > 0) {
            thisLink.click(function(){

                $('html,body').animate({scrollTop : thisDestinationOffset.top}, 500);
                return false;

            });
        }
    });
});