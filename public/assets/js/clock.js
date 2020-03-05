function addOneSecond(hour, minute, second) {
    var date = new Date();
    date.setHours(parseInt(hour));
    date.setMinutes(parseInt(minute));
    date.setSeconds(parseInt(second) + 1);

    var time = date.getHours() < 10 ? `0${date.getHours().toString()}:` : `${date.getHours().toString()}:`;
    time += date.getMinutes() < 10 ? `0${date.getMinutes().toString()}:` : `${date.getMinutes().toString()}:`;
    time += date.getSeconds() < 10 ? `0${date.getSeconds().toString()}` : date.getSeconds().toString();

    return time;

}

function activateClock() {

    var active = $('[active-clock]');

    if (!active) return;

    setInterval(() => {
        var active = $('[active-clock]').text();

        var time = active.split(":");

        var hour = time[0];
        var minutes = time[1];
        var seconds = time[2];

        var nextTime = addOneSecond(hour, minutes, seconds);

        $('[active-clock]').text(nextTime);
    }, 1000)

}
activateClock();

