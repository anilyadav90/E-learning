$(document).ready(function(){

    $(function(){
        $("#playlist li").on("click",function(){
            $("#lectures_videos").attr({
                src:attr("video_link"),
            });
        }); 
    });
});