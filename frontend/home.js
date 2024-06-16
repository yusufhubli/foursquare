/*console.log("hell000")
var i=0;
var img=document.getElementById("img");
img.src="photo/one.png";
var arr = ["photo/one.png","photo/two.png","photo/three.png"];
function next(){
    if(i==2){
       i=0;
    }
    i++;
   img.src=arr[i];
    
}

function prev(){
    if(i==0){
        i=2;
    }
    i--;
    img.src=arr[i];
}
console.log("hello")
*/
var i = 0;
var arr = ["home/home14.jpg", "home/home21.jpg", "home/home17.jpg"];
var img = document.querySelector(".slider-img");
img.src = arr[i];
var t = setInterval(move, 2000);
function move() {
    var img = document.querySelector(".slider-img");
    i++;
    if (i >= arr.length) {
        i = 0;
    }
    img.src = arr[i];
}

let item = document.querySelector(".button")
item.addEventListener("click", (e) => {
    if (e.target.classList.contains("rent")) {
        let line = e.target.parentNode.parentNode.childNodes[3]
        line.style.marginLeft = "488px"
        line.style.transitionDuration = ".5s"
    }
    if (e.target.classList.contains("lease")) {
        let line = e.target.parentNode.parentNode.childNodes[3]
        console.log(line)
        line.style.marginLeft = "628px"
        line.style.transitionDuration = ".5s"
    }
    if (e.target.classList.contains("sell")) {
        let line = e.target.parentNode.parentNode.childNodes[3]
        line.style.marginLeft = "761px"
        line.style.transitionDuration = ".5s"
    }
})
/*
const http = new XMLHttpRequest()
http.open('get','home.json',true)

http.onload=function(){
    if(http.readyState == 4 && http.status == 200){
      var product = JSON.parse(http.response)
      console.log(product)
      let output=""
      for(let item of product){
        output+=` <div class="item">  
        <img class="home-img" src="${item.image}" width="200" height="200" alt="home image">
        <span class="home-detail"><p class="home-name"><b>${item.homeName}</b></p>
        <p class="home-address">${item.address}</p>
        <p class="price">${item.price}  <span>${item.mouth}</span></p></span>
        <span class="home-order"><button class="buy-btn">Book Now</button>
        <button class=" detail-btn">Details</button></span>  
    </div>`
    document.querySelector(".product").innerHTML=output
      }
    }
}
    http.send()
*/

let product = JSON.parse(localStorage.getItem("data")) || []
let homedata = () => {
    fetch('http://localhost/phpprograms/project1/backend/house.php', {
        method: 'GET',
        header: {
            'content-type': 'application/json',
            'accept': 'application/json'
        }
    }).then(res => res.json())
        .then(data => {
            let home = data
            // console.log(home)
            homeItem(home)
            homeItemBtn(home)
        })
}
homedata()

function homeItem(home) {
    let items = home.map((menu) => {
        let { id, image, homeName, address, price, type } = menu
        return `<div id=${id} class="item">  
        <img class="home-img" src="home/${image}" width="200" height="200" alt="home image">
        <span class="home-detail"><p class="home-name">${homeName}</p>
        <p class="home-address">${address}</p>
        <p class="price">${price}  <span class="type">${type}</span></p></span>
        <span class="home-order"><a href="book.html"><button onclick="add(${id})" class="buy-btn">Book Now</button></a>
        <button onclick="add(${id})" class="detail-btn">Details</button></span>  
    </div>`;
    }).join("")
    document.querySelector(".product").innerHTML = items
}

function homeItemBtn(home) {
    const filterbtn = document.querySelectorAll(".btn")
    filterbtn.forEach((btn) => {

        btn.addEventListener("click", (e) => {
            const type = e.target.dataset.id
            console.log(type)
            // const db = pass.forEach((w)=>{
            //  console.log(w)
            // })
            const menucatagory = home.filter((items) => {
                if (items.type === type) {
                    return items
                }

            })
            console.log(menucatagory)
            homeItem(menucatagory)

        })
    })
}
function add(id) {
    //console.log(id)
    let search = product.find((x) => x.id === id)
    console.log(search)
    if (search === undefined) {
        product.push({
            id: id
        })
    } else return
    localStorage.setItem("data", JSON.stringify(product))
    location.href = "product.html"
}
let search = () => {
     let body = document.body
     let cata = body.childNodes[7]
     let slider = body.childNodes[5]
     let product =body.childNodes[9]
     let srh = body.childNodes[1].childNodes[13]
    // console.log(srh.value)
   // console.log(body.childNodes[1].childNodes[13])
    product.classList.remove("product")
    product.classList.add("pro")
    let filter = document.getElementById("srh").value.toUpperCase()
    let item = document.getElementsByClassName("item")
   // console.log(item)
    let homename = document.getElementsByClassName("type")
    for(var i=0;i<homename.length;i++){
        let data = document.getElementsByClassName("type")[i]
        //console.log(data.textContent.toUpperCase())
        if(data){
            let homedata = data.textContent || data.innerHTML
            if(homedata.toUpperCase().indexOf(filter)>-1){
                item[i].style.display =""
                slider.style.display="none"
                cata.style.display="none"
             
            }else{
                item[i].style.display ="none"
              
            }
        }
    }
    srh.value = ""
}

    let logout = () => {
        localStorage.clear()
        location.href = `login.html`
    }
let remove = () => {
    localStorage.removeItem('data')
}