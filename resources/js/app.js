require("./bootstrap");

console.log("test");
Echo.channel("reminder").listen("ScheduleReminder", post => {
    if (!("Notification" in window)) {
        alert("Web Notification is not supported");
        return;
    } else console.log("bisa");

    Notification.requestPermission(permission => {
        let notification = new Notification("New post alert!", {
            body: "test" // content for the alert
        });
    });
});
