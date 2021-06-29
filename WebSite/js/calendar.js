var dt = new Date();

function RenderDate(){

   dt.setDate(1);
   var day = dt.getDay();
   var endDate = new Date(dt.getFullYear(), dt.getMonth() + 1, 0).getDate();
   var prevDate = new Date(dt.getFullYear(), dt.getMonth(), 0).getDate();
   var today = new Date();

   var months =["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
   document.getElementById("month").innerHTML = months[dt.getMonth()];
   document.getElementById("year_str").innerHTML = dt.getFullYear();
   
   var cells = "";

   for(x = day; x > 0; x--){
     cells += "<div class='prev_date' style='color: gray'>" + (prevDate - x + 1) + "</div>";
    }

    for(i = 1; i<= endDate; i++){
       if(i==today.getDate() && dt.getMonth() == today.getMonth()){
          cells += "<div class='today'>" + i + "</div>";
       }else{
          cells += "<div>" + i + "</div>";
       }
    }
    document.getElementsByClassName("days")[0].innerHTML = cells;
}

function moveDate(input){
    if(input == "prev"){
        dt.setMonth(dt.getMonth() - 1);
    }else if(input == "next"){
        dt.setMonth(dt.getMonth() + 1);
    }
    RenderDate();
}

function meetingDay(){

    document.getElementById("selected_day").innerHTML = Date();
    //document.getElementById("selected_day").innerHTML = dt.toDateString();
}
