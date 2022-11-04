import './bootstrap';
import Echo from "laravel-echo";


const channel = window.Echo.channel('notifications');
channel.listen('UserSessionChange', function(data) {
    const notificationElement = document.getElementById('notification-alert');
    notificationElement.innerText = data.message;
    notificationElement.classList.remove('invisible');
    notificationElement.classList.remove('alert-success');
    notificationElement.classList.remove('alert-danger');

    notificationElement.classList.add('alert-' + data.type);
});
