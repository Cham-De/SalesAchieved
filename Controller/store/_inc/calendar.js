// Building the Calender
const date = new Date();

const eventDates = new Array();

var dateEventsHTML = "";

const dateToDateString = (year_, month_, day_) => {
    return year_ + "-" + ("0" + (month_ + 1)).slice(-2) + "-" + ("0" + day_).slice(-2)
}


const getDateEvents = (dateStr_) => {
    $.ajax({
        type: "GET",
        url: "/SalesAchieved/Model/store/calendarCRUD.php",
        data: {"get_date_events": dateStr_},
        dataType: "html",
        success: function(data){
            dateEventsHTML = data;
            renderCalender();
        }
    });
};


const renderCalender = () => {
    date.setDate(1);

    const monthDays = document.querySelector('.days');

    const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

    const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();

    const lastDayIndex = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDay();

    const nextDays = 7 - lastDayIndex - 1;

    const firstDayIndex = date.getDay();

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    document.querySelector('.date h1').innerHTML = months[date.getMonth()];

    document.querySelector('.date p').innerHTML = new Date().toDateString();

    let days = "";

    for(let x = firstDayIndex; x > 0; x--){
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`
    }

    for(let i = 1; i <= lastDay; i++){
        var dateStr = dateToDateString(date.getFullYear(), date.getMonth(), i);
        var hasEvent = eventDates.indexOf(dateStr) > -1;

        if(i === new Date().getDate() && date.getMonth() === new Date().getMonth()){
            days += `<div class="today${hasEvent ? ' event': ''}" onclick="getDateEvents('${dateStr}');">${i}</div>`;
        }
        else{
            days += `<div${hasEvent ? ' class="event"': ''} onclick="getDateEvents('${dateStr}');">${i}</div>`;
        }
    }

    for(let j = 1; j <= nextDays; j++){
        days += `<div class="next-date">${j}</div>`;
        monthDays.innerHTML = days;
    }


    const dayEvents = document.querySelector('.right');
    var eventHeader = `<div class="today-date">
        <div class="event-day">Event List</div>
        <div class="event-date"></div>
    </div>`;
    dayEvents.innerHTML = eventHeader + dateEventsHTML;
};



document.querySelector('.prev').addEventListener('click',() => {
    date.setMonth(date.getMonth() - 1);
    renderCalender();
});

document.querySelector('.next').addEventListener('click',() => {
    date.setMonth(date.getMonth() + 1);
    renderCalender();
});

$.ajax({
    type: "GET",
    url: "/SalesAchieved/Model/store/calendarCRUD.php",
    data: {"get_events": true},
    dataType: "html",
    success: function(data){
        var dates = data.split(" ");
        var i = 0;
        while (i < dates.length) {
            eventDates.push(dates[i].trim());
            i++;
        }
        renderCalender();
    }
});
