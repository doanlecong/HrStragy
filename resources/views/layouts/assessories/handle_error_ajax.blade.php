if(e.status == 401) {
swal({
title: "Opp !",
text: "Your session has been expired . We will redirect you to login page in 3 seconds",
icon: "error",
button: "Đóng thôi !",
});
setTimeout(function () {
location.reload();
}, 3000);
} else {
swal({
title: "Opp !",
text: e.responseJSON.message,
icon: "error",
button: "Đóng thôi !",
});
}