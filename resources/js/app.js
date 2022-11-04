import './bootstrap';

Echo.channel('notifications')
    .listen('UserSessionChange', function(data) {
    console.log('asdasdasdasdasdasd');
    const notificationElement = document.getElementById('notification-alert');

    notificationElement.innerText = data.message;
    notificationElement.classList.remove('invisible');
    notificationElement.classList.remove('alert-success');
    notificationElement.classList.remove('alert-danger');
    notificationElement.classList.add('alert-' + data.type);
});
