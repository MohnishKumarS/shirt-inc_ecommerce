let toastCount = 0;

$('document').ready(() => {
    if (sessionStorage.getItem('#notify') != 'true') {
        toast();
        sessionStorage.setItem('#notify', true);

    }
    
});


$('.notification-wrapper .close').click(() => {
    $('.notification-wrapper').removeClass('show');
    ++toastCount;
    // toast(4000);
});

const toast = (delay = 7000) => {
    if(toastCount < 2){
        setTimeout(() => {
            $('.notification-wrapper').addClass('show');
        }, delay);
    }
}