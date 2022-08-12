// Discount code
const discount_code = document.querySelectorAll("div.n-sd label")
// console.log(discount_code)

Array.from(discount_code).forEach(function(element) {
    element.addEventListener("click",function(event) {
      for (let i = 0; i < discount_code.length; i++) {
        discount_code[i].classList.remove("sd")
      }
      this.classList.add("sd")
      })
  })
  
// Profile notify
// const btnn = document.querySelectorAll("div.btn_btnb")
// const notify_blocka = document.querySelector("div.notify-modald")
// // console.log(notify_blocka)

// function showNotify() { 
// notify_blocka.classList.add('open')
// }    

// for ( const addBtnn of btnn) {
// addBtnn.addEventListener('click' , showNotify)
// }

// var do_hide = function hideNotify() {
// notify_blocka.classList.remove('open')
// };
// setInterval(do_hide, 10000);






