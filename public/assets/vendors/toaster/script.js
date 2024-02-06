let toastCount = 0;

$('document').ready(() => {
    toast();

    $('.notification-wrapper .close').click(() => {
        $('.notification-wrapper').removeClass('show');
        ++toastCount;
        toast(4000);
    });
});

const toast = (delay = 2000) => {
    if(toastCount < 3){
        setTimeout(() => {
            $('.notification-wrapper').addClass('show');
        }, delay);
    }
}