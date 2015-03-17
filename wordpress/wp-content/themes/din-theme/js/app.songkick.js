/**
 * Created by John on 17.10.14.
 */


    $(document).ready(function(){


        $('#hotline-toggle').click(function(e){
            e.preventDefault();
            $('#hotlineModal').modal('show')
        })

        // Parallax
        $(
            '.home#introSection, .home .section#tourSection,.home .section#shopSection'
            ).parallax({
            speed :	0.1
        });


        // Sections Fullscreen

        $("#introSection").height($(window).height()-50);
        $(window).on("debouncedresize",function(){

            $("#introSection").height($(this).height()-50);
            console.log('new height ' + $('#introSection').height()-50)
        });

        // Songkick API for Events / Api key missing
        // http://api.songkick.com/api/3.0/artists/2519366/calendar.json?apikey={your_api_key}
        /*
        resturl = http://api.songkick.com/api/3.0/artists/2519366/calendar.json?apikey={your_api_key}
        $.ajax({
         url: resturl,
         dataType: 'jsonp',
         success: function(data){
            console.log( data )
         }
        })
    */

        //creates an element to print the scroll position
        $("<p id='test'>").appendTo("body").css({
            padding: "5px 7px",
            background: "#e9e9e9",
            position: "fixed",
            fontSize: "16px",
            bottom: "15px",
            left: "15px" });

//attach the "wheel" event if it is supported, otherwise "mousewheel" event is used
        $("html").on(("onwheel" in document.createElement("div") ? "wheel" : "mousewheel"), function (e) {
            var evt = e.originalEvent || e;

            //this is what really matters
            var deltaY = evt.deltaY || (-1 / 40 * evt.wheelDelta); //wheel || mousewheel
            var scrollTop = $(this).scrollTop() || $("body").scrollTop(); //fix safari

            var scrollText = "";
            if (deltaY > 0) {
                scrollText = "<b>scroll down</b>";
            } else {
                scrollText = "<b>scroll up</b>";
            }
            // console.log("originalEvent: ", evt);
            $("#test").html(scrollText +
                "<br>clientHeight: " + this.clientHeight +
                "<br>scrollHeight: " + this.scrollHeight +
                "<br>scrollTop: " + scrollTop +
                "<br>deltaY: " + deltaY);
        });

        /* Animations */

        function fallUp(sprite){

            var xcenter = $(window).width()/2;
            var ycenter = $(window).height()/2;
            $(sprite).animate({
                top: newTop,
                left: newLeft
            }, 1, function() {
                moveit(sprite);
            });
        }

        var t = 0;



        function moveit(sprite) {
            t += 0.05;

            var r = 100;
            var xcenter = $(window).width()/2;
            var ycenter = $(window).height()/2;
            var newLeft = Math.floor(xcenter + (r * Math.cos(t)));
            var newTop = Math.floor(ycenter + (r * Math.sin(t)));
            $(sprite).animate({
                top: newTop,
                left: newLeft
            }, 1, function() {
                moveit(sprite);
            });
        }


        $('#tourSection').waypoint(function(){ $('#bagSprite').fadeToggle() },{offset:'35%'})
        $('#tourSection').waypoint(function(){ $('#bagSprite').fadeToggle() },{offset:'75%'})

        $('#latestSection').waypoint(function(){
            $('#newsletter').toggleClass('in-intro')
        })
        /*
        var sticky = new Waypoint.Sticky({
            element: $('#bagSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#clockSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#cocktailSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#fishSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#guitarSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#hatSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#hornSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#monkeySprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#moonSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#pantsSprite')[0]
        })
        var sticky = new Waypoint.Sticky({
            element: $('#saturnSprite')[0]
        })*/
    })
