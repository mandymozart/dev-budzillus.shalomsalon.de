/**
 * Created by John on 17.10.14.
 */


    $(document).ready(function(){


        // Parallax
        $(
            '.home .section#introSection'
            ).parallax({
            speed :	0.1
        });


        // Sections Fullscreen
        function getFontSize(width){
            sizew = width / 100;
            size = sizew * 15;
            return size;
        };

        $("#introSection").height($(window).height()-50);
        getFontSize($("#introSection h1").width());
        $("#introSection h1").css("font-size", size + "px");
        $("#introSection h1").css("line-height", size + "px");
        $("#introSection h2").css("font-size", size*0.3 + "px");
        $("#introSection h2").css("line-height", size*0.3 + "px");
        $(window).on("debouncedresize",function(){
            size = getFontSize($(this).width());
            $("#introSection h1").css("font-size", size + "px");
            $("#introSection h1").css("line-height", size + "px");
            $("#introSection h2").css("font-size", size*0.3 + "px");
            $("#introSection h2").css("line-height", size*0.3 + "px");
            $("#introSection").height($(this).height()-50);
        });

        // Songkick API for Events / Api key missing
        // http://api.songkick.com/api/3.0/artists/2519366/calendar.json?apikey={your_api_key}

            $.getJSON('http://api.songkick.com/api/3.0/artists/2519366/calendar.json?apikey=6GDmWSCRSkYbP0eH&jsoncallback=?', function( data ) {

                $("#songkickGigs").empty();

                var gigs = data.resultsPage.results.event;

                $.each(gigs, function(index, gig) {

                    if(gig.series){
                        var place = gig.series.displayName;
                    } else {
                        var place = gig.venue.displayName;
                    }


                    date = Date.parse(gig.start.date).toString('d.MMMM');

                    if(gig.performance && !gig.series && gig.performance[0].artist.displayName != "BudZillus") {
                        var wit = "w/ "+gig.performance[0].artist.displayName;
                    } else {
                        var wit = "";
                    }

                    $li = $("<span class='date'>"+date+"</span> "+gig.location.city.replace(/, Germany/g, "")+" <a href='"+gig.uri+"' target='_blank'>"+place+wit+"</a><br />").appendTo("#songkickGigs");

                });
            });



        //creates an element to print the scroll position
        /*
        $("<p id='test'>").appendTo("body").css({
            padding: "5px 7px",
            background: "#e9e9e9",
            position: "fixed",
            fontSize: "16px",
            opacity: "0.7",
            top: "15px",
            left: "15px" });
 */
//attach the "wheel" event if it is supported, otherwise "mousewheel" event is used
        /*
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
        */
        deviceW = $(window).width()

        if(deviceW > 768 && $('body').hasClass('home')){ // limit to
            $('#newsletter').toggleClass('in-intro')
        }
        else {
            $('#newsletter').removeClass('in-intro')
        }

        $('#latestSection').waypoint(function(){
            if(deviceW > 768 && $('body').hasClass('home')){ // limit to
                $('#newsletter').toggleClass('in-intro')
            }
            else {
                $('#newsletter').removeClass('in-intro')
            }
        })

    })
