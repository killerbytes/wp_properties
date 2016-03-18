jQuery(document).ready(function ($) {

    function init_slider(){
        var options = { 
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
            $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            },

            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $AutoCenter: 1,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $SpacingX: 5,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                $SpacingY: 5,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                $ChanceToShow: 2
            },

            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                $AutoCenter: 3,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
            }
        };

        var element = $('.jssor-slider').get(0);
        if(element){
            var jssor_slider1 = new $JssorSlider$(element, options);

            //Scale slider after document ready
            ScaleSlider();
            //Scale slider while window load/resize/orientationchange.
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
        }

		function ScaleSlider() {
		    var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
		    if (parentWidth)
		        jssor_slider1.$ScaleWidth(Math.min(parentWidth, 1920));
		    else
		        window.setTimeout(ScaleSlider, 30);
		}        
                                        
    }

    function create_slider(){
        if($('.slider-container').length == 0) return false;

        $slides = $('<div>').attr('u', 'slides');
        $.each($('.for-slider img'), function(index, el){
            $div = $('<div>');
            $el = $(el).attr('u', 'image');
            console.log(el.src.split('.jpg')[0] + '-150x150.jpg' )
            $thumb = $('<img>').attr({u: 'thumb', src: el.src.split('.jpg')[0] + '-150x150.jpg' })

            // 
            $slides.append(
                $div
                .append($el)
                .append($thumb)
            );
        })

        $container = $('<div>').addClass('jssor-slider')
            .append($slides)
            .append($('#controls')[0].innerHTML)
            .append($('#thumbs')[0].innerHTML);

        $('.slider-container')
            .append($container)

        init_slider();
    }


    init_slider();
    create_slider();
});
