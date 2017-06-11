// 

function activeTab(id_name) {

  var x;
  x = document.getElementsByClassName("tab");

   for (i = 0; i < x.length; i++) {
        x[i].style.backgroundColor= "#17171e";
    }

  document.getElementById('tab'+id_name).style.backgroundColor = "#1c9287";

  $.ajax({url: "/event/calendar/"+id_name , success: function(result){
    var months = {
    '01' : 'Jan',
    '02' : 'Feb','03' : 'Mar','04' : 'Apr','05' : 'May','06' : 'Jun','07' : 'Jul','08' : 'Aug','09' : 'Sept','10' : 'Oct','11' : 'Nov','12' : 'Dec',
    }

        if (result){
          $('.events').empty();
          result.forEach(function(event){
            console.log(event.event_name);
            var arr =event.event_date.split('-');
            var day = arr[2].split(' ');
            $('.events').append('<div class="event-block1">\
                                    <div class="event-date1 eCol">\
                                      <div class="eDate">'+day[0] +'</div>\
                                      <div class="eMonth">'+ months[arr[1]]+'</div>\
                                    </div>\
                                    <div class="event-details1 eCol">\
                                      <div class="event-name1"><a href="/event/'+event.id+'/checkevent">'+event.event_name+'</a></div>\
                                      <div class="other-info1 ">'+event.event_description+'</div>\
                                      <br>\
                                      <div  class="glyphicon glyphicon-map-marker" "event-location1">'+event.event_address+'</div>\
                                    </div>\
                                  </div>');
          });
        }
      }
    });
}

$jQuery(document).ready(function($){
var inputAddphoto = '<div class="upload-photo">Upload File</div>',
    inputphoto = $('#id_photo');

inputphoto.before(inputAddphoto);

$('.upload-photo').on('click', function() {
    $(this).siblings('#id_photo').trigger('click');
});

inputphoto.on('change', function(){
    var input = $(this),
        reader = new FileReader();

    reader.onload = function (e) {
        input.siblings('.upload-photo').css('background-image', 'url(' + e.target.result + ')');
    };

    reader.readAsDataURL(this.files[0]);
});

});
