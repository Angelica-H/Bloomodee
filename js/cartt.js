// Tim kiem, sap xep
const search_btn = document.getElementById("filter-1")
const block_filter = document.querySelectorAll(".filter-3 button")
const block_product = document.querySelectorAll(".product-block")
console.log(block_product)

// Tim kiem
search_btn.addEventListener('keyup',searchItem) 

function searchItem() {
  let valueItem = search_btn.value.toLowerCase();
  Array.from(block_product).forEach(function(ele) {
    let nameItem = ele.querySelector('.pro-text').firstElementChild.textContent;
    if(nameItem.toLowerCase().indexOf(valueItem) !== -1){
      ele.style.display = 'block';
    }
    else {
      ele.style.display = 'none';
    }
    checkEmpty(block_product)
  })
}
// tim kiem neu khong co sp
function checkEmpty(element){
  let count = 0;
  for(let i=0;i<element.length;i++) {
    if(element[i].style.display === 'block'){
      count++;
    }
  }
  if(count === 0){
    document.querySelector('#empty-block').style.display = 'block';
  } 
  else{
    document.querySelector('#empty-block').style.display = 'none';
  } 
}

// Sap xep
Array.from(block_filter).forEach(function(element) {
  element.addEventListener("click",function(event) {
    for (let i = 0; i < block_filter.length; i++) {
      block_filter[i].classList.remove("activea")
    }
    this.classList.add("activea")

    let name_filter = element.dataset.filter
    // console.log(name_filter)

    Array.from(block_product).forEach(function(ele) {
      if(ele.dataset.item === name_filter || name_filter === "all") {
        ele.style.display = 'block'
      }
      else {
        ele.style.display = 'none'
      }
      })
    })
})



