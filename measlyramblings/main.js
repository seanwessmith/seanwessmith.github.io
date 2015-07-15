
var clips = [];
var vis = [];
var old = [];
var win;

//http://stackoverflow.com/questions/11381673/javascript-solution-to-detect-mobile-browser
window.mobilecheck = function() {
    var check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
    return check; }

function addClip(elem){
	if( elem.length == 0 )return;
    clips.push(elem);
    vis.push(true);
    $("body").append('<div class="full blurbg" id="clip'+clips.length+'"></div>');
    fadein($("#clip"+clips.length));
}

function zero(x){
    return x<0?0:x;
}

function maxh(x){
    if( mobilecheck()) return x;
    var h = win.innerHeight();
    return x > h ? h : x;
}

function clip(){
    var sleft = win.scrollLeft();
    var stop = win.scrollTop();
    for(var i = 0; i<clips.length; i++){
        var b = clips[i];
        var p = b.offset();
        var x = [p.left-sleft, p.top-stop, b.outerWidth(), b.outerHeight()];
        if( x[1]+x[3] < 0 || x[1] > win.outerHeight() ){
            if( vis[i] ){
                old[i] = "";
                vis[i] = false;
                document.getElementById("clip"+(i+1)).style.clip = "rect(0px, 0px, 0px, 0px)";
            }
            continue;
        }
        vis[i] = true;
        var str = "rect("+zero(x[1])+"px, " + zero(x[0]+x[2])+"px, " + maxh(zero(x[1]+x[3])) +"px, " + zero(x[0])+"px)";
        if( str == old[i])continue;
        old[i] = str;
        var elem = document.getElementById("clip"+(i+1));
        elem.style.clip = str;
    }
    var proj = $("#projects");
    if( proj.length != 0){
	    var b1;
	    $(".baritem").removeClass("active");
	    if((b1= (stop > proj.offset().top - 300)) && (stop < proj.offset().top + proj.outerHeight() - 900)){
	        $("#mainblur").css("opacity", 1);
	        $("#projbar").addClass("active");
	    }else{
	        $("#mainblur").css("opacity", 0);
	        if( !b1 )
	            $("#homebar").addClass("active");
	        else $("#connbar").addClass("active");
	    }
    }
}

function cliptop(){
    var n = $("#nav");
    $("#cliptop").css("clip", "rect(0px, "+n.outerWidth()+"px, "+n.outerHeight()+"px, 0px)");
}

function fadein(p){
    p.css("opacity", 0);
    //hack
    //http://stackoverflow.com/questions/11131875/what-is-the-cleanest-way-to-disable-css-transition-effects-temporarily
    p.offset();
    p.addClass("trans1");
    p.css("opacity", 1);
}

function TypeWriter( elem ){
    this.elem = elem;
    this.str = elem.text();
    this.index = 0;
    elem.html(".");
    this.arr = [];
    for(var i = 0; i<this.str.length; i++)
        this.arr.push(i);
    for(var i = this.arr.length-1; i>=0; i--){
        var x = Math.floor(Math.random() * i );
        var tmp = this.arr[x];
        this.arr[x] = this.arr[i];
        this.arr[i] = tmp;
    }
    this.add();
}

TypeWriter.prototype.add = function(){
    var s ="";
    for(var j = 0; j<this.str.length; j++)
        for(var i = 0; i<=this.index; i++)
            if( this.arr[i] == j )
                s+= this.str.charAt(j);
    this.elem.text(s);
    this.index++;
    if( this.index < this.str.length ){
    	var tmp = this;
    	setTimeout(function(){tmp.add();}, 100*Math.random() + 50);
    }
}



$(document).ready(function(){
                  win = $(window);
                  var ar = [119, 121, 110, 100, 48, 55, 64, 103, 109, 97, 105, 108, 46, 99, 111, 109];
                  var e = "";
                  for(var i = 0; i<ar.length; i++)
                  e += String.fromCharCode(ar[i]);
                  
                  $(".email").html("Email");
                  $(".email").attr("href", "mailto:"+e);
        
                  if( mobilecheck() ){
                  $("#mobilemsg").html("(Due to the way mobile scrolling events are handled, the blur effect may be a little glitchy)");
                  }
                  fadein($("#cliptop"));
                  fadein($("p"));
                  addClip($("#box1"));
                  //addClip($("#box2"));
                  addClip($("#box3"));
                  clip();
                  setTimeout(clip, 400);
                  $("#cliptop").css("opacity", 1);
                  cliptop();
                  $(document).scroll(clip);
                  $(window).resize(clip);
                  $(window).resize(cliptop);
                  });


//http://css-tricks.com/snippets/jquery/smooth-scrolling/
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
                                      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                                                                    var target = $(this.hash);
                                                                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                                                                    if (target.length) {
                                                                    $('html,body').animate({
                                                                                           scrollTop: target.offset().top
                                                                                           }, 700);
                                                                    return false;
                                                                    }
                                                                    }
                                                                    });
                                          });
