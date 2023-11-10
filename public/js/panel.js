function SuccessPop(Message,timing){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: Message,
        showConfirmButton: true,
        timer: timing
    })
}

function redirectLogin(){
Swal.fire({
    title:"Account Created Successfully. Redirecting you to login page!",
    timer:2e3,
    showConfirmButton: false,
    confirmButtonColor:"#0bb197",
    onBeforeOpen:function(){
        Swal.showLoading(),t=setInterval(function(){
        Swal.getContent().querySelector("strong").textContent=Swal.getTimerLeft()},100)},
        onClose:function(){clearInterval(t);window.location.href="/login"}})
        .then(function(t){
            t.dismiss===Swal.DismissReason.timer&&console.log("I was closed by the timer")})
}